<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\detail_pesanan;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use App\Models\Alamat;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class summaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        
        $alamat = Alamat::where('user_id', Auth::user()->id)->first();
        $pesanan = pesanan::find($id);
        $cost_jne = Http::withHeaders([
            'key'=> 'bec2b4463cedc57cbec35bd4da7b92fb'
        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin' => '245',
            'destination' => $alamat->kota_id,
            'weight' => $pesanan->jumlah_berat,
            'courier' => 'jne',
        ]);
        
        $cost_pos = Http::withHeaders([
            'key'=> 'bec2b4463cedc57cbec35bd4da7b92fb'
        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin' => '245',
            'destination' => $alamat->kota_id,
            'weight' => $pesanan->jumlah_berat,
            'courier' => 'pos',
        ]);
        $cost_tiki = Http::withHeaders([
            'key'=> 'bec2b4463cedc57cbec35bd4da7b92fb'
        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin' => '245',
            'destination' => $alamat->kota_id,
            'weight' => $pesanan->jumlah_berat,
            'courier' => 'tiki',
        ]);

        $pesanan = pesanan::find($id);
        $profil = user::where('id', Auth::user()->id)->first();
        $pesanan_id = $pesanan->id;
        $detail_pesanan = detail_pesanan::where('pesanan_id', $pesanan_id)->get();
        $cost_pos = $cost_pos['rajaongkir']['results'];
        $cost_jne2 = $cost_jne['rajaongkir']['results'];
        $cost_tiki = $cost_tiki['rajaongkir']['results'];
        // foreach($costs as $cost){
        //   foreach($cost['costs'] as $cos){
        //     echo $cos['service'];
        //    foreach($cos['cost'] as $co){
        //     echo $co['value'];
        //    }
            
        //   }
        // }
       
        
        return view('summary',compact('pesanan','profil','detail_pesanan','cost_jne', 'cost_pos', 'cost_tiki','cost_jne2'));
    }


    public function pesanan(){
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $status = "Semua";
        return view('pesanan',compact('pesanan','status'));
    }

    public function konfirmasiTerima($id){
        $pembayaran = Pembayaran::where('user_id',Auth::user()->id)->where('pesanan_id',$id)->first();
        $pembayaran->status = "selesai";
        $pembayaran->update();
        Alert::toast(' Pesanan Selesai, Kami Tunggu Pesanan Selanjutnya','success'); 
        return redirect('home');
    }
    public function bayar(request $request, $id){
        

        $adaPembayaran = Pembayaran::where('user_id', Auth::user()->id)->where('pesanan_id', $id)->count();
        if($adaPembayaran == 0){
        $pembayaran = new Pembayaran();
        $pembayaran->user_id = Auth::user()->id;
        $pembayaran->pesanan_id = $id;
        $pembayaran->kurir = $request->kurir;
        $pembayaran->metode_pembayaran = $request->metode;
        $pembayaran->service = $request->service;
        $pembayaran->ongkos_kirim = $request->ongkos_kirim2;
        $pembayaran->total_bayar = $request->total_pembayaran;
        $pembayaran->kode_unik = $request->kode_unik;
        $pembayaran->catatan = $request->catatan;
        $pembayaran->status = "Belum Bayar";
        $pembayaran->save();

        $pesanan = pesanan::find($id);
        $pesanan_details = detail_pesanan::where('pesanan_id', $id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah_barang;
            $barang->update();
        }
        $pesanan->status = 1;
        $pesanan->update();
        Alert::toast(' Pesanan  di Checkout, Lanjutkan Pembayaran','success');
        return redirect('pembayaran'."/".$pesanan->id);
    }else{
        return redirect('pembayaran/'.$id);
    }
    }
    public function pembayaran($id){
        $pesanan = Pesanan::find($id);
        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->where('pesanan_id', $id)->where('status',"Belum Bayar")->first();
        if($pembayaran->metode_pembayaran == "Bank Transfer"){
            return view('pembayaranBank', compact('pesanan','pembayaran'));
        }else{
            return view('pembayaranEwallet', compact('pesanan','pembayaran'));
        }
       
    }
    public function konfirmasi($id){
        $pembayaran = pembayaran::where('user_id', Auth::user()->id)->where('pesanan_id', $id)->first();
        $pembayaran->status = "Diverifikasi";
        $pembayaran->update();
        Alert::Success('Terima Kasih', 'Pembayaran Anda Sedang Di verifikasi');
        return redirect('home');
    }

    public function status(request $request){
        // dd($request);
        if($request->status == "Semua"){
            return redirect ('pesanan');
           
        }
        $pembayarans = pembayaran::where('user_id', Auth::user()->id)->where('status', $request->status)->orderBy('created_at', 'desc')->get();
        $pesanan = [];
        foreach($pembayarans as $pembayaran){
            $pesanan[] = $pembayaran->pesanan;
        }
        $status = $request->status;
      
        return view('pesanan', compact ('pesanan', 'status'));
    }

    public function invoice($id){
        $pesanan = pesanan::find($id);
        $detail_pesanan = detail_pesanan::where('pesanan_id', $pesanan->id)->get();
        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->where('pesanan_id', $id)->first();
        $profil = user::where('id', Auth::user()->id)->first();
        $alamats = Alamat::where('user_id',Auth::user()->id)->first();
        return view ('invoice', compact('pesanan','pembayaran','profil','detail_pesanan','alamats'));
    }
    

    
}

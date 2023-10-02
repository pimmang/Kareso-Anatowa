<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\detail_pesanan;
use App\Models\Kategori;
use App\Models\pesanan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $barang = Barang::where('id', $id)->first();  
        return view('Pesan', compact('barang'));
    }
    public function pesan(Request $request, $id){
        $barang = Barang::where('id',$id)->first();
        if($request->jumlah_pesanan<=0){
            Alert::toast('Masukan Jumlah Yang Valid', 'error');
            return view('Pesan', compact('barang'));
        }
        $tanggal = Carbon::now();
        // validasi apakah jumlah pesanan melebihi stok
        if($request->jumlah_pesanan > $barang->stok){
            Alert::error('Maaf', 'Pesanan Lebih Dari Jumlah Stok');
            return redirect ('pesan/'. $barang->id ) ;       
        }
        // validasi ketika membuat pesanan yang sama, data tidak perlu disimpan dua kali dalam database
        $cek_pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(empty($cek_pesanan)){
        // simpan ke database pesanan
        $pesanan = new pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->jumlah_harga = 0;
        $pesanan->jumlah_berat = 0;
        $pesanan->status = 0;
        $pesanan->save();
        }
        //simpan ke database detail pesanan
        $pesanan_baru = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $cek_pesanan_detail = detail_pesanan::where('barang_id', $barang->id)->where('pesanan_id',$pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
        $pesanan_detail = new detail_pesanan();
        $pesanan_detail->barang_id = $barang->id;
        $pesanan_detail->pesanan_id = $pesanan_baru->id;
        $pesanan_detail->jumlah_barang = $request->jumlah_pesanan;
        $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesanan;
        $pesanan_detail->jumlah_berat = $barang->berat*$request->jumlah_pesanan;
        $pesanan_detail->save();
        }
        else{
            $pesanan_detail = detail_pesanan::where('barang_id', $barang->id)->where('pesanan_id',$pesanan_baru->id)->first();
            $pesanan_detail->jumlah_barang =  $pesanan_detail->jumlah_barang+$request->jumlah_pesanan;
            $jumlah_harga_pesanan_baru = $barang->harga*$request->jumlah_pesanan;
            $jumlah_berat_pesanan_baru = $barang->berat*$request->jumlah_pesanan;

            $pesanan_detail->jumlah_harga =  $pesanan_detail->jumlah_harga+$jumlah_harga_pesanan_baru;
            $pesanan_detail->jumlah_berat =  $pesanan_detail->jumlah_berat+$jumlah_berat_pesanan_baru;
            $pesanan_detail->update();
        }

        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesanan;
        $pesanan->jumlah_berat = $pesanan->jumlah_berat+$barang->berat*$request->jumlah_pesanan;
        $pesanan->update();

        

        Alert::toast($barang->nama_barang.' Telah Ditambahkan Ke Keranjang','success');
        // success('Thank You', 'Sukses Menambahkan ke keranjang');
    return redirect('/home');

    }

    public function keranjang(){
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if($pesanan){
            $jumlah_detail_pesanan = detail_pesanan::where('pesanan_id', $pesanan->id)->count();
        }else{
            $jumlah_detail_pesanan = 0;
        }
     
        // dd($jumlah_detail_pesanan);
        if(empty( $jumlah_detail_pesanan)){
            $pesanan_detail =[];
        }else{
            $pesanan_detail = detail_pesanan::where('pesanan_id', $pesanan->id)->get();
        }
       
        return view('keranjang', compact('pesanan','pesanan_detail'));
    }

    public function delete($id){

        $detail_pesanan = detail_pesanan::where("id",$id)->first();
        $pesanan = pesanan::where("id", $detail_pesanan->pesanan_id)->first();
        // $jumlah_detail_pesanan = detail_pesanan::where('pesanan_id',$pesanan->id)->count();
        $harga = $pesanan->jumlah_harga;
        $pesanan->jumlah_harga = $harga-$detail_pesanan->jumlah_harga;
        $pesanan->jumlah_berat = $pesanan->jumlah_berat-$detail_pesanan->jumlah_berat;
        $pesanan->update();
        $detail_pesanan->delete();
        Alert::Success('Sukses', 'Pesanan Telah Dihapus');
        return redirect('keranjang');
    }

    public function checkout($id){    
        $cek_profil = User::where('id', Auth::user()->id)->first(); 
        if(empty($cek_profil->alamat)&&empty($cek_profil->nomor_hp)){
            Alert::error('Checkout Gagal', 'Tolong Lengkapi Alamat dan Nomor Whatsapp');
            return redirect ('profil') ; 
        }
        // $pesanan = pesanan::find($id);
        $pesanan_details = detail_pesanan::where('pesanan_id', $id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            if($pesanan_detail->jumlah_barang>$barang->stok){
                Alert::error('Gagal', 'Pesanan tidak dapat di checkout karena stok '.$barang->nama_barang.' tidak cukup untuk pesanan Anda');
                return redirect('keranjang');
            }
            // $barang->stok = $barang->stok-$pesanan_detail->jumlah_barang;
            // $barang->update();
        }
        // $pesanan->status = 1;
        // $pesanan->update();
        return redirect('summary'.'/'.$id);
        

    }
    public function kategori(Request $request, $id){
        $status = $request->kategori;
        $barangWithGambar = Barang::with('Gambar_Barang')->get();
        $barang = Barang::where('id', $id)->first();
        $kategoris = $barang->kategori;
        $kategori = Kategori::where('nama_kategori', $request->kategori)->first();
        $barangs = $kategori->Barang;
        return view('Pesan', compact('barangWithGambar', 'barang','kategoris','status','barangs'));
        }

    

    
      
    
}


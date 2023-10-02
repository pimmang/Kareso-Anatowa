<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $provinsi = Http::withHeaders([
            'key' => 'bec2b4463cedc57cbec35bd4da7b92fb'
        ])->get('https://api.rajaongkir.com/starter/province');

        $kota = Http::withHeaders([
            'key' => 'bec2b4463cedc57cbec35bd4da7b92fb'
        ])->get('https://api.rajaongkir.com/starter/city');
  
        $provinsi = $provinsi['rajaongkir']['results'];
        $kota = $kota['rajaongkir']['results'];
        $profil = user::where('id', Auth::user()->id)->first();
        return view('profil',compact('profil' ,'provinsi','kota'));
    }

    public function update(Request $request){
        $profil = user::where('id', Auth::user()->id)->first();
        $this->validate($request, [
            'name' => [ 'string', 'max:255'],
            'email' => 'string|email|max:255|unique:users,email,' . $profil->email . ',email',
            'password' => ['confirmed'],
        ]);        
        $provinsi = Http::withHeaders([
            'key' => 'bec2b4463cedc57cbec35bd4da7b92fb'
        ])->get("https://api.rajaongkir.com/starter/province?id=$request->provinsi");

        $kota = Http::withHeaders([
            'key' => 'bec2b4463cedc57cbec35bd4da7b92fb'
        ])->get("https://api.rajaongkir.com/starter/city?id=$request->kabupaten");

        $respon1 = $provinsi['rajaongkir']['results'];
        $respon2 = $kota['rajaongkir']['results'];
        $alamat = Alamat::where('user_id', Auth::user()->id)->count();
        if($alamat == 0){
            $alamat = new Alamat;
            $alamat->user_id = Auth::user()->id;
            $alamat->provinsi_id = $request->provinsi;
            $alamat->kota_id = $request->kabupaten;
            $alamat->provinsi = $respon1['province'];
            $alamat->kota = $respon2['city_name'];
            $alamat->kecamatan = $request->kecamatan;
            $alamat->kode_pos = $request->kodepos;
            $alamat->save();
        }else{
            $alamat = Alamat::where('user_id', Auth::user()->id)->first();
            $alamat->provinsi_id = $request->provinsi;
            $alamat->kota_id = $request->kabupaten;
            $alamat->provinsi = $respon1['province'];
            $alamat->kota = $respon2['city_name'];
            $alamat->kecamatan = $request->kecamatan;
            $alamat->kode_pos = $request->kodepos;
            $alamat->update();
        }
        $profil->name = $request->nama1;
        $profil->email = $request->email;
        $profil->nomor_hp = $request->nohp;
        $profil->alamat = $request->alamat.", ".$request->kecamatan.", ".$respon2['type']." ".$respon2['city_name'].", ".$respon1['province'].", ".$request->kodepos;
        if(!empty($request->password)){
        $profil->password = Hash::make($request->password);}
        $profil->update();
       
        Alert::success("Selamat", "Profil Berhasil Diupdate");
       return redirect('profil');
    }
}

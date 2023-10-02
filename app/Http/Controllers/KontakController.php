<?php

namespace App\Http\Controllers;

use App\Models\kontak_kami;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KontakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( Request $request){
        $pesan = new kontak_kami();
        $pesan->nama = $request->firstname ." ". $request->lastname;
        $pesan->email = $request->email;
        $pesan->nomor_hp = $request->nomor_hp;
        $pesan->pesan = $request->pesan;
        $pesan->save();
        Alert::Success('Sukses', 'Pesan anda telah terkirim');
        return view('contact');
    }
}

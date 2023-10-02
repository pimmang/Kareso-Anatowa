<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\kategori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
    $barangWithGambar = Barang::with('Gambar_Barang')->get();
    $barang = Barang::get();
    $kategoris = kategori::get();
    $status = "Semua";
    return view('home1', compact('barangWithGambar', 'barang','kategoris','status'));
    }

    public function kategori(Request $request){
        if($request->kategori == 'Semua'){
            $barang = Barang::get();
        }else{
            $kategori = Kategori::where('nama_kategori', $request->kategori)->first();
            $barang = $kategori->Barang;
        }
        $barangWithGambar = Barang::with('Gambar_Barang')->get();
        $kategoris = kategori::get();
        $status = $request->kategori;
        return view('home1', compact('barangWithGambar', 'kategoris','barang','status'));
    }
}

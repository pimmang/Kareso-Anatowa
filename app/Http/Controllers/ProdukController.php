<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\kategori;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $barangWithGambar = Barang::with('Gambar_Barang')->get();
        $barang = Barang::get();
        $kategoris = kategori::get();
        $status = "Semua";
        return view('produk', compact('barangWithGambar', 'barang','kategoris', 'status'));
    }
    public function kategori(Request $request){
        if($request->cari){
            $barang = Barang::where('nama_barang', 'like', '%' . $request->cari . '%')->get();
            $barangWithGambar = Barang::with('Gambar_Barang')->get();
            $kategoris = kategori::get();
            $status = "";
            return view('produk', compact('barangWithGambar', 'kategoris','barang', 'status'));

        }
        if($request->kategori)  {
            // dd($request);
            if($request->kategori =="Semua"){
                $barang = Barang::get();
            }
            else{
                $kategori = Kategori::where('nama_kategori', $request->kategori)->first();
                $barang = $kategori->Barang;
            }
            $barangWithGambar = Barang::with('Gambar_Barang')->get();
            $kategoris = kategori::get();
            $status = $request->kategori;
            return view('produk', compact('barangWithGambar', 'kategoris','barang', 'status'));
        }
    }
}

<?php

use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;
use App\Models\Barang;
use App\Models\kategori;
use App\Models\pesanan;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $barangWithGambar = Barang::with('Gambar_Barang')->get();
    $kategoris = kategori::get();
    $barang = Barang::get();
    $status = "Semua";
    return view('home1', compact('barangWithGambar','kategoris','barang' ,'status'));
});

Route::get('/about', function () {
    return view('about', [
        "title"=>"About"
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title"=>"Kontak"
        ]);
});

Route::get('/produk', function () {
        $barangWithGambar = Barang::with('Gambar_Barang')->get();
        $barang = Barang::get();
        $kategoris = kategori::get();
        $status = "Semua";
        return view('produk', compact('barangWithGambar', 'barang','kategoris', 'status'));
});

Route::get('/daftar', function () {
    return view('daftar', [
        "title"=>"Daftar"
    ]);
});

// Route::get('/keranjang', function () {
//     return view('keranjang', [
//         "title"=>"Keranjang"
//     ]);
// });

Route::get('/login', function () {
    return view('login', [
        "title"=>"Login"
    ]);
});

Route::get('/pembayaran', function () {
    return view('pembayaran', [
        "title"=>"Pembayaran"
    ]);
});

Route::get('/pesan/{id}', function ($id) {
    $barangWithGambar = Barang::with('Gambar_Barang')->get();
    $barang = Barang::where('id', $id)->first();
    $kategoris = $barang->kategori;
    $kategori = $barang->kategori->first();
    $barangs = $kategori->Barang;
    $status = $kategori->nama_kategori;
    return view('Pesan', compact('barangWithGambar', 'barang','kategoris','status','barangs'));
});

// Route::get('/produk', function () {
//     return view('produk', [
//         "title"=>"Produk"
//     ]);
// });

// Route::get('/summary', function () {
//     $pesanan = pesanan::find(2);
//     return view('summary',compact('pesanan'));
// });




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index',])->name('home');
Route::post('/pesanan/{id}', [App\Http\Controllers\PesanController::class, 'kategori',]);
Route::post('/pesan/{id}', [App\Http\Controllers\PesanController::class, 'pesan',]);
Route::get('/keranjang', [App\Http\Controllers\PesanController::class, 'keranjang',]);
Route::delete('/keranjang/{id}', [App\Http\Controllers\PesanController::class, 'delete',]);
Route::get('/checkout/{id}', [App\Http\Controllers\PesanController::class, 'checkout',]);
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index',]);
Route::post('/profil', [App\Http\Controllers\ProfilController::class, 'update',]);
Route::post('/home', [App\Http\Controllers\HomeController::class, 'kategori',]);
// Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index',]);
Route::post('/produk', [App\Http\Controllers\ProdukController::class, 'kategori',]);
Route::get('/summary/{id}', [App\Http\Controllers\summaryController::class, 'index',]);
Route::post('/summary/{id}', [App\Http\Controllers\summaryController::class, 'bayar',]);
Route::post('/summary/konfirmasi/{id}', [App\Http\Controllers\summaryController::class, 'konfirmasiTerima',]);
Route::get('/pesanan', [App\Http\Controllers\summaryController::class, 'pesanan',]);
Route::post('/pesanan', [App\Http\Controllers\summaryController::class, 'status',]);
Route::get('/pembayaran/{id}', [App\Http\Controllers\summaryController::class, 'pembayaran',]);
Route::get('/konfirmasi_bayar/{id}', [App\Http\Controllers\summaryController::class, 'konfirmasi',]);
Route::get('/invoice/{id}', [App\Http\Controllers\summaryController::class, 'invoice',]);
Route::post('/kontak', [App\Http\Controllers\KontakController::class, 'index',]);

// Route::middleware(['auth', 'admin.access'])->group(function () {
//     Route::get('admin/dashboard', function () {
//     })->name('admin.custom.barangs');
// });

// Route::middleware(['auth', 'admin.access'])->group(function () {
    
    
    
//     Route::get('/admin/dashboard', function () {
//         // Logika halaman admin dashboard
//     });
// });


// Route::post('/produk/cari', [App\Http\Controllers\ProdukController::class, 'cari',]);





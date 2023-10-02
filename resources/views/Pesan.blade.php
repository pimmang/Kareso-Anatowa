@extends('layouts/main')
@section('main')
    @php
        use App\Models\Gambar_Barang;
        $barang_id = $barang->id;
        $gambar = Gambar_Barang::where('barang_id', $barang_id)->get();
        
    @endphp
    <div id="pesan-container " class="container">
        <div class="card mt-2">
            <div class="row">
                <div class="col-md-6 align-items-top mt-4">
                    <div class="container d-flex" style="overflow: hidden; overflow-x:scroll">
                        @foreach ($gambar as $row)
                            <img src="{{ asset('storage/' . $row->gambar_barang) }}" alt="{{ $barang->nama_barang }}"
                                style=" border-radius:15px; width:100%" class="img-fluid me-5">
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6">
                    <div id="nama-barang-pesan" class="container">
                        <h1 class="mt-3" style="color:#51B19D; font-family:'Play', sans-serif;">
                            {{ $barang->nama_barang }}
                        </h1>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp {{ number_format($barang->harga) }}</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>{{ $barang->stok }}</td>
                                </tr>
                                <tr>
                                    <td>Merk</td>
                                    <td>:</td>
                                    <td>{{ $barang->merk }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>{{ $barang->deskripsi }}</td>
                                </tr>

                                <tr>
                                    <td style="vertical-align:middle;">Jumlah</td>
                                    <td style="vertical-align:middle;">:</td>
                                    <td>
                                        <form action="{{ url('pesan') }}/{{ $barang->id }}" method="post">
                                            @csrf
                                            <input type="number" name="jumlah_pesanan" placeholder="Jumlah Pesanan"
                                                class="form-control " required="">
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: end;">
                                        <button id="tombol-keranjang" type="submit"> <i
                                                class="fa fa-shopping-cart me-1"></i>Tambah Ke Troli </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="row d-flex flex-row">
                <div class="col-md-6 d-flex align-items-center">
                    <img src="/uploads/{{ $gambar->gambar_barang }}" alt="{{ $barang->nama_barang }}"
                        style="width: 100%; margin:7px; border-radius:15px">
                </div>

                <div class="col-md-6 d-flex justify-content-between align-items-center">
                    <form action="{{ url('pesan') }}/{{ $barang->id }}" method="post">
                        <div class="container-fluid">
                            <div id="nama-barang-pesan" class="container d-flex justify-content-between">
                                <h3 class="mt-3" style="color:#51B19D; font-family:'Super Comic', sans-serif;">
                                    {{ $barang->nama_barang }}
                                </h3>
                            </div>

                            <div class="container-fluid d-flex  flex-column justify-content-end mb-2 ">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($barang->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ $barang->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td>Merk</td>
                                            <td>:</td>
                                            <td>{{ $barang->merk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td>{{ $barang->deskripsi }}</td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align:middle;">Jumlah</td>
                                            <td style="vertical-align:middle;">:</td>
                                            <td>

                                                @csrf
                                                <input type="text" name="jumlah_pesanan" placeholder="Jumlah Pesanan"
                                                    class="form-control " required="">
                                                {{-- <button id="tombol-keranjang" type="submit"> <i
                                                    class="fa fa-shopping-cart me-1"></i>Masukan Ke
                                                Keranjang </button> --}}
            {{-- </td>

            <td>
            </td>
            </tr>

            </tbody>
            </table>
            <div class="continer d-flex justify-content-end">
                <button id="tombol-keranjang" type="submit" name="action" value="keranjang"> <i
                        class="fa fa-shopping-cart me-2 "></i>Tambah Ke
                    Troli </button>
            </div>
        </div>

    </div>

    </form>
    </div>
    </div>  --}}
        </div>
        <div id="menu-kategori" class="container-fluid d-flex ms-0">
            <div id="home-terlaris" class="container">
                <button class="btn-kategori">Kategori</button>
            </div>
            <form action="/pesanan/{{ $barang->id }}" method="post" id="item-kategori" class="container p-0">
                <div class="container d-flex justify-content-start my-2 p-0">
                    @csrf
                    @foreach ($kategoris as $kategori)
                        <button name="kategori"
                            class="btn btn-kategori-item ms-0 {{ $status == $kategori->nama_kategori ? 'aktif' : '' }} "
                            value="{{ $kategori->nama_kategori }}">
                            {{ $kategori->nama_kategori }}</button>
                    @endforeach
                </div>
            </form>
        </div>
        <div id="daftar-produk"class="container d-flex flex-row flex-wrap justify-content-center ">
            @if (count($barangs) > 0)
                @foreach ($barangs as $barangss)
                    <div class="card buram m-2" id="card-produk">
                        <a href="/pesan/{{ $barangss->id }}">
                            <div class="scroll-horizontal2 d-flex justify-content-between" style="width:100%">
                                @foreach ($barangss->Gambar_Barang as $gambar)
                                    <img src="{{ asset('storage/' . $gambar->gambar_barang) }}"
                                        alt="{{ $barangss->nama_barang }}" id="foto-produk" class="img-fluid p-1">
                                @endforeach
                            </div>
                            <div id="keterangan"class="card-body text-center">
                                <h5 class="card-subtitle">Rp {{ number_format($barangss->harga, 0, ',', '.') }}</h5>
                                <h5 id="nama-produk" class="card-title ">{{ $barangss->nama_barang }}</h5>
                                <p class="card-text">{{ $barangss->berat }} gram</p>
                                <p class="card-text">By. {{ $barangss->merk }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <h4 style="font-family: 'Play', sans-serif; color: #51b19d;text-align:center; margin-top:3%"> Barang
                    Dengan
                    Kategori
                    Tersebut Tidak Ditemukan
                </h4>
            @endif

        </div>

        <br><br><br><br>

        <style>
            th,
            td {
                font-family: 'montserrat', sans-serif;
                font-weight: 900;
            }

            input::placeholder {
                font-weight: 900;
            }

            .aktif {
                /* background-color: black !important; */
                background: linear-gradient(to right, #51b19d, #5eb9c0);
                color: white;
            }
        </style>
        <br><br><br><br><br><br>
    @endsection

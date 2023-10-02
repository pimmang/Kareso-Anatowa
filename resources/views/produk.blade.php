@extends('layouts/main')

@section('main')
    {{-- <div class="container-fluid">
        <img src="/img/bannerproduk.png" alt="Banner Produk" width="100%" id="banner3">
        <img src="/img/bannerproduk.png" alt="Banner Produk" width="100%" id="banner2">
    </div> --}}

    <div class="container-fluid justify-content-center">
        <div id="menu-kategori" class="container-fluid d-flex ms-0">
            <div id="home-terlaris" class="container">
                <button class="btn-kategori">Kategori</button>
            </div>
            <form action="/produk" method="post" id="item-kategori" class="container p-0">
                <div class="container d-flex justify-content-between my-2 p-0">
                    @csrf
                    <button name="kategori" class="btn btn-kategori-item ms-0 {{ $status == 'Semua' ? 'aktif' : '' }} "
                        value="Semua">Semua</button>
                    @foreach ($kategoris as $kategori)
                        <button name="kategori"
                            class="btn btn-kategori-item ms-0 {{ $status == $kategori->nama_kategori ? 'aktif' : '' }} "
                            value="{{ $kategori->nama_kategori }}">
                            {{ $kategori->nama_kategori }}</button>
                    @endforeach
                </div>
            </form>
        </div>
        <div id="daftar-produk"class="container-fluid d-flex flex-row flex-wrap justify-content-center ">
            @if (count($barang) > 0)
                @foreach ($barang as $barangs)
                    <div class="card buram m-2" id="card-produk">
                        <a href="/pesan/{{ $barangs->id }}">
                            <div class="scroll-horizontal2 d-flex justify-content-between" style="width:100%">
                                @foreach ($barangs->Gambar_Barang as $gambar)
                                    <img src={{ asset('storage/' . $gambar->gambar_barang) }}
                                        alt="{{ $barangs->nama_barang }}" id="foto-produk" class="img-fluid p-1">
                                @endforeach
                            </div>
                            <div id="keterangan"class="card-body text-center">
                                <h5 class="card-subtitle">Rp {{ number_format($barangs->harga, 0, ',', '.') }}</h5>
                                <h5 id="nama-produk" class="card-title ">{{ $barangs->nama_barang }}</h5>
                                <p class="card-text">{{ $barangs->berat }} gram</p>
                                <p class="card-text">By. {{ $barangs->merk }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <h4 style="font-family: 'Play', sans-serif; color: #51b19d;text-align:center;"> Barang Dengan Kategori
                    Tersebut Tidak Ditemukan
                </h4>
            @endif

        </div>

        <br><br><br><br>
    </div>
    <style>
        #item-kategori {
            overflow: hidden;
            overflow-x: scroll;
        }

        #kategori-mobile {
            overflow: hidden;
            overflow-x: scroll;
            margin-bottom: -9px !important;
        }

        #kategori-mobile::-webkit-scrollbar {
            width: 0;
            height: 0%;
        }

        #item-kategori::-webkit-scrollbar {
            width: 0;
            height: 0%;
        }

        td {
            white-space: nowrap;
            padding: 5px;
        }

        .aktif {
            /* background-color: black !important; */
            background: linear-gradient(to right, #51b19d, #5eb9c0);
            color: white;
        }
    </style>
@endsection

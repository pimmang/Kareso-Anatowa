@extends('layouts.main')
@section('main')
    <div class="row bg-dark mb-4 d-flex justify-content-center">
        <div class="container-fluid row mt-2 mb-5">
            <div class="col-sm-6 mb-sm-0 mb-4" id="summary-card">
                <img src="/img/bayar.png" alt="Card" class="img-fluid" style="overflow: hidden">
            </div>
            <div class="col-sm-6 d-flex align-items-center justify-content-center" id="summary-card2">
                <div class="card" style="width: 95% ;background-color: rgb(26, 129, 108, 0.2)">
                    @php
                        use App\Models\Barang;
                        use App\Models\Gambar_barang;
                        $alamat = $profil->alamat;
                    @endphp
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: start; color:white !important;">Summary</h5>
                        <h5 style="color:white;" id="judul">Alamat</h5>
                        <div class="d-flex">
                            <p class="me-1"style="color: rgb(218, 255, 175);">{{ $profil->name }}</p>
                            <p style="color:rgb(218, 255, 175);">{{ $profil->nomor_hp }}</p>
                        </div>
                        <p style="color:rgb(218, 255, 175)">{{ $alamat }}</p>
                        <div class="card p-2 mb-2" style="background-color: rgb(26, 129, 108, 0.2)">
                            @foreach ($detail_pesanan as $detail)
                                @php
                                    $barang_id = $detail->barang_id;
                                    $barang = Barang::where('id', $barang_id)->first();
                                    $gambar = Gambar_barang::where('barang_id', $barang_id)->first();
                                @endphp

                                <div class="d-flex justify-content-between my-1">
                                    <div class="card" style="width: 30vw; height: 20vw;" id="card2">
                                        <img class="img-fluid" src={{ asset('storage/' . $gambar->gambar_barang) }}
                                            alt="{{ $barang->nama_barang }}"
                                            style="height:100%; width:100%; object-fit: cover;">
                                    </div>
                                    <div class="card d-flex align-items-center" style="width:70%; height: 20vw; padding:5px"
                                        id="card3">
                                        <div class="container d-flex flex-column justify-content-between"
                                            style="height:100%">
                                            <h5 style="padding:0%;margin:0%;color:white;">{{ $barang->nama_barang }}
                                            </h5>
                                            <p style="padding:0%;margin:0%;color:white;">By. {{ $barang->merk }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <p style="padding:0%;margin:0%; color:white;">Rp
                                                    {{ $barang->harga }}
                                                </p>
                                                <p style="padding:0%;margin:0%;color:white;">
                                                    x{{ $detail->jumlah_barang }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 style="color:white;">Informasi Pengiriman</h5>
                        <p style="color:rgb(218, 255, 175);">Dari Luwu Timur Ke {{ $alamats->kota }}</p>
                        <p style="color:rgb(218, 255, 175);">Kode Unik : {{ $pembayaran->kode_unik }}</p>
                        <p style="color:rgb(218, 255, 175);"> Kurir : {{ $pembayaran->kurir }}</p>
                        <p style="color:rgb(218, 255, 175);">Service : {{ $pembayaran->service }}</p>
                        <p style="color:rgb(218, 255, 175);">Ongkos Kirim : {{ $pembayaran->ongkos_kirim }}</p>
                        <h5 style="color:white;">Metode Pembayaran : {{ $pembayaran->metode_pembayaran }}</h5>
                        <div class=" d-flex justify-content-between">
                            <h5 id="total_pembayaran" style="color: white"> Total : Rp
                                {{ number_format($pembayaran->total_bayar) }}</h5>
                            @if ($pembayaran->status == 'Belum Bayar')
                                <form action="/summary/{{ $pesanan->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Bayar</button>
                                </form>
                            @elseif ($pembayaran->status == 'Diantar')
                                <form action="/summary/konfirmasi/{{ $pesanan->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Pesanan Diterima</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #card2,
        #card3 {
            border-radius: 0% !important;
            box-shadow: 0 !important;
            background-color: rgb(26, 129, 108, 0) !important;
        }

        select,
        option {
            border-radius: 4px !important;
            box-shadow: 0 !important;
            background-color: rgb(26, 129, 108, 0) !important;
        }

        h5 {
            font-family: 'montserrat', sans-serif;
            font-weight: bolder;
        }

        p {
            font-family: 'montserrat', sans-serif;
        }

        @media only screen and (max-width: 480px) {
            h5 {
                font-size: 15px;
            }

            #judul {
                font-size: 20px
            }

            p {
                font-size: 13px;
            }
        }

        @media only screen and (min-width: 1025px) {
            #card2 {
                width: 10vw !important;
                height: 7vw !important;
                padding: 5px;
            }

            #card3 {
                width: 100% !important;
                height: 7vw !important;
            }

            .card-title {
                font-size: 30px;
            }


        }
    </style>
@endsection

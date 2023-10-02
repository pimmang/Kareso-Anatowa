@extends('layouts/main')

@section('main')
    @php
        use App\Models\detail_pesanan;
        use Carbon\Carbon;
        use App\Models\Barang;
        use App\Models\Gambar_Barang;
        use App\Models\Pembayaran;
    @endphp
    <div class="container d-flex justify-content-center">
        <div class="container d-flex flex-column align-items-center">
            <div class="card my-2 p-2 card-besar d-flex justify-content-center align-items-center utama">
                <form action="/pesanan" method="post" class="container m-3 status">
                    <div class="container d-flex justify-content-between my-2"
                        style="margin-left:0px;overflow:hidden; overflow-x:scroll; padding:0px;">
                        @csrf
                        <button name="status" class="btn btn-kategori-item {{ $status == 'Semua' ? 'aktif' : '' }}"
                            value="Semua">Semua</button>
                        <button name="status" class="btn btn-kategori-item {{ $status == 'Belum Bayar' ? 'aktif' : '' }}"
                            value="Belum Bayar">Belum Bayar</button>
                        <button name="status" class="btn btn-kategori-item {{ $status == 'Diverifikasi' ? 'aktif' : '' }}"
                            value="Diverifikasi">Diverifikasi</button>
                        <button name="status" class="btn btn-kategori-item {{ $status == 'Sudah Bayar' ? 'aktif' : '' }}"
                            value="Sudah Bayar">Sudah Bayar</button>
                        <button name="status" class="btn btn-kategori-item {{ $status == 'Diantar' ? 'aktif' : '' }}"
                            value="Diantar">Diantar</button>
                        <button name="status" class="btn btn-kategori-item {{ $status == 'Selesai' ? 'aktif' : '' }}"
                            value="Selesai">Selesai</button>
                    </div>
                </form>
                @if (empty($pesanan) && $status == 'Semua')
                    <h5 class="card-title kosong"> Belum ada pesanan, silahkan checkout terlebih dahulu </h5>
                @else
                    @foreach ($pesanan as $pesan)
                        <div class="card mt-2"style="width:20rem;">
                            @php
                                $timestamp = $pesan->created_at;
                                $carbonDate = Carbon::parse($timestamp);
                                $bulan = $carbonDate->monthName; // Nama bulan dalam bahasa Inggris, misalnya "July"
                                $tanggal = $carbonDate->day;
                                $tahun = $carbonDate->year;
                                $pembayaran = Pembayaran::where('user_id', Auth::user()->id)
                                    ->where('pesanan_id', $pesan->id)
                                    ->first();
                            @endphp
                            <div class="container d-flex justify-content-between px-2 mt-2">
                                <h5 class="card-title">{{ $tanggal . ' ' . $bulan . ' ' . $tahun }} </h5>
                                <p class="card-text">{{ $pembayaran->status }}</p>
                            </div>
                            @php
                                $details = detail_pesanan::where('pesanan_id', $pesan->id)->get();
                            @endphp
                            @foreach ($details as $detail)
                                @php
                                    $barang_id = $detail->barang_id;
                                    $barang = Barang::where('id', $barang_id)->first();
                                    $gambar = Gambar_barang::where('barang_id', $barang_id)->first();
                                @endphp
                                <div class="d-flex justify-content-between mx-2 my-1" style="border : 1px solid #51b19d;"
                                    id="frame">
                                    <div class="" style="width: 30vw; height: 20vw;" id="card2">
                                        <img class="img-fluid" src={{ asset('storage/' . $gambar->gambar_barang) }}
                                            alt="{{ $barang->nama_barang }}"
                                            style="height:100%; width:100%; object-fit: cover;">
                                    </div>
                                    <div class="d-flex align-items-center"
                                        style="width:70%; height: 20vw; padding:5px; overflow:hidden;" id="card3">
                                        <div class="container d-flex flex-column justify-content-between"
                                            style="height:100%;">
                                            <h5 id="nama_barang"style="padding:0%;margin:0%;color:black;">
                                                {{ $barang->nama_barang }}
                                            </h5>
                                            <p id="nama_barang" style="padding:0%;margin:0%;color:black;">By.
                                                {{ $barang->merk }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <p style="padding:0%;margin:0%; color:black;">Rp
                                                    {{ number_format($barang->harga) }}
                                                </p>
                                                <p style="padding:0%;margin:0%;color:black;">
                                                    x{{ $detail->jumlah_barang }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="container d-flex justify-content-between">
                                @if ($pembayaran->status == 'Diantar')
                                    <form action="/summary/konfirmasi/{{ $pesan->id }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-success my-2 me-0 py-1">Pesanan Diterima</button>
                                    </form>
                                @elseif($pembayaran->status == 'Belum Bayar')
                                    <form action="/summary/{{ $pesan->id }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-success my-2 me-0 py-1">Bayar</button>
                                    </form>
                                @endif
                                <a href="/invoice/{{ $pesan->id }}" class="btn btn-outline-warning my-2 me-0 py-1">
                                    Selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <style>
        .aktif {
            background-color: #37b49b;
            color: white;
            border: 1px solid #37b49b;

        }

        .card-title {
            text-overflow: initial;
            white-space: initial;
            overflow: initial;
        }

        .container .btn {
            margin-left: 0 !important;
            /* Menghapus margin kiri */
        }

        .kosong {
            margin: 10%;
            text-align: center !important;
        }

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

        #nama_barang {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .frame-produk {
            overflow: clip;
            overflow-y: scroll;
        }



        @media only screen and (max-width: 480px) {
            .frame-produk {
                width: 100%;
                height: 30px;
                border: 1px solid black;
            }

            .status {
                padding-left: 15%;
                padding-right: 15%;
            }

            h5 {
                font-size:
            }

            h5.card-title {
                font-size: 15px !important;
                text-align: left;

            }

            .kosong {
                text-align: center !important;
            }

            h5#nama_barang {
                font-size: 15px !important;
            }

            .card-text {
                font-size: 12px;
            }

            p {
                font-size: 11px;
                font-weight: bolder;
            }

            #frame {
                border-radius: 5px
            }

            img {
                border-radius: 8px;
                padding: 5px;
            }

            .utama {
                margin-bottom: 80px !important;
            }

        }

        @media only screen and (min-width: 1025px) {
            .card-besar {
                margin-bottom: 80px !important;
                width: 35%;
            }

            .frame-produk {
                width: 100%;
                height: 30%;
                border: 1px solid black;
            }

            h5 {
                font-size: 16px;
            }

            img {
                border-radius: 5px
            }

            #frame {
                border-radius: 10px
            }

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
                font-size: 15px;
                text-align: left !important;
            }

            .kosong {
                margin: 10%;
                text-align: center !important;
            }

            p {
                font-size: 12px;
                font-weight: bolder;
            }

            ;
        }
    </style>
@endsection

@extends('layouts\main')
@section('main')
    <div class="contain d-flex justify-content-center ">
        <div class="container d-flex justify-content-center align-items-center my-5">
            <div class="card mb-5" style="width: 20rem;">
                <img src="/img/bayar.png" class="card-img-top" alt="Kartu">
                <div class="card-body">
                    <h3 class="card-title mb-3">Transfer E-Wallet</h3>
                    <p class="card-text"> Semua Tujuan Atas Nama Firman</p>
                    <p class="card-text">DANA : 082188740479</p>
                    <p class="card-text">Shopepay : 082188740479 </p>
                    <p id="note"class="mb-2">Bayar Total : Rp {{ number_format($pembayaran->total_bayar) }}</p>
                    <p id="note">Note : Pastikan untuk menuliskan angka sampai pada digit terakhir</p>
                    <div class="container d-flex justify-content-center">
                        <a href="/konfirmasi_bayar/{{ $pesanan->id }}" class="btn btn-success">Saya Sudah Bayar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card">
        <div class="card-title">Bank Transfer</div>
        <div class="card-body">
            <h5>BRI : 501401023989534 a.n Firman</h5>
            <h5>BCA : 8735662836 a.n Firman</h5>
            <h5>BTPN : 90320208551 a.n Firman</h5>
        </div>
    </div> --}}
    <style>
        .card-text {
            text-overflow: clip;
            /* Menghapus elipsis */
            white-space: normal;
            /* Mengembalikan spasi putih */
            overflow: visible;
            /* Mengembalikan overflow ke nilai default */
        }

        p,
        h5 {
            text-align: center;
        }

        #note {
            color: #51b19d;
        }

        @media only screen and (max-width: 480px) {
            p.card-text {
                font-size: 12px;
            }

            #note {
                color: #51b19d;
            }
        }
    </style>
@endsection

@php
    use App\Models\Barang;
    use App\Models\Gambar_Barang;
@endphp
@extends('layouts/main')
@section('main')
    <div class="container d-flex justify-content-center" id="container-keranjang">
        <div class="card my-5">
            <div class="card-body">
                <h5 id="Keranjang-judul" class="card-title">Cek Keranjang Anda</h5>
                {{-- <form action="{{ url('keranjang') }}" method="get"> --}}
                @if (empty($pesanan_detail))
                    <h5 class="card-text ms-3 align text-center">Belum Ada Pesanan, Silahkan Pesan Produk</h5>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th id="nama-barang-pesanan">Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($pesanan_detail as $pesanan1)
                                    @php
                                        // $pesanan = pesanan::where('user_id', Auth::user()->id)->get();
                                        $barang = Barang::where('id', $pesanan1->barang_id)->first();
                                        $gambar = gambar_barang::where('barang_id', $barang->id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src={{ asset('storage/' . $gambar->gambar_barang) }}
                                                alt="{{ $barang->nama_barang }} " width="80px">
                                        </td>
                                        <td id="nama-barang-pesanan">
                                            {{ $barang->nama_barang }}
                                        </td>
                                        <td>
                                            {{ $pesanan1->jumlah_barang }} Pcs
                                        </td>
                                        <td>
                                            {{ $barang->stok }} Pcs
                                        </td>
                                        <td>
                                            Rp {{ number_format($barang->harga) }}
                                        </td>
                                        <td>
                                            Rp {{ number_format($pesanan1->jumlah_harga) }}
                                        </td>
                                        <td>
                                            <form action="{{ url('keranjang') }}/{{ $pesanan1->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @php
                        $total_harga = $pesanan->jumlah_harga;
                    @endphp
                @endif
                <div id="checkout" class="container d-flex justify-content-between">
                    @if (empty($pesanan_detail))
                        <a href="/home" class="btn" id="tombol-logout">Home</a>
                    @else
                        <h5 class="card-title"> Total : Rp {{ number_format($total_harga) }}</h5>
                        <a href="/checkout/{{ $pesanan->id }}" class="btn" id="tombol-login">Checkout</a>
                    @endif
                </div>
                {{-- </form> --}}
            </div>
        </div>

    </div>


    <style>
        td {
            vertical-align: middle;
        }

        th {
            white-space: nowrap;
            color: #51B19D !important;
            font-family: 'Montserrat', sans-serif;

        }

        .card-title {
            color: #51B19D;
            margin-top: auto;
        }
    </style>

    <!-- Letakkan kode JavaScript di bagian bawah halaman -->


@endsection

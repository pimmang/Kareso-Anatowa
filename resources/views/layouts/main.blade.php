@php
    use App\Models\pesanan;
    use App\Models\detail_pesanan;
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery Anatowa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
            <div class="container-fluid ">
                <a class="nav-link" href="/"><img src="/img/logo.png" alt="logo" id="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/home" id="nav-item">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about" id="nav-item">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact" id="nav-item">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/produk" id="nav-item">Produk</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/pesanan"><img src="/img/Clipboard.svg" alt="Pesanan"
                                    width="25px"></a>
                        </li>
                        <li class="nav-item">
                            @guest
                                @php
                                    $jumlah_keranjang = '0';
                                @endphp
                            @else
                                @php
                                    
                                    $cek_pesanan = pesanan::where('user_id', Auth::user()->id)->count();
                                    $cek_ada_pesanan_baru = pesanan::where('user_id', Auth::user()->id)
                                        ->where('status', 0)
                                        ->count();
                                    if ($cek_ada_pesanan_baru == 0) {
                                        $cek_pesanan = 0;
                                    } else {
                                        $cek_status_pesanan = pesanan::where('user_id', Auth::user()->id)
                                            ->where('status', 0)
                                            ->first();
                                    }
                                    
                                    if ($cek_pesanan == 0) {
                                        $jumlah_keranjang = 0;
                                    } else {
                                        if ($cek_status_pesanan->status == 0) {
                                            $pesanan = pesanan::where('user_id', Auth::user()->id)
                                                ->where('status', 0)
                                                ->first();
                                            $jumlah_keranjang = detail_pesanan::where('pesanan_id', $pesanan->id)->count();
                                        } else {
                                            $jumlah_keranjang = 0;
                                        }
                                    }
                                @endphp
                            @endguest
                            <a class="nav-link" href="/keranjang"><img src="/img/shopingcart.svg" alt="Keranjang"
                                    id="nav-item2"><span
                                    class=" top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $jumlah_keranjang }}
                                </span></a>
                        </li>
                    </ul>
                    <form class="d-flex flex-grow-1" role="search" action="/produk" method="post">
                        @csrf
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            id="form-cari" name="cari">
                        <button type="submit" id="tombol-cari">Cari</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <nav id="nav2">
        <div class="container-fluid d-flex justify-content-between mt-3" id="menu2">
            <div class="container" id="cari2" style="width:100% ;">
                <form class="d-flex justify-content-between" role="search" action="/produk" method="post">
                    @csrf
                    <button id="cari" class="btn "type="submit" style="color:#51b19d"><i
                            class="fa fa-search align-items-center"></i></button>
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="form-cari2"
                        name="cari">
                </form>
            </div>
            <div class="container d-flex align-items-center" style="width: 15%">
                @guest
                    @php
                        $jumlah_keranjang = '0';
                    @endphp
                @else
                    @php
                        
                        $cek_pesanan = pesanan::where('user_id', Auth::user()->id)->count();
                        $cek_ada_pesanan_baru = pesanan::where('user_id', Auth::user()->id)
                            ->where('status', 0)
                            ->count();
                        if ($cek_ada_pesanan_baru == 0) {
                            $cek_pesanan = 0;
                        } else {
                            $cek_status_pesanan = pesanan::where('user_id', Auth::user()->id)
                                ->where('status', 0)
                                ->first();
                        }
                        
                        if ($cek_pesanan == 0) {
                            $jumlah_keranjang = 0;
                        } else {
                            if ($cek_status_pesanan->status == 0) {
                                $pesanan = pesanan::where('user_id', Auth::user()->id)
                                    ->where('status', 0)
                                    ->first();
                                $jumlah_keranjang = detail_pesanan::where('pesanan_id', $pesanan->id)->count();
                            } else {
                                $jumlah_keranjang = 0;
                            }
                        }
                    @endphp
                @endguest
                <a class="nav-item d-flex" href="/keranjang" id="keranjang2">
                    {{-- <span class="top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $jumlah_keranjang }}
                    </span> --}}
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                        class="badge bg-danger">{{ $jumlah_keranjang }}</span>
                </a>

                {{-- <a id="nav-item" class="nav-link" href="/keranjang"><i class="fa fa-shopping-cart"></i><span
                        class=" top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $jumlah_keranjang }}
                    </span> --}}
                {{-- </a> --}}

            </div>
        </div>
        <ul class="container-fluid d-flex" id="menu">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home" id="nav-item"
                    style="font-size: smaller; margin-left:0%"><i class="fa fa-home"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/produk" id="nav-item"><i class="fa fa-shopping-bag"></i>Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pesanan" id="nav-item"><i class="fa fa-shopping-basket"></i>Pesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about" id="nav-item"><i class="fa fa-users"></i>About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact" id="nav-item"><i class="fa fa-phone"></i>Kontak</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profil" id="nav-item"><i class="fa fa-user"></i>Profil</a>
            </li>

        </ul>
    </nav>
    <header>

    </header>

    <style>
        #keranjang2 {
            color: #51b19d;
            font-size: larger
        }

        #menu {
            margin-top: 9px;
            margin-bottom: 0px;
            list-style: none;
            overflow: hidden;
            overflow-x: scroll;


        }

        #cari2 {
            border: 1pt solid #51b19d;
            border-radius: 12px;
        }

        #menu2 ul {
            list-style: none;
            width: auto;

        }

        #menu2 ul li a {
            color: #51b19d;
            margin: auto;

        }

        #nav2 ul li {
            font-size: small;

        }
    </style>

    <main>
        @yield('main')
    </main>

    <footer id="footer1">
        <ul class="navbar-nav d-flex justify-content-between bg-white">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" id="tombol-daftar">{{ __('Daftar') }}</a>
                    </li>
                @endif
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" id="tombol-login">{{ __('Masuk') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item d-flex">
                    <a href="/home"
                        style="text-decoration:none; color:grey; margin: auto; margin-left:20px; font-family:'montserrat', sans-serif; text-weight;bolder">KKNT
                        110
                        UNHAS</a>
                    <a class="nav-link me-2 my-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        id="tombol-logout">
                        {{ __('Keluar') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </footer>

    <footer id="footer2">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm justify-content-end">
            <div class="container-fluid d-flex justify-content-end">

                <div class="">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"
                                        id="tombol-daftar">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"
                                        id="tombol-login">{{ __('Masuk') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Keluar') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}
                            <li class="nav-item d-flex">
                                <p class="nav-link " style="margin :auto;">Selamat Datang {{ Auth::user()->name }} | </p>
                                <a href="/profil" style="font-size:30px; color:grey; margin:auto;" class="mx-2"><i
                                        class="fa fa-user"></i></a>
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    id="tombol-logout">
                                    {{ __('Keluar') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </footer>
    {{-- <footer>
            <nav class="navbar navbar-expand-lg fixed-bottom" id="footer">
                <div class="container-fluid" >
                    <ul class="navbar-nav  mb-lg-0">
                      <li class="nav-item" >
                        {{-- <a class="nav-link active me-auto " aria-current="page" href="#" id="foot-item">Ayo Dukung UMKM, Ayo Belanja Di Sini</a> --}}
    {{-- </li>
                    </ul>
                    <div>
                       <button type="submit" id="tombol-login">Login</button>
                       <button type="submit" id="tombol-daftar">Daftar</button>
                      </div>
                  </div>
              </nav>
      </footer> --}}






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')

    <script>
        $(document).on('click', '[data-confirm-delete]', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var id = form.attr('action').split('/').pop();
            swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda akan menghapus data ini',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('keranjang') }}/" + id,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                swal.fire('Berhasil', data.message, 'success');
                                // reload halaman atau hapus baris data dari tabel
                            } else {
                                swal.fire('Gagal', data.message, 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            swal.fire('Error', 'Terjadi kesalahan saat menghapus data',
                                'error');
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>

@extends('layouts.app')

@section('content')
    <div class="container justify-content-center align-items-center" style="height: 80vh;">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card" style="border-radius:20px">
                    <div class="card-body">
                        <div class="container text-center">
                            <h1 style="color:#51b19d; font-weight:bolder">Daftar Sekarang!</h1>
                            <p class="mb-5" style="color:#9D9D9D">Untuk Berbelanja Di Galery Kareso Anatowa</p>
                        </div>
                        <div class="container">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Nama">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Konfirmasi Password">
                                    </div>
                                </div>

                                <div class="row mb-12">
                                    <div class="container">
                                        <button type="submit" class="btn"
                                            style="border-radius: 5px; background-color: #51b19d;width:100% ;font-weight:bolder;color:white; font-family: 'Montserrat', sans-serif; box-shadow: 0px 0px 4px 2px rgba(0, 0, 0, 0.25);">
                                            {{ __('Daftar') }}
                                        </button>
                                    </div>
                                </div>

                                <div class=" my-3 d-flex justify-content-between">
                                    <p style="color: #9D9D9D">Sudah Punya Akun?</p>
                                    <a href="{{ route('login') }}"
                                        style="text-decoration: none;color:#51b19d;font-weight:bolder;font-size:1rem">Masuk</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        input {
            font-family: 'montserrat', sans-serif !important;
            font-weight: 100 !important;
        }
    </style>
@endsection

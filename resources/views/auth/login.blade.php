@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="container d-flex justify-content-center mt-2">
            <div class="col-md-6">
                <div class="card" style="border-radius: 20px">
                    <div class="card-body">
                        <div class="container text-center">
                            <h1 style="color:#51b19d; font-weight:bolder">Login</h1>
                            <p class="mb-5" style="color:#9D9D9D">Untuk Berbelanja Di Galery Kareso Anatowa</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        style="box-shadow: 0px 0px 4px 2px rgba(0, 0, 0, 0.25);">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password"
                                        style="box-shadow: 0px 0px 4px 2px rgba(0, 0, 0, 0.25);">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-12">
                                <div class="container">
                                    <button type="submit" class="btn"
                                        style="border-radius: 5px; background-color: #51b19d;width:100% ;font-weight:bolder;color:white; font-family: 'Montserrat', sans-serif; box-shadow: 0px 0px 4px 2px rgba(0, 0, 0, 0.25);">
                                        {{ __('Masuk') }}
                                    </button>
                                </div>
                            </div>
                            <div class=" my-3 d-flex justify-content-between">
                                <p style="color: #9D9D9D">Belum Punya Akun?</p>
                                <a href="{{ route('register') }}"
                                    style="text-decoration: none;color:#51b19d;font-weight:bolder;font-size:1rem">Daftar</a>
                            </div>
                            <div class="row mb-3">
                                <div class="container d-flex justify-content-between">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>

    </style>
@endsection

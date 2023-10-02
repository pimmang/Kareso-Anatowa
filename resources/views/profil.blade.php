@extends('layouts.main')
@section('main')
    <div id="card-profil"class="container d-flex justify-content-center mt-2">
        <div class="card">
            <div class="container d-flex justify-content-center  flex-wrap">
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title my-2" style="margin-left:0;">Profil</h5>
                        <input id="nama2" type="text" class="form-control @error('nama') is-invalid @enderror my-1"
                            name="nama" value="{{ $profil->name }}" required autocomplete="name" autofocus disabled>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror my-2"
                            name="email" value="{{ $profil->email }}" required autocomplete="email" autofocus disabled>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror my-2"
                            name="nohp" value="{{ $profil->nomor_hp }}" required autocomplete="nohp" autofocus disabled
                            placeholder="Nomor Handphone">

                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror my-2"
                            name="alamat" value="{{ $profil->alamat }}" required autocomplete="alamat" autofocus disabled
                            placeholder="Alamat">

                        @error('alamat')
                            <span class="invalid-feedback my-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <a href="#nama1" class="btn btn-sm " style="background-color: #51B19D; width:100%;color:white; ">
                            Update
                        </a>

                    </div>

                </div>



                <div class="card m-3" style="width: 18rem;">
                    <form action="/profil" method="POST">
                        @csrf
                        <div class="card-body">
                            <h5 class="card-title my-2" style="margin-left:0;">Edit Profil</h5>
                            <input id="nama1" type="text"
                                class="form-control @error('nama1') is-invalid @enderror my-1" name="nama1" required
                                autocomplete="nama1" value="{{ $profil->name }}" autofocus>

                            @error('nama1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="email" type="text"
                                class="form-control @error('email') is-invalid @enderror my-2" name="email" required
                                autocomplete="email" value="{{ $profil->email }}" autofocus
                                style="color: grey; background-color: rgb(248, 248, 248) ">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="nohp" type="text"
                                class="form-control @error('nohp') is-invalid @enderror my-2" name="nohp" required
                                autocomplete="nohp" autofocus placeholder="Nomor Whatsapp">

                            @error('nohp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <select class="form-select my-2" aria-label="Default select example" name="provinsi"
                                id="provinsi" style="color: grey; " required>
                                <option selected>Provinsi</option>
                                @foreach ($provinsi as $provins)
                                    <option value="{{ $provins['province_id'] }}">{{ $provins['province'] }}</option>
                                @endforeach
                            </select>

                            <select class="form-select my-2" aria-label="Default select example" name="kabupaten"
                                id="kota" data-provinsi="" style="color: grey;" required>
                                <option selected>Kota/kabupaten</option>
                                @foreach ($kota as $row)
                                    <option value="{{ $row['city_id'] }}" data-provinsi="{{ $row['province_id'] }}">
                                        {{ $row['type'] . ' ' . $row['city_name'] }}
                                    </option>
                                @endforeach
                            </select>
                            <input id="kecamatan" type="text" class="form-control my-2" name="kecamatan" required
                                style="color: grey; " placeholder="Kecamatan">

                            <input id="kodepos" type="text" class="form-control my-2" name="kodepos" required
                                style="color: grey; " placeholder="Kode Pos">
                            <textarea name="alamat" id="alamat" class="form-control my-2" placeholder="Alamat Lengkap (jl, gedung, dll.)"></textarea>
                            {{-- <input id="alamat" type="text"
                                class="form-control @error('alamat') is-invalid @enderror my-2" name="alamat"
                                value="{{ $profil->alamat }}" required autocomplete="alamat" autofocus
                                placeholder="Alamat">

                            @error('alamat')
                                <span class="invalid-feedback my-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                            <input id="password" type="password"
                                class="form-control my-2  @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password" placeholder="Password Baru">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="password-confirm" type="password" class="form-control my-2"
                                name="password_confirmation" placeholder="Konfirmasi Password"
                                autocomplete="new-password">
                            <button type="submit" class="btn btn-sm"
                                style="background-color: #51B19D; width:100%; color:white; ">Perbarui Profil</button>

                            <p class="my-2" id="note-pass">Note : Isi Password jika anda ingin mengubah password</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <br><br><br>
    <script>
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');

        // Tambahkan event listener untuk perubahan pada opsi provinsi
        provinsiSelect.addEventListener('change', function() {
            const selectedProvinsiId = provinsiSelect.value;

            // Hapus opsi kota yang tidak sesuai dengan provinsi yang dipilih
            for (const option of kotaSelect.options) {
                const provinsiId = option.getAttribute('data-provinsi');
                if (provinsiId === selectedProvinsiId || selectedProvinsiId === '') {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            }
        });
    </script>
@endsection

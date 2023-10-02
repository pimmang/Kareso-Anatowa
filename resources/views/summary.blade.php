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
                        <form action="/summary/{{ $pesanan->id }}" method="POST">
                            @csrf
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
                                            <img class="img-fluid" src="{{ asset('storage/' . $gambar->gambar_barang) }}"
                                                alt="{{ $barang->nama_barang }}"
                                                style="height:100%; width:100%; object-fit: cover;">
                                        </div>
                                        <div class="card d-flex align-items-center"
                                            style="width:70%; height: 20vw; padding:5px" id="card3">
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
                            <h5 style="color:white;">Ongkos Kirim</h5>
                            <p style="color:rgb(218, 255, 175);">Dari
                                {{ $cost_jne['rajaongkir']['origin_details']['type'] . ' ' . $cost_jne['rajaongkir']['origin_details']['city_name'] . ' Ke ' . $cost_jne['rajaongkir']['destination_details']['type'] . ' ' . $cost_jne['rajaongkir']['destination_details']['city_name'] }}
                            </p>
                            <select class="form-select my-2" aria-label="Default select example" name="kurir"
                                id="kurir" style="color: white !important; " required>
                                <option selected value="">Pilih Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>
                            <select class="form-select my-2" aria-label="Default select example" name="ongkos_kirim"
                                id="jne" style=" color: white !important; " required>
                                <option value="" selected>Pilih Service</option>
                                @foreach ($cost_jne2 as $costs)
                                    @foreach ($costs['costs'] as $cost)
                                        <option
                                            @foreach ($cost['cost'] as $cos)
                                   value="{{ $cos['value'] }}|{{ $cost['service'] }}">{{ $cost['service'] }}, Rp {{ number_format($cos['value']) }}, Estimasi Sampai : {{ $cos['etd'] }} Hari
                                </option> @endforeach
                                            @endforeach
                                    @endforeach
                            </select>
                            <select class="form-select
                                            my-2"
                                aria-label="Default select example" name="ongkos_kirim" id="pos"
                                style="color: white !important; " required>
                                <option value="" selected style="">Pilih Service</option>
                                @foreach ($cost_pos as $costs)
                                    @foreach ($costs['costs'] as $cost)
                                        <option
                                            @foreach ($cost['cost'] as $cos)
                                        value="{{ $cos['value'] }}|{{ $cost['service'] }}">{{ $cost['service'] }}, Rp {{ number_format($cos['value']) }}, Estimasi Sampai : {{ $cos['etd'] }}
                                </option> @endforeach
                                            @endforeach
                                    @endforeach
                            </select>
                            <select class="form-select my-2" aria-label="Default select example" name="ongkos_kirim"
                                id="tiki" style="color: white !important; " required>
                                <option value="" selected>Pilih Service</option>
                                @foreach ($cost_tiki as $costs)
                                    @foreach ($costs['costs'] as $cost)
                                        <option
                                            @foreach ($cost['cost'] as $cos)
                                    value="{{ $cos['value'] }}|{{ $cost['service'] }}">{{ $cost['service'] }}, Rp {{ number_format($cos['value']) }}, Estimasi Sampai : {{ $cos['etd'] }} Hari {{ $cos['value'] }}
                                </option> @endforeach
                                            @endforeach
                                    @endforeach
                            </select>
                            <input type="text" class="form-control" name="catatan" placeholder="Catatan"
                                style="color:white !important;">
                            @php
                                $kodeunik = rand(1, 999);
                                $harga_pesanan = $pesanan->jumlah_harga;
                            @endphp

                            <p style="color: white">Kode Unik : {{ $kodeunik }}</p>
                            <p style="color: white">Total Pesanan : Rp {{ number_format($harga_pesanan) }}</p>
                            <p id="ongkos_kirim" style="color: white"></p>

                            <select class="form-select my-2" aria-label="Default select example" name="metode"
                                id="metode" style="color: white !important; " required>
                                <option selected value="">Pilih Metode Pembayaran</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Transfer E-Wallet">Transfer E-Wallet</option>
                            </select>
                            <input type="text" name="kode_unik" id="kode_unik" style="display: none;">
                            <input type="text" name="total_pembayaran" id="total_pembayaran2" style="display: none;">
                            <input type="text" name="ongkos_kirim2" id="ongkos_kirim2" style="display: none;">
                            <input type="text" name="service" id="service" style="display: none;">
                            <div class=" d-flex justify-content-between">
                                <h5 id="total_pembayaran" style="color: white"></h5>
                                <button class="btn btn-success" type="submit">Bayar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const kurirSelect = document.getElementById('kurir');
        const jneSelect = document.getElementById('jne');
        const posSelect = document.getElementById('pos');
        const tikiSelect = document.getElementById('tiki');
        jneSelect.style.display = 'none';
        posSelect.style.display = 'none';
        tikiSelect.style.display = 'none';
        kurirSelect.addEventListener('change', function() {
            jneSelect.style.display = 'none';
            posSelect.style.display = 'none';
            tikiSelect.style.display = 'none';
            if (kurirSelect.value === 'jne') {
                jneSelect.style.display = 'block';
            } else if (kurirSelect.value === 'pos') {
                posSelect.style.display = 'block';
            } else if (kurirSelect.value === 'tiki') {
                tikiSelect.style.display = 'block';
            }
        });
    </script>
    <script>
        // Mendapatkan elemen-elemen yang diperlukan
        const kodeUnik = parseFloat('{{ $kodeunik }}'); // Menggunakan variabel PHP
        const hargaPesanan = parseFloat('{{ $harga_pesanan }}');
        const ongkosKirimSelects = document.querySelectorAll('[name="ongkos_kirim"]');
        const totalPembayaranElem = document.getElementById('total_pembayaran');
        const ongkosKirimElem = document.getElementById('ongkos_kirim');
        const kodeUnikValue = document.getElementById('kode_unik');
        const totalPembayaranValue = document.getElementById('total_pembayaran2');
        const ongkosKirimValue = document.getElementById('ongkos_kirim2');
        const serviceValue = document.getElementById('service');

        // Menghitung total pembayaran ketika ada perubahan dalam elemen select
        function hitungTotalPembayaran() {
            let ongkosKirim = 0;
            let service = "";
            ongkosKirimSelects.forEach(function(select) {
                select.removeAttribute('required');
                if (select.style.display !== 'none') {
                    // ongkosKirim = parseFloat(select.value) || 0;
                    const parts = select.value.split("|");
                    ongkosKirim = parseFloat(parts[0]) || 0;
                    service = parts[1];
                    select.setAttribute('required', 'required');
                }
            });

            const totalPembayaran = hargaPesanan + kodeUnik + ongkosKirim;
            totalPembayaranElem.textContent = 'Total : Rp ' + totalPembayaran.toLocaleString();
            ongkosKirimElem.textContent = 'Ongkos Kirim : Rp ' + ongkosKirim.toLocaleString();
            console.log("Nilai Kode Unik : ", kodeUnik);
            console.log("Nilai harga Pesanan : ", hargaPesanan);
            console.log("Nilai ongkos kirim : ", ongkosKirim);
            console.log("Nilai total pembayaran : ", totalPembayaran);
            console.log("service : ", service);
            kodeUnikValue.value = kodeUnik;
            totalPembayaranValue.value = totalPembayaran;
            ongkosKirimValue.value = ongkosKirim;
            serviceValue.value = service;
            console.log(serviceValue.value);
            console.log(ongkosKirimValue.value);
        }

        // Menjalankan fungsi hitungTotalPembayaran saat ada perubahan dalam elemen select
        ongkosKirimSelects.forEach(function(select) {
            select.addEventListener('change', hitungTotalPembayaran);
        });
    </script>
    {{-- <script>
        const kurirSelect = document.getElementById('kurir');
        const ongkosKirimSelects = document.querySelectorAll('[name="ongkos_kirim"]');

        kurirSelect.addEventListener('change', function() {
            // Semua elemen ongkos kirim diatur menjadi tidak wajib saat pilihan kurir berubah
            ongkosKirimSelects.forEach(function(ongkosKirimSelect) {
                ongkosKirimSelect.removeAttribute('required');
                ongkosKirimSelect.style.display = 'none';
            });

            // Menemukan elemen ongkos kirim yang sesuai dan mengaturnya menjadi wajib
            const selectedValue = kurirSelect.value;
            const ongkosKirimSelect = document.getElementById(selectedValue);
            if (ongkosKirimSelect) {
                ongkosKirimSelect.setAttribute('required', 'required');
                ongkosKirimSelect.style.display = 'block';
            }
        });
    </script> --}}
    <style>
        input::placeholder {
            color: white !important;
            /* Ganti dengan warna yang Anda inginkan */
        }

        #card2,
        #card3 {
            border-radius: 0% !important;
            box-shadow: 0 !important;
            background-color: rgb(26, 129, 108, 0) !important;
        }

        select,
        option,
        input {
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

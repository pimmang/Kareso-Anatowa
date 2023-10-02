@extends('layouts/main')
@section('main')
    <div class="container d-flex justify-content-center">
        <div class="row container">
            <div class="col-md-6 d-flex" style="overflow:hidden; overflow-x:scroll;">
                <img class="img-fluid"src="img/About.jpg" alt="About">
                <img class="img-fluid" src="img/anatowa.jpg" alt="About">
            </div>
            <div class="col-md-6 " style="margin-bottom: 80px">
                <h5 class="card-title mt-2">Tentang Kami</h5>
                <p> Galery Kareso Anatowa adalah sebuah Galeri UMKM dan pusat
                    oleh-oleh di Luwu Timur, yang
                    berada di Kecamatan Nuha, Luwu Timur, Sulawesi selatan</p>
                <p> Dalam Galeri Kareso Anatowa terdapat ratusan produk, mulai dari makanan kering, minuman
                    herbal, kerajinan, beras organik, bumbu dapur, dan produk fashion seperti tote bag dan baju.</p>
                <p> Berdasarkan data terbaru, ada 58 UMKM se Luwu Timur yang memasukkan produknya ke Gallery Kareso Anatowa,
                    selain itu Galery Kareso anatowa juga telah berhasil melakukan pendampingan kepada 104 UMKM, dan dari
                    104 tersebut ada 5 UMKM yang dapat dibilang mandiri dan telah menghasilkan omzet ratusan juta</p>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-4 kartu " style="width: 100%; margin-bottom:80px;">
        <div class="row container d-flex justify-content-center">
            <div class="card m-2" style="width : 45%">
                <div class="card-body">
                    <h5 class="card-title">Kontak</h5>
                    <p id="kontak"> <a href="https://wa.me/+6285756956205"> Whatsapp : +62 857-5695-6205 </a></p>
                    <p id="kontak"> <a href="https://www.facebook.com/profile.php?id=100087789532626&mibextid=ZbWKwL">
                            Facebook :
                            gallerykaresoanatowa</a></p>
                    <p id="kontak"> <a href="https://www.instagram.com/gallerrykaresoanatowa"> Instagram :
                            gallerrykaresoanatowa </a>
                    </p>
                    <p id="kontak"> <a href="https://gallerykaresoanatowa@gmail.com"> email :
                            gallerykaresoanatowa@gmail.com </a></p>
                </div>
            </div>
            <div class="card m-2" style="width : 45%">
                <div class="card-body">
                    <h5 class="card-title">Alamat</h5>
                    <a href="https://maps.app.goo.gl/ZxZADCyA7kFJ81d28"> Sorowako, Kec. Nuha, Kabupaten Luwu Timur, Sulawesi
                        Selatan 92983</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        img {
            margin-right: 25px;
            border-radius: 12px;
        }

        p {
            text-align: justify;
        }

        @media only screen and (max-width: 480px) {

            .card {
                width: 100% !important;
                margin-top: 10px !important;
            }


            #kontak {
                text-align: start;
            }

            .kartu {
                margin-top: 10px !important;
            }
        }
    </style>
@endsection

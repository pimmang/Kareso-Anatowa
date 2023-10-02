@extends('layouts/main')

@section('main')
    <div class="container kontak">
        <form action="/kontak" method="post">
            @csrf
            <h1>Hubungi Kami</h1>
            <input type="text" id="firstName" name="firstname" placeholder="First Name" required>
            <input type="text" id="lastName" name="lastname" placeholder="Last Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="mobile" name="nomor_hp" placeholder="Nomor Telepon" required>
            <h4>Sampaikan Pesan Anda di Sini</h4>
            <textarea required name="pesan"></textarea>
            <input type="submit" value="kirim" id="button">
        </form>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .kontak {
            min-height: 80vh;
            background: linear-gradient(to right, #1a816c, rgb(45, 152, 86));
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            margin-bottom: 70px;
        }

        .kontak form {
            width: 670px;
            height: 400px;
            display: flex;
            justify-content: center;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            flex-wrap: wrap;
        }

        .kontak form h1 {
            color: #fff;
            font-weight: 500;
            margin-top: 20px;
            width: 500px;
            text-align: center;
        }

        .kontak form input {
            width: 290px;
            height: 40px;
            color: #fff !important;
            padding-left: 10px;
            outline: none;
            border: none;
            font-size: 15px;
            margin-bottom: 10px;
            background: none;
            border-bottom: 2px solid #fff;
        }

        .kontak form input::placeholder {
            color: #ddd;
        }

        .kontak form #lastName,
        .kontak form #mobile {
            margin-left: 20px;
        }

        .kontak form h4 {
            color: #fff;
            font-weight: 300;
            margin-top: 20px;
        }

        .kontak form textarea {
            background: none;
            border: none;
            border-bottom: 2px solid #fff;
            color: #fff !important;
            font-weight: 200;
            font-size: 15px;
            padding: 10px;
            outline: none;
            min-width: 600px;
            max-width: 600px;
            min-height: 80px;
            max-height: 80px;
        }

        textarea::-webkit-scrollbar {
            width: 1em;
        }

        textarea::-webkit-scrollbar-thumb {
            background-color: rgba(194, 194, 194, 0.713);
        }

        .kontak form #button {
            border: none;
            background: #fff;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: 600;
            font-size: 20px;
            color: #333 !important;
            width: 100px;
            padding: 0;
            margin-right: 500px;
            margin-bottom: 30px;
            transition: 0.3s;
        }

        .kontak form #button:hover {
            opacity: 0.7;
        }

        @media only screen and (max-width: 480px) {
            .kontak form {
                width: 100% !important;
                height: auto;
                display: flex;
                justify-content: center;
                box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
                border-radius: 15px;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                flex-wrap: wrap;
            }

            .kontak {
                min-height: 80vh;
                background: linear-gradient(to right, #1a816c, rgb(45, 152, 86));
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px !important;
                margin-bottom: 70px;
            }

            .kontak form textarea {
                min-width: 90% !important;
                max-width: 90% !important;
                min-height: auto !important;
                max-height: auto !important;
                margin: 2% !important;
            }

            .kontak form #button {
                border: none;
                background: #fff;
                border-radius: 5px;
                margin-top: 20px;
                font-weight: 600;
                font-size: 20px;
                color: #333 !important;
                width: 100%;
                padding: 0;
                margin-right: 0;
                margin: 2%;
                margin-bottom: 30px;
                transition: 0.3s;
            }

            .kontak form input {
                width: 90% !important;
                height: 40px;
                color: #fff !important;
                padding-left: 10px;
                outline: none;
                border: none;
                font-size: 15px;
                margin-bottom: 10px;
                background: none;
                border-bottom: 2px solid #fff;
            }

            .kontak form #lastName,
            .kontak form #mobile {
                margin-left: 0px !important;
            }

        }
    </style>
@endsection

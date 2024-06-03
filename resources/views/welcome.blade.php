<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOGSPLOR</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Untuk icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
                html, body {
            height: 100%;
            margin: 0;
        }

        .background-container {
            position: relative;
            width: 100%;
            height: 100vh; /* Full height of viewport */
            overflow: hidden;
        }
        .container{
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;

        }
        .background-image {
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1; /* Ensure the image stays behind other content */
        }

        .eksplor {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(67, 104, 80, 0.5);
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            text-align: center;
            z-index: 1; /* Ensure the content stays above the background image */
        }

        .eksplor h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .eksplor p {
            font-size: 20px;
            line-height: 1.6;
        }

        .kabupaten {
            background: rgba(67, 104, 80, 0.5);
            padding: 50px 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative;
            z-index: 1; /* Ensure the content stays above the background image */
        }
        
        .kabupaten-title {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 50px;
            color: white;
        }

        

        .row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .feature {
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 10px;
            width: calc(33.333% - 20px);
        }

        .image img {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            object-position: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .info {
            text-align: center;
        }

        .name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
            color: rgba(67, 104, 80, 1);
        }
        .container-7 {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 10px;
            color: white;
        }

        .container-8 {
    border-radius: 72px;
    background-color: white;
    position: relative;
    margin: 10px auto 30px auto;
    width: 500px; /* Fill the entire width of the screen */
    display: flex;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
    padding: 50px 0px 100px 0px;
    text-align: center; /* Menyatukan teks ke tengah */
}

.container-8 .list-inline-item a {
    color: rgba(67, 104, 80, 1);
    font-size: 20px;
    font-weight: bold;
    display: inline-block; /* Membuat link menjadi elemen inline-block */
}


        /* Footer */
        footer {
            background-color: rgba(67, 104, 80, 0.5);
            color: white;
            padding: 20px 0;
            max-width: 100%;
            position: relative;
            bottom: 0;
            left: 0;
        }

        footer p {
            margin: 0;
        }

    </style>
</head>
<body>
@extends('layouts.app')

@section('content')

<!-- Konten utama -->
<div class="kabupaten">
    <div class="background-container">
        <img src="{{ asset('images/background.png') }}" class="background-image" alt="Background Image">
        <div class="eksplor">
            <h2>Rencanakan Liburan Impian Anda</h2>
            <p>Telusuri berbagai destinasi wisata yang menakjubkan dengan detail yang lengkap. Pilih tempat yang sesuai dengan preferensi Anda, dan kami akan memberikan rekomendasi yang tepat untuk perjalanan Anda.</p>
        </div>
    </div>
    <h1 class="kabupaten-title">KABUPATEN DI DAERAH ISTIMEWA YOGYAKARTA</h1>
    <div class="container">
        <div class="row">
            @foreach ($kabupaten as $kabupaten)
            <div class="feature">
            <a href="{{ route('user.kabupaten.index', $kabupaten->id) }}">
                    <div class="kab">
                        <div class="info">
                            <div class="image">
                                <img src="{{ asset('storage/' . $kabupaten->gambar) }}" alt="{{ $kabupaten->nama_kabupaten }}">
                            </div>
                            <div class="name">{{ $kabupaten->nama_kabupaten }}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>


<!-- Container untuk "YOU SCHEDULED" -->
<div class="container-7">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h2 class="container-7">CATATAN</h2>
        </div>
    </div>
</div>

<!-- Container-8 -->
<div class="container-8">
    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="">Membuat Sejarah, Langkah demi Langkah. Catat Setiap Petualangan dan Detilnya</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->

@endsection

<!-- Script untuk Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
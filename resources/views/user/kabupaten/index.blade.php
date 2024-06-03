<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabupaten</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Untuk icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .kabupaten {
            background: rgba(67, 104, 80, 0.5);
            padding: 50px 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .kabupaten-title {
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            margin-top: 150px;
            margin-bottom: 50px;
            color: white;
        }
        .container-hotel,
        .container-wisata,
        .container-makan {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        .feature-hotel,
        .feature-wisata,
        .feature-makan {
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: calc(25% - 40px);
            margin-right: 20px;
            margin-left: 20px;
        }
        .feature-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 50px;
            color: white;
            text-align: center;
        }
        .wisata,
        .makan,
        .hotel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .wisata-image img,
        .makan-image img,
        .hotel-image img {
            width: 200px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            object-position: center;
            margin-bottom: 10px;
            margin-top: 20px;
        }
        .wisata-info,
        .makan-info,
        .hotel-info {
            flex: 1;
            margin-left: 20px;
            margin-right: 20px;
        }
        .wisata-name,
        .makan-name,
        .hotel-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
            color:rgba(67, 104, 80, 1);
        }
        .wisata-rating,
        .makan-rating,
        .hotel-rating,
        .wisata-price,
        .makan-price,
        .hotel-price {
            font-size: 16px;
            color: rgba(67, 104, 80, 1);
            text-align: center;
        }
        .more-button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 50px;
        }
        .btn-custom {
            background-color: rgba(67, 104, 80, 1);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-custom:hover {
            background-color: rgba(67, 104, 80, 0.8);
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <div class="kabupaten">
        <h1 class="kabupaten-title">{{ isset($kabupaten) ? $kabupaten->nama_kabupaten : '' }}</h1>
        
        <div class="feature-title">HOTEL</div>
<div class="container-hotel">
    @foreach($hotels as $index => $hotel)
    <div class="feature-hotel {{ $index >= 4 ? 'hidden' : '' }}">
        <div class="hotel">
            <div class="hotel-info">
                <div class="hotel-image">
                    <img src="{{ asset('storage/' . $hotel->gambar) }}" alt="Gambar Hotel" style="width: 200px;">
                </div>
                <div class="hotel-name">
                    <a href="{{ route('hotel.show', $hotel->id) }}" style="color: rgba(67, 104, 80, 1); text-decoration: none;">
                        {{ $hotel->nama_hotel }}
                    </a>
                </div>
               
            </div>
        </div>
    </div>
    @endforeach
    <div class="more-button">
        <button id="more-hotel-button" type="button" class="btn btn-custom">Lihat Lebih Banyak</button>
    </div>
</div>


        <div class="feature-title">TEMPAT WISATA</div>
        <div class="container-wisata">
            @foreach($wisatas as $index => $wisata)
            <div class="feature-wisata {{ $index >= 4 ? 'hidden' : '' }}">
                <div class="wisata">
                    <div class="wisata-info">
                        <div class="wisata-image">
                            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="Gambar Wisata" style="width: 200px;">
                        </div>
                        <div class="wisata-name">
                            <a href="{{ route('wisata.show', $wisata->id) }}" style="color: rgba(67, 104, 80, 1); text-decoration: none;">
                                {{ $wisata->nama_wisata }}
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
            @endforeach
            <div class="more-button">
                <button id="more-wisata-button" type="button" class="btn btn-custom">Lihat Lebih Banyak</button>
            </div>
        </div>

        <div class="feature-title">TEMPAT MAKAN</div>
        <div class="container-makan">
            @foreach($makans as $index => $makan)
            <div class="feature-makan {{ $index >= 4 ? 'hidden' : '' }}">
                <div class="makan">
                    <div class="makan-info">
                        <div class="makan-image">
                        <img src="{{ asset('storage/' . $makan->gambar) }}" alt="Gambar Makan" style="width: 200px;">
                        </div>
                        <div class="makan-name">
                            <a href="{{ route('makan.show', $makan->id) }}" style="color: rgba(67, 104, 80, 1); text-decoration: none;">
                                {{ $makan->nama_makan }}
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
            @endforeach
            <div class="more-button">
                <button id="more-makan-button" type="button" class="btn btn-custom">Lihat Lebih Banyak</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("more-hotel-button").addEventListener("click", function() {
            let elements = document.querySelectorAll(".container-hotel .hidden");
            elements.forEach(element => {
                element.classList.remove("hidden");
            });
            this.style.display = "none";
        });

        document.getElementById("more-wisata-button").addEventListener("click", function() {
            let elements = document.querySelectorAll(".container-wisata .hidden");
            elements.forEach(element => {
                element.classList.remove("hidden");
            });
            this.style.display = "none";
        });

        document.getElementById("more-makan-button").addEventListener("click", function() {
            let elements = document.querySelectorAll(".container-makan .hidden");
            elements.forEach(element => {
                element.classList.remove("hidden");
            });
            this.style.display = "none";
        });
    </script>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Script untuk Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

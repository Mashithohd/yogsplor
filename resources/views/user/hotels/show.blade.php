<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hotel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Untuk icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Your CSS Styles */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(67, 104, 80, 0.5);
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .hotel-card {
            margin-top: 180px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .hotel-header {
            text-align: center;
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .hotel-header h1 {
            font-size: 28px;
            margin: 0;
            color: rgba(67, 104, 80, 1);
            margin-bottom: 10px;
        }
        .hotel-header .stars {
            color: #ffc107;
        }
        .hotel-header .rating {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hotel-header .rating span {
            margin-left: 10px;
            font-size: 18px;
            color: #333;
        }
        .hotel-images {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .hotel-images img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .hotel-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .hotel-info .price {
            font-size: 24px;
            margin-bottom: 10px;
            color: rgba(67, 104, 80, 1);
        }
        .hotel-info .address {
            font-size: 16px;
            margin-bottom: 10px;
            color: #666;
        }
        .hotel-info .maps,
        .hotel-info .add-note {
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }
        .hotel-info .maps {
            background-color: rgba(67, 104, 80, 1);
        }
        .hotel-info .maps:hover {
            background-color: rgba(67, 104, 80, 0.5);
        }
        .hotel-info .add-note {
            background-color: rgba(67, 104, 80, 1);
        }
        .hotel-info .add-note:hover {
            background-color: rgba(67, 104, 80, 0.5);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')
    
    <div class="container">
        <div class="hotel-card">
            <div class="hotel-header">
                <h1>{{ $hotel->nama_hotel }}</h1>
                <div class="rating">
                    <span>{{ $hotel->rating }}</span>
                    <div class="stars">
                        @for ($i = 0; $i < floor($hotel->rating); $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        @if ($hotel->rating - floor($hotel->rating) >= 0.5)
                            <i class="fas fa-star-half-alt"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="hotel-images">
                @foreach($hotel->gambar as $gambar)
                    <img src="{{ asset('storage/' . trim($gambar)) }}" alt="Hotel Image">
                @endforeach
            </div>
            <div class="hotel-info">
                <div class="price">Rp {{ $hotel->harga }}</div>
                <a href="{{ $hotel->lokasi }}" class="maps" target="_blank"><i class="fas fa-map-marker-alt"></i> Rute</a>
                <button class="add-note btn btn-primary" data-hotel-id="{{ $hotel->id }}">Tambah ke Catatan</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.add-note').forEach(button => {
                button.addEventListener('click', function() {
                    const hotelId = this.getAttribute('data-hotel-id');
                    const day = prompt("Masukkan hari ke berapa:");

                    if (day) {
                        fetch('/api/hotel/' + hotelId)
                            .then(response => response.json())
                            .then(data => {
                                addNoteToDay(day, data.nama_hotel);
                                // Redirect ke halaman catatan dengan query parameter
                                window.location.href = `/catatan?day=${day}&hotel=${encodeURIComponent(data.nama_hotel)}`;
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            });
        });

        function addNoteToDay(day, hotelName) {
            const notes = JSON.parse(localStorage.getItem('notes')) || [];
            notes.push({ day, hotelName });
            localStorage.setItem('notes', JSON.stringify(notes));
        }
    </script>

    <!-- Script untuk Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

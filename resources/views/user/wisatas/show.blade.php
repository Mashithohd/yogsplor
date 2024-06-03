<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Untuk icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
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
        .wisata-card {
            margin-top: 180px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .wisata-header {
            text-align: center;
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .wisata-header h1 {
            font-size: 28px;
            margin: 0;
            color: rgba(67, 104, 80, 1);
            margin-bottom: 10px;
        }
        .wisata-header .stars {
            color: #ffc107;
        }
        .wisata-header .rating {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wisata-header .rating span {
            margin-left: 10px;
            font-size: 18px;
            color: #333;
        }
        .wisata-images {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .wisata-images img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .wisata-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .wisata-info .price {
            font-size: 24px;
            margin-bottom: 10px;
            color: rgba(67, 104, 80, 1);
        }
        .wisata-info .address {
            font-size: 16px;
            margin-bottom: 10px;
            color: #666;
        }
        .wisata-info .maps,
        .wisata-info .add-note {
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }
        .wisata-info .maps {
            background-color: rgba(67, 104, 80, 1);
        }
        .wisata-info .maps:hover {
            background-color: rgba(67, 104, 80, 0.5);
        }
        .wisata-info .add-note {
            background-color: rgba(67, 104, 80, 1);
        }
        .wisata-info .add-note:hover {
            background-color: rgba(67, 104, 80, 0.5);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')
    <div class="container">
        <div class="wisata-card">
            <div class="wisata-header">
                <h1>{{ $wisata->nama_wisata }}</h1>
                <div class="rating">
                    <span>{{ $wisata->rating }}</span>
                    <div class="stars">
                        @for ($i = 0; $i < floor($wisata->rating); $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        @if ($wisata->rating - floor($wisata->rating) >= 0.5)
                            <i class="fas fa-star-half-alt"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="wisata-images">
            @foreach($wisata->gambar as $gambar)
                    <img src="{{ asset('storage/' . trim($gambar)) }}" alt="wisata Image">
                @endforeach
            </div>
            <div class="wisata-info">
                <div class="price">Rp {{ number_format($wisata->harga, 0, ',', '.') }}</div>
                <div class="address">{{ $wisata->alamat }}</div>
                <a href="https://maps.google.com?q={{ urlencode($wisata->alamat) }}" class="maps" target="_blank"><i class="fas fa-map-marker-alt"></i> Rute</a>
                <a href="#" class="add-note" id="add-note-link">Tambah ke Catatan</a>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tangani klik pada tombol "Tambah ke Catatan"
        document.getElementById("add-note-link").addEventListener("click", function(event) {
            event.preventDefault(); // Mencegah aksi default dari link
            var day = prompt("Masukkan hari ke berapa:");
            if (day) {
                var dayCard = document.getElementById("day" + day);
                if (dayCard) {
                    // Geser ke posisi catatan
                    dayCard.scrollIntoView();
                    // Tampilkan detail catatan
                    var note = prompt("Masukkan catatan:");
                    if (note) {
                        showNoteDetail(dayCard, note);
                    }
                } else {
                    alert("Hari tidak ditemukan!");
                }
            }
        });

        // Fungsi untuk menampilkan detail catatan di day card yang dipilih
        function showNoteDetail(dayCard, note) {
            // Buat elemen baru untuk menampilkan detail catatan
            var noteDetail = document.createElement("div");
            noteDetail.classList.add("day-desc-container");
            noteDetail.innerHTML = `
                <div class="day-desc">${note}</div>
                <i class="fas fa-trash delete-icon" onclick="deleteNoteDetail(this)"></i>
            `;
            
            // Tambahkan detail catatan baru ke day card yang dipilih
            dayCard.appendChild(noteDetail);
        }

        // Fungsi untuk menghapus detail catatan
        function deleteNoteDetail(element) {
            element.parentElement.remove();
        }
    });
    </script>
</body>
</html>

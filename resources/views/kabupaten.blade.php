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

        /* CSS untuk tampilan kabupaten */
        .kabupaten {
            background: rgba(67, 104, 80, 0.5);
            padding: 50px 0;
            min-height: 100vh; /* agar background mencakup seluruh tinggi viewport */
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
            color: white; /* Warna teks */
        }

        .container-hotel,
        .container-wisata,
        .container-makan {
            display: flex;
            flex-wrap: wrap; /* Ini akan membuat elemen-elemen jajar secara horizontal dan wrapping ke baris baru jika tidak cukup ruang */
            justify-content: center; /* Ini akan memusatkan elemen-elemen dalam kontainer */
            max-width: 1200px;
            margin: 0 auto; /* Ini akan membuat kontainer berada di tengah halaman */
        }

        .feature-hotel,
        .feature-wisata,
        .feature-makan {
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Jarak antar tabel */
            width: calc(25% - 40px); /* Ubah lebar agar 1/4 dari lebar kontainer */
            margin-right: 20px; /* Jarak kanan */
            margin-left: 20px; /* Jarak kiri */
        }

        .feature-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 50px;
            color: white;
            text-align: center; /* Pusatkan judul */
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
            width: 200px; /* Ubah lebar sesuai kebutuhan */
            height: 150px; /* Tetapkan tinggi yang sesuai */
            border-radius: 10px; /* Atur border-radius untuk membuat ujung gambar lengkung */
            object-fit: cover; /* Menyesuaikan gambar ke dalam dimensi yang ditetapkan */
            object-position: center; /* Meletakkan gambar di tengah */
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
            color: rgba(67, 104, 80, 1);;
            text-align: center; /* Memusatkan teks dalam elemen */
        }

        .more-button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .btn-custom {
            background-color: rgba(67, 104, 80, 1); /* Warna tombol sesuai kebutuhan */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-custom:hover {
            background-color: rgba(67, 104, 80, 0.8); /* Warna tombol saat di-hover */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <div class="kabupaten">
        <h1 class="kabupaten-title">KABUPATEN BANTUL</h1>
        
        <div class="feature-title">HOTEL</div>
        <div class="container-hotel">
            <div class="feature-hotel">
                <div class="hotel">
                    <div class="hotel-info">
                        <div class="hotel-image">
                            <img src="{{ asset('images/mandapa.png') }}" alt="Joglo Mandapa Boutique">
                        </div>
                        <div class="hotel-name">Joglo Mandapa Boutique</div>
                        <div class="hotel-price">Rp 233.047</div>
                        <div class="hotel-rating">4,5</div>
                    </div>
                </div>
            </div>
            <div class="feature-hotel">
                <div class="hotel">
                    <div class="hotel-info">
                        <div class="hotel-image">
                            <img src="{{ asset('images/fort.png') }}" alt="The Fort Hotel">
                        </div>
                        <div class="hotel-name">The Fort Hotel</div>
                        <div class="hotel-price">Rp 183.529</div>
                        <div class="hotel-rating">4,1</div>
                    </div>
                </div>
            </div>
            <div class="feature-hotel">
                <div class="hotel">
                    <div class="hotel-info">
                        <div class="hotel-image">
                            <img src="{{ asset('images/rosin.png') }}" alt="Ros-In Hotel">
                        </div>
                        <div class="hotel-name">Ros-In Hotel</div>
                        <div class="hotel-price">Rp 370.500</div>
                        <div class="hotel-rating">4,4</div>
                    </div>
                </div>
            </div>
            <div class="feature-hotel">
                <div class="hotel">
                    <div class="hotel-info">
                        <div class="hotel-image">
                            <img src="{{ asset('images/dermaga.png') }}" alt="Dermaga Hotel">
                        </div>
                        <div class="hotel-name">Dermaga Hotel</div>
                        <div class="hotel-price">Rp 370.500</div>
                        <div class="hotel-rating">4,4</div>
                    </div>
                </div>
            </div>
            <div class="more-button">
                 <button id="more-button" type="button" class="btn btn-custom">Lihat Lebih Banyak</button>
            </div>
        </div>

        <div class="feature-title">TEMPAT WISATA</div>
        <div class="container-wisata">
        <div class="feature-wisata">
                <div class="wisata">
                    <div class="wisata-info">
                        <div class="wisata-image">
                            <img src="{{ asset('images/mangunan.png') }}" alt="Hutan Pinus Mangunan">
                        </div>
                        <div class="wisata-name">Hutan Pinus Mangunan</div>
                        <div class="wisata-price">Rp 233.047</div>
                        <div class="wisata-rating">4,5</div>
                    </div>
                </div>
            </div>
            <div class="feature-wisata">
                <div class="wisata">
                    <div class="wisata-info">
                        <div class="wisata-image">
                            <img src="{{ asset('images/paris.png') }}" alt="paris">
                        </div>
                        <div class="wisata-name">Pantai Parangtritis</div>
                        <div class="wisata-price">Rp 183.529</div>
                        <div class="wisata-rating">4,1</div>
                    </div>
                </div>
            </div>
            <div class="feature-wisata">
                <div class="wisata">
                    <div class="wisata-info">
                        <div class="wisata-image">
                            <img src="{{ asset('images/gumuk.png') }}" alt="Gumukpasir">
                        </div>
                        <div class="wisata-name">Gumukpasir</div>
                        <div class="wisata-price">Rp 370.500</div>
                        <div class="wisata-rating">4,4</div>
                    </div>
                </div>
            </div>
            <div class="feature-wisata">
                <div class="wisata">
                    <div class="wisata-info">
                        <div class="wisata-image">
                            <img src="{{ asset('images/kasongan.png') }}" alt="Desa Wisata Kasongan">
                        </div>
                        <div class="wisata-name">Desa Wisata Kasongan</div>
                        <div class="wisata-price">Rp 370.500</div>
                        <div class="wisata-rating">4,4</div>
                    </div>
                </div>
            </div>
            <div class="more-button">
                <button type="button" class="btn btn-custom">Lihat Lebih Banyak</button>
            </div>
        </div>
        
        <div class="feature-title">TEMPAT MAKAN</div>
        <div class="container-makan">
        <div class="feature-makan">
                <div class="makan">
                    <div class="makan-info">
                        <div class="makan-image">
                            <img src="{{ asset('images/klatak.png') }}" alt="Sate Klatak Pak Pong">
                        </div>
                        <div class="makan-name">Sate Klatak Pak Pong</div>
                        <div class="makan-price">Rp 233.047</div>
                        <div class="makan-rating">4,5</div>
                    </div>
                </div>
            </div>
            <div class="feature-makan">
                <div class="makan">
                    <div class="makan-info">
                        <div class="makan-image">
                            <img src="{{ asset('images/mangut.png') }}" alt="Mangut Lele Mbah Marto">
                        </div>
                        <div class="makan-name">Mangut Lele Mbah Marto</div>
                        <div class="makan-price">Rp 183.529</div>
                        <div class="makan-rating">4,1</div>
                    </div>
                </div>
            </div>
            <div class="feature-makan">
                <div class="makan">
                    <div class="makan-info">
                        <div class="makan-image">
                            <img src="{{ asset('images/petir.png') }}" alt="Sate Petir Pak Nano">
                        </div>
                        <div class="makan-name">Sate Petir Pak Nano</div>
                        <div class="makan-price">Rp 370.500</div>
                        <div class="makan-rating">4,4</div>
                    </div>
                </div>
            </div>
            <div class="feature-makan">
                <div class="makan">
                    <div class="makan-info">
                        <div class="makan-image">
                            <img src="{{ asset('images/cemplung.png') }}" alt="Ayam Goreng Jawa Mbah Cemplung">
                        </div>
                        <div class="makan-name">Ayam Goreng Jawa Mbah Cemplung</div>
                        <div class="makan-price">Rp 370.500</div>
                        <div class="makan-rating">4,4</div>
                    </div>
                </div>
            </div>
            <div class="more-button">
                <button type="button" class="btn btn-custom">Lihat Lebih Banyak</button>
            </div>
        </div>
    </div>

    <script>
    document.getElementById("more-button").addEventListener("click", function() {
        // Redirect to the 'more' page
        window.location.href = "/more"; // Replace "more.html" with the URL of your 'more' page
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

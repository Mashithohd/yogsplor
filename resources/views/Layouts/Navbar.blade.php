<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(67, 104, 80); position: fixed; width: 100%; z-index: 100;">
    <a class="navbar-brand" href="{{ route('welcome') }}"> <!-- Tautan untuk kembali ke halaman utama -->
        <!-- Ganti path logo sesuai dengan struktur folder -->
        <img src="{{ asset('images/logo.png') }}" width="100" height="100" class="d-inline-block align-top" alt="">
    </a>
    
    <!-- Tombol untuk tampilan mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- Menu kiri -->
        </ul>
        <!-- Menu kanan -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kabupaten
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/kabupaten/2">Kabupaten Sleman</a> <!-- Tautan menuju halaman Kabupaten Sleman -->
                    <a class="dropdown-item" href="/kabupaten/8">Kabupaten Bantul</a> <!-- Tautan menuju halaman Kabupaten Bantul -->
                    <a class="dropdown-item" href="/kabupaten/9">Kabupaten Kulon Progo</a> <!-- Tautan menuju halaman Kabupaten Kulon Progo -->
                    <a class="dropdown-item" href="/kabupaten/4">Kabupaten Gunung Kidul</a> <!-- Tautan menuju halaman Kabupaten Gunung Kidul -->
                    <a class="dropdown-item" href="/kabupaten/7">Kota Yogyakarta</a> <!-- Tautan menuju halaman Kota Yogyakarta -->

                    <!-- Tambahkan tautan ke halaman kabupaten lainnya sesuai kebutuhan -->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('catatan.show') }}">Catatan</a> <!-- Link menuju halaman note -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profil">Profil</a> <!-- Link menuju halaman profil -->
            </li>
            <!-- Menu login/logout -->
            @auth <!-- Cek apakah pengguna sudah login -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else <!-- Jika pengguna belum login -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

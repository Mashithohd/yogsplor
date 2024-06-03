
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(67, 104, 80); position: fixed; width: 100%; z-index: 100;">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo.png') }}" width="100" height="100" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Menu kiri -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.hotels.index') }}">Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.wisatas.index') }}">Wisatas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.makans.index') }}">Makans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.kabupaten.index') }}">Kabupaten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/login">Login</a>
                </li>
            </ul>
        </div>
    </nav>
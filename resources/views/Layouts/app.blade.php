<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Untuk icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Additional CSS -->
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>
    @include('layouts.footer')

    <!-- Additional Scripts -->
    @yield('scripts')
</body>
</html>

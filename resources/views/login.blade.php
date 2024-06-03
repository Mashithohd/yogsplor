<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poetsen+One&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-size: cover;
            font-family: 'Sora', sans-serif;
            overflow: hidden; /* Prevent scrolling */
        }

        .create-acc {
            background: rgba(67, 104, 80, 0.5); /* Semi-transparent gray */
            backdrop-filter: blur(10px); /* Frosted glass effect */
            padding: 30px;
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: left;
            position: relative; /* Position relative for z-index to work */
            z-index: 10; /* Ensure it appears above the background */
            backdrop-filter: blur(10px); /* Apply the blur effect */
        }

        .create-anew-account {
            font-weight: 400;
            font-size: 34px;
            color: #fff;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            font-family: 'Sora', sans-serif;
        }

        .form-group label {
            font-weight: 400;
            font-size: 18px;
            color: #fff;
        }

        .form-control {
            font-family: 'Sora', sans-serif;
            background-color: #fff;
        }

        .btn {
            font-family: 'Sora', sans-serif;
            font-size: 18px;
            background-color: #fff; /* Button background color */
            border: 1px solid #ccc; /* Button border */
            margin-top: 10px; /* Margin for spacing */
            color: rgba(67, 104, 80, 1);
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 10px; /* Margin for spacing */
        }

        .remember-me label {
            color: #fff; /* Text color */
            margin-right: 200px; /* Margin for spacing */
            margin-left: 10px;
        }

        .forget-password {
            font-size: 14px; /* Font size */
            color: #fff; /* Text color */
            text-decoration: none; /* Remove underline */
        }

        .sign-in-link {
            color: #fff; /* Text color */
        }
    </style>
</head>
<body class="antialiased">
    <div class="create-acc">
        <div class="create-anew-account">
            LOG IN
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="nama_user">Nama</label>
                <input type="text" name="nama_user" class="form-control" id="username" placeholder="Enter nama" value="{{ old('nama_user') }}" required>
                @error('nama_user')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="remember-me">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Remember me</label>
                <a href="#" class="forget-password">Forget Password</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        <p class="text-center">
            <span class="sign-in-link">Don't have an account?</span>
            <a href="{{ route('register') }}" class="sign-in-link">Sign in</a>
        </p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
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
            font-family: 'Aubrey', sans-serif;
        }

        .create-acc {
            background: rgba(67, 104, 80, 0.5);
            padding: 30px;
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: left;
        }

        .create-anew-account {
            font-weight: bold;
            font-size: 34px;
            color: #fff;
            margin-bottom: 30px;
            margin-left: 160px;
        }

        .form-group label {
            font-weight: 400;
            font-size: 18px;
            color: #fff;
        }

        .form-control {
            font-family: 'Aubrey', sans-serif;
            background-color: #fff;
        }

        .btn {
            font-family: 'Aubrey', sans-serif;
            font-size: 18px;
            background-color: #fff;
            color: rgba(67, 104, 80, 1);
            border: 1px solid #ccc;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .btn :hover {
            background-color: #D3D3D3;
        }
    </style>
</head>
<body class="antialiased">
    <div class="create-acc">
        <div class="create-anew-account">
            SIGN IN
        </div>
        <form method="POST" action="{{ url('register') }}">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</body>
</html>

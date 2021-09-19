<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    @auth
    <p>You Still Login</p>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    @endauth

    @guest
    <p>Your not Login</p>
    <a href="{{ route('login') }}" class="btn">Login</a>
    @endguest
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    Halo, {{$user->name}}
    <a href="{{route('changePassword')}}">Ubah password</a>
    <a href="{{route('logout')}}">Keluar</a>
</body>
</html>
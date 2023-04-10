<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="{{route('registerProcess')}}" method="post">
        @csrf
        <label for="email"></label>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <label for="password"></label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="submit">Daftar</button>
        <a href="{{route('login')}}">Login</a>
    </form>
</body>
</html>
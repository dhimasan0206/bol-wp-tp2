<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
</head>
<body>
    <form action="{{route('forgetPasswordProcess')}}" method="post">
        @csrf
        <label for="email"></label>
        <input type="email" name="email" id="email" placeholder="Email yang terdaftar" required>
        <button type="submit">Verifikasi email</button>
    </form>
</body>
</html>
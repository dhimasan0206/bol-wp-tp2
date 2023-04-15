<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah password</title>
</head>
<body>
    <form action="{{route('changePasswordProcess')}}" method="post">
        @csrf
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <br>
        <label for="password_confirmation">Re-Type Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-Type Password" required>
        <br>
        <button type="submit">Simpan perubahan</button>
    </form>
</body>
</html>
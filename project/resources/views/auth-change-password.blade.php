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
        <label for="password"></label>
        <input type="password" name="password" id="password" placeholder="Password baru" required>
        <label for="confirm-password"></label>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Konfirmasi password" required>
        <button type="submit">Simpan perubahan</button>
    </form>
</body>
</html>
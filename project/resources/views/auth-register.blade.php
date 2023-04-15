<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('registerProcess')}}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required valud="{{old('email')}}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" placeholder="Nama" required valud="{{old('name')}}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required valud="{{old('password')}}">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="confirmPassword">Re-Type Password</label>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Re-Type Password" required valud="{{old('confirmPassword')}}">
        @error('confirmPassword')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Daftar</button>
        <br>
        Sudah memiliki akun <a href="{{route('login')}}">Login</a>
    </form>
</body>
</html>
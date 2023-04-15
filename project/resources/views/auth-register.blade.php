<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h3>Daftar</h3>
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
        <table>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="Email" required valud="{{old('email')}}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">Nama</label>
                </td>
                <td>
                    <input type="text" name="name" id="name" placeholder="Nama" required valud="{{old('name')}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password" placeholder="Password" required valud="{{old('password')}}">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password_confirmation">Re-Type Password</label>
                </td>
                <td>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-Type Password" required valud="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Daftar</button>
                </td>
            </tr>
        </table>
        <p>
            Sudah memiliki akun <a href="{{route('login')}}">Login</a>
        </p>
    </form>
</body>
</html>
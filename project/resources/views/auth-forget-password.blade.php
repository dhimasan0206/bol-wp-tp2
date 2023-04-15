<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupa password</title>
</head>
<body>
    <h3>Lupa password</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('forgetPasswordProcess')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="Email yang terdaftar" required value="{{old('email')}}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Verifikasi email</button>
                </td>
            </tr>
        </table>
        <p>
            <a href="{{route('login')}}">Masuk</a>
        </p>
    </form>
</body>
</html>
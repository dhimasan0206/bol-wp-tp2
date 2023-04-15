<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk</title>
</head>
<body>
    <h3>Masuk</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('loginProcess')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="captcha">Captcha</label>
                </td>
                <td>
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                    </div>
                    <input id="captcha" type="text" placeholder="Enter Captcha" name="captcha" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Masuk</button>
                </td>
            </tr>
        </table>
        <p>
            <a href="{{route('forgetPassword')}}">Lupa password</a>
        </p>
        <p>
            Belum punya akun <a href="{{route('register')}}">Daftar</a>
        </p>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
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
    <form action="{{route('forgetPasswordProcess')}}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email yang terdaftar" required value="{{old('email')}}">
        <br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Verifikasi email</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah password</title>
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
    <form action="{{route('changePasswordProcess')}}" method="post">
        @csrf
        <label for="password">Current Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required value="{{old('password')}}">
        <br>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password" placeholder="New Password" required value="{{old('new_password')}}">
        <br>
        @error('new_password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="new_password_confirmation">Re-Type Password</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Re-Type New Password" required value="{{old('new_password_confirmation')}}">
        <br>
        @error('new_password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Simpan perubahan</button>
    </form>
</body>
</html>
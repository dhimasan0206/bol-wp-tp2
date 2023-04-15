<?php

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home')->with('user', Auth::user());
})->name('home')->middleware(['auth']);

Route::get('login', function () {
    return view('auth-login');
})->name('login')->middleware('guest');

Route::post('login-process', function (LoginRequest $request) {
    $credentials = $request->only(['email', 'password']);
    if (Auth::attempt($credentials, true)) {
        return to_route('home');
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->name('loginProcess')->middleware('guest');

Route::get('register', function () {
    return view('auth-register');
})->name('register')->middleware('guest');

Route::post('register-process', function (RegisterRequest $request) {
    $user = new User;
    $user->email = $request->email;
    $user->name = $request->name;
    $user->password = Hash::make($request->password);
    $user->save();

    return to_route('registerSuccess');
})->name('registerProcess')->middleware('guest');

Route::get('register-success', function () {
    return view('auth-register-success');
})->name('registerSuccess')->middleware('guest');

Route::get('forget-password', function () {
    return view('auth-forget-password');
})->name('forgetPassword')->middleware('guest');

Route::post('forget-password-process', function (ForgetPasswordRequest $request) {
    $request->session()->put('email', $request->email);
    return to_route('resetPassword');
})->name('forgetPasswordProcess')->middleware('guest');

Route::get('reset-password', function (Request $request) {
    if (!$request->session()->has('email')) {
        return to_route('login');
    }
    return view('auth-reset-password');
})->name('resetPassword')->middleware('guest');

Route::post('reset-password-process', function (ResetPasswordRequest $request) {
    if (!$request->session()->has('email')) {
        return to_route('login');
    }
    
    $user = User::where('email', $request->session()->get('email'))->firstOrFail();
    $user->password = Hash::make($request->password);
    $user->save();

    $request->session()->forget('email');

    return to_route('resetPasswordSuccess');
})->name('resetPasswordProcess')->middleware('guest');

Route::get('reset-password-success', function () {
    return view('auth-reset-password-success');
})->name('resetPasswordSuccess')->middleware('guest');

Route::get('change-password', function () {
    return view('auth-change-password');
})->name('changePassword')->middleware(['auth']);

Route::post('change-password-process', function (ChangePasswordRequest $request) {
    $user = Auth::user();
    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors("wrong current password");
    }

    $update = User::findOrFail($user->id);
    $update->password = Hash::make($request->new_password);
    $update->save();

    return to_route('changePasswordSuccess');
})->name('changePasswordProcess')->middleware(['auth']);

Route::get('change-password-success', function () {
    return view('auth-change-password-success');
})->name('changePasswordSuccess')->middleware(['auth']);

Route::get('logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return to_route('login');
})->name('logout')->middleware(['auth']);
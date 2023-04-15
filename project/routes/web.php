<?php

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
})->name('login');

Route::post('login-process', function (LoginRequest $request) {
    $user = User::where('email', $request->email)->where('password', $request->password)->first();
    if (is_null($user)) {
        return to_route('login')->withErrors("wrong password");
    }
    Auth::login($user, true);
    return to_route('home');
})->name('loginProcess');

Route::get('register', function () {
    return view('auth-register');
})->name('register');

Route::post('register-process', function (RegisterRequest $request) {
    $user = new User;
    $user->email = $request->email;
    $user->name = $request->name;
    $user->password = $request->password;
    $user->save();

    return to_route('registerSuccess');
})->name('registerProcess');

Route::get('register-success', function () {
    return view('auth-register-success');
})->name('registerSuccess');

Route::get('forget-password', function () {
    return view('auth-forget-password');
})->name('forgetPassword');

// TODO: verify email and redirect to change password if ok else back with error
Route::post('forget-password-process', function (Request $request) {
    return to_route('changePassword');
})->name('forgetPasswordProcess');

Route::get('change-password', function () {
    // TODO: check email session or user session
    return view('auth-change-password');
})->name('changePassword')->middleware(['auth']);

// TODO: update password and redirect to login if ok else back with error
Route::post('change-password-process', function (ChangePasswordRequest $request) {
    $user = Auth::user();
    if ($user->password != $request->password) {
        return back()->withErrors("wrong current password");
    }

    $update = User::findOrFail($user->id);
    $update->password = $request->new_password;
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
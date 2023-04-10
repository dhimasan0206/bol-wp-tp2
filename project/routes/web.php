<?php

use Illuminate\Http\Request;
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
    return view('welcome');
})->name('home')->middleware(['auth']);

Route::get('login', function () {
    return view('auth-login');
})->name('login');

Route::post('login-process', function(Request $request) {
    // print_r($request);
    // TODO: validate login and set logged in if ok else redirect back with errors
    return to_route('home');
})->name('loginProcess');

Route::get('register', function () {
    return view('auth-register');
})->name('register');

Route::post('register-process', function(Request $request) {
    // print_r($request);
    // TODO: validate register and redirect to login if ok else redirect back with errors
    return to_route('login');
})->name('registerProcess');

Route::get('forget-password', function () {
    return view('auth-forget-password');
})->name('forgetPassword');

// TODO: verify email and redirect to change password if ok else back with error
Route::post('forget-password-process', function (Request $request) {
    // print_r($request);
    return to_route('changePassword');
})->name('forgetPasswordProcess');

Route::get('change-password', function () {
    // TODO: check email session or user session
    return view('auth-change-password');
})->name('changePassword');

// TODO: update password and redirect to login if ok else back with error
Route::post('change-password-process', function (Request $request) {
    // print_r($request);
    // TODO: redirect to login if not logged in; redirect back with success if logged in
    return to_route('login');
})->name('changePasswordProcess');

Route::get('logout', function () {
    // TODO: destroy session
    return to_route('home');
});
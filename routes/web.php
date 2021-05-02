<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;

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

//Route per la registrazione
Route::post('register', [UserController::class, 'createUser']);

Route::post('login', [LoginController::class, 'authenticate']);

Route::get('logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('welcome');
    }) -> name('home');
});

Route::group(['middleware' => ['guest']], function() {
    //route view della registrazione, accessibile solamente da utente guest
    Route::get('register', function() {
        return view('auth.register', [
            'status' => 'not completed'
        ]);
    }) -> name('register');

    Route::get('login', function () {
        return view('auth.login');
    }) -> name('login');

    //Route per password
    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    }) -> name('password.request');

    //Route per password dimenticata, invio email
    Route::post('forgot-password', [ResetPasswordController::class, 'forgotPassword']) -> name('password.email');

    //Route che indirizza al form di cambio password
    Route::get('/reset-password/{token}', function($token) {
        return view('auth.reset-password', ['token' => $token]);
    }) -> name('password.reset');

    Route::post('reset-password', [ResetPasswordController::class, 'passwordUpdate']) -> name('password.update');
});


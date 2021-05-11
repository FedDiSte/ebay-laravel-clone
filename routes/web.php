<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\OffertaController;
use App\Models\Inserzione;

//Route utenti con autenticazione
Route::group(['middleware' => ['auth']], function () {
    //Route per index
    Route::get('/', function () {
        return view('home', ['inserzioni' => Inserzione::all()->take(20)]);
    })->name('home');

    //Route per metodo logout
    Route::get('logout', [LoginController::class, 'logout']);

    //Route profilo persona
    Route::get('/profile', [UserController::class, 'getProfile'])->name('profile');

    //Route form creazione ad
    Route::get('/create-ad', function() {
        return view('ad.create-ad');
    }) -> name('create-ad');

    //Route metodi creazione ad
    Route::post('/create-ad', [AdController::class, 'create']);

    //View per visualizzare le inserzioni inserite
    Route::get('/my-ads', function () {
        return view('ad.my-ads', ['inserzioni' => Inserzione::where('id_creatore', Auth::user() -> id) -> get()]);
    });

    //Ritorna un'inserzione cercata
    Route::get('/inserzione/{id}', function($id) {
        $inserzione = Inserzione::find($id);
        return view('ad.inserzione', ['inserzione' => $inserzione]);
    }) -> name('inserzione');

    //Route per piazzare un offerta su una determinata inserzione
    Route::get('/piazza-offerta/{id}', function($id) {
        $inserzione = Inserzione::find($id);
        return view('ad.piazza-offerta', ['inserzione' => $inserzione]);
    }) -> name('piazza-offerta');

    Route::post('/piazza-offerta', [OffertaController::class, 'create']);

});

//Route per utenti non autenticati
Route::group(['middleware' => ['guest']], function () {
    //Route invocata da form registrazione
    Route::post('register', [UserController::class, 'createUser']);

    //Route invocata da form login
    Route::post('login', [LoginController::class, 'authenticate']);

    //View del form di registrazione
    Route::get('register', function () {
        return view('auth.register', [
            'status' => 'not completed'
        ]);
    })->name('register');

    //View del form di login
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    //Route per password
    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    //Route per password dimenticata, invio email
    Route::post('forgot-password', [ResetPasswordController::class, 'forgotPassword'])->name('password.email');

    //Route che indirizza al form di cambio password
    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    //Route che resetta la password
    Route::post('reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});


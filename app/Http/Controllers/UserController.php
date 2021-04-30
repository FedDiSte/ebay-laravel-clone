<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //funzione utilizzata per verificare se un determinato dato (email o username) è unico nel database
    public function isUnique(String $type, String $element) {
        return User::where($type, $element)->get() -> isEmpty();
    }

    //Registrazione nuovo utente
    public function createUser(Request $request) {
        $utente = new User;

        if(UserController::isUnique("username", $request->input('username'))) {
            $utente -> username = $request->input('username');
        } else {
            return view('register', ['status' => 'username_not_unique']);
        }
        if(UserController::isUnique("email", $request->input('email'))) {
            $utente -> email = $request->input('email');
        } else {
            return view('register', ['status' => 'email_not_unique']);
        }
        $utente -> nome = $request->input('nome');
        $utente -> cognome = $request->input('cognome');
        $utente -> password = Hash::make($request->input('password'));

        $utente -> save();

        //TODO reindirizzare verso pagina corretta
        return view('register', ['status' => 'completed']);
    }


}

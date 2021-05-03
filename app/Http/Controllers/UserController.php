<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    //funzione utilizzata per verificare se un determinato dato (email o username) è unico nel database
    public function isUnique(String $type, String $element) {
        return User::where($type, $element) -> get() -> isEmpty();
    }

    //Registrazione nuovo utente
    public function createUser(Request $request) {
        $utente = new User;

        if(UserController::isUnique("username", $request->input('username'))) {
            $utente -> username = $request->input('username');
        } else {
            return view('auth.register', ['status' => 'username_not_unique']);
        }
        if(UserController::isUnique("email", $request->input('email'))) {
            $utente -> email = $request->input('email');
        } else {
            return view('auth.register', ['status' => 'email_not_unique']);
        }
        $utente -> nome = $request->input('nome');
        $utente -> cognome = $request->input('cognome');
        $utente -> password = Hash::make($request->input('password'));

        $utente -> save();

        return view('auth.register', ['status' => 'completed']);
    }

    //Ricezioni dati di utente per generare pagina profilo personale
    public function getProfile(Request $request) {
        $user = Auth::user();
        
        //TODO check se funziona
        return view(user.profile, [
            'nome' => $user['nome'],
            'cognome' => $user['cognome'],
            'username' => $user['username'],
            'email' => $user['email'],
            'data_creazione' => Carbon::createFromFormat('d m Y', $user['created_at']) -> toDateTimeString(),
        ]);
    }


}

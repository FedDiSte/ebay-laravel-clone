<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        $request -> validate ([
            'username' => 'required|max:32|unique:utenti',
            'email' => 'required|unique:utenti',
            'nome' => 'required',
            'cognome' => 'required',
            'password' => 'required|min:8',
            'genere_preferito' => 'required',
        ]);

        $utente = new User;

        $utente -> username = $request->input('username');
        $utente -> email = $request->input('email');
        $utente -> nome = $request->input('nome');
        $utente -> cognome = $request->input('cognome');
        $utente -> password = Hash::make($request->input('password'));
        $utente -> genere_preferito = $request -> input('genere_preferito');

        $utente -> save();

        return view('auth.register', ['status' => 'completed']);
    }

    //Ricezioni dati di utente per generare pagina profilo personale
    public function getProfile(Request $request) {
        $user = Auth::user();

        //Vengono passati i valori da visualizzare utili a conoscere i dettagli del proprio profilo
        return view('user.profile', [
            'nome' => $user['nome'],
            'cognome' => $user['cognome'],
            'username' => $user['username'],
            'email' => $user['email'],
            'data_creazione' => Carbon::parse($user['created_at']) -> format('d/m/Y'),
        ]);
    }


}

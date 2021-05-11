<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offerta;
use App\Models\Inserzione;
use Illuminate\Support\Facades\Auth;

class OffertaController extends Controller {

    public function create(Request $request) {

        $request -> prezzo = floatval($request -> input('prezzo'));

        $request -> validate([
            'prezzo' => 'required|numeric'
        ]);

        if ( ($request -> input('prezzo') > (Inserzione::find($request -> input('id_inserzione')) -> prezzo))
           and ($request -> input('prezzo') > (Inserzione::find($request -> input('id_inserzione')) -> offerte -> sortByDesc('prezzo') -> first() -> prezzo)) ) {
            $offerta = new Offerta();

            $offerta -> id_utente = Auth::id();
            $offerta -> id_inserzione = $request -> input('id_inserzione');
            $offerta -> prezzo = $request -> input('prezzo');

            $offerta -> save();

            return redirect('inserzione/'.$request -> input('id_inserzione'))->with(['status' => 'success']);

        } else {
            return redirect()->back()->withErrors(['status' => 'Hai inserito un offerta non valida, prova ad offrire di più']);
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffertaController extends Controller {

    public function make(Request $request) {

        $request -> prezzo = floatval($request -> input('prezzo'));

        $request -> validate([
            'id_utente' => 'required',
            'id_inserzione' => 'required',
            'prezzo' => 'required|numeric'
        ]);

        if ( ($request -> input('prezzo') > Inserzione::find($request -> input('id_inserzione')) -> get() -> prezzo) ) {
            $offerta = new Offerta();

            $offerta -> id_utente = $request -> input('id_utente');
            $offerta -> id_inserzione = $request -> input('id_inserzione');
            $offerta -> prezzo = $request -> input('prezzo');

            //TODO da terminare

        }

    }

}

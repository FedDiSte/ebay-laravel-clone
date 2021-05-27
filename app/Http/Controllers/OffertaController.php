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

        $inserzione = Inserzione::find($request -> input('id_inserzione'));

        /*
            Viene inizialmente controllato se l'inserzione ha delle offerte, se le ha viene controllato se il
            prezzo inserito è maggiore di quello della offerta più alta, in tal caso viene salvata, se
            l'inserzione non ha offerte viene controllato il prezzo originale dell'inserzione
            Se uno di questi due controlli fallisce l'utente viene reindirizzato alla pagina precedente con l'errore
        */
        if( ($inserzione -> offerte -> count()) > 0) {
            if( $request -> input('prezzo') > $inserzione -> prezzo_latest) ) {
                $offerta = new Offerta();

                $offerta -> id_utente = Auth::id();
                $offerta -> id_inserzione = $inserzione -> id;
                $offerta -> prezzo = $request -> input('prezzo');

                $offerta -> save();

                //Viene aggiornato il prezzo più alto nell'inserzione, utilizzato per il sorting nella ricerca
                $inserzione -> prezzo_latest = $request -> input('prezzo');
                $inserzione -> save();

                return redirect('inserzione/'.$inserzione -> id)->with(['status' => 'success']);
            } else {
                return redirect()->back()->withErrors(['status' => 'Hai inserito un offerta non valida, prova ad offrire di più']);
            }
        } else if($request -> input('prezzo') > $inserzione -> prezzo) {
            $offerta = new Offerta();

            $offerta -> id_utente = Auth::id();
            $offerta -> id_inserzione = $inserzione -> id;
            $offerta -> prezzo = $inserzione -> prezzo;

            $offerta -> save();

            //Viene aggiornato il prezzo più alto nell'inserzione, utilizzato per il sorting nella ricerca
            $inserzione -> prezzo_latest = $request -> input('prezzo');
            $inserzione -> save();

            return redirect('inserzione/'.$inserzione -> id)->with(['status' => 'success']);
        } else {
            return redirect()->back()->withErrors(['status' => 'Hai inserito un offerta non valida, prova ad offrire di più']);
        }
    }

}

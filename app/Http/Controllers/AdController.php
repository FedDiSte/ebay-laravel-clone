<?php

namespace App\Http\Controllers;

use App\Models\Inserzione;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{

    public function create(Request $request) {

        $request -> validate([
            'nome' => 'required|max:30',
            'descrizione' => 'required|max:250',
            'prezzo' => 'required',
            'fine_inserzione' => 'required|after:today',
            'genere_id' => 'required'
        ]);

        $request['prezzo'] = floatval($request -> input('prezzo'));

        $inserzione = new Inserzione();

        $inserzione -> nome = $request -> input('nome');
        $inserzione -> descrizione = $request -> input('descrizione');
        $inserzione -> prezzo = $request -> input('prezzo');
        $inserzione -> fine_inserzione = $request -> input('fine_inserzione').' '.date('H:i:s');
        $inserzione -> genere_id = $request -> input('genere_id');
        $inserzione -> id_creatore = Auth::user() -> getAuthIdentifier();
        $inserzione -> stato = false;

        $inserzione -> save();

        return redirect()->route('inserzione', $inserzione);
    }

    public function showInserzione($id) {
        $inserzione = Inserzione::find($id);
        return view('ad.inserzione', ['inserzione' => $inserzione]);
    }
}

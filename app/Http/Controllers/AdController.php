<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Inserzione;
use App\Notifications\VenditaCompletata;
use App\Notifications\AcquistoCompletato;
use App\Notifications\AcquistoFallito;
use App\Notifications\VenditaFallita;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{

    public function create(Request $request) {

        $request -> validate([
            'nome' => 'required|max:30',
            'descrizione' => 'required|max:250',
            'prezzo' => 'required',
            'fine_inserzione' => 'required|after:today',
            'genere_id' => 'required',
            'foto[]' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //$request['prezzo'] = floatval($request -> input('prezzo'));

        $inserzione = new Inserzione();

        $inserzione -> nome = $request -> input('nome');
        $inserzione -> descrizione = $request -> input('descrizione');
        $inserzione -> prezzo = $request -> input('prezzo');
        $inserzione -> fine_inserzione = $request -> input('fine_inserzione').' '.date('H:i:s');
        $inserzione -> genere_id = $request -> input('genere_id');
        $inserzione -> id_creatore = Auth::user() -> getAuthIdentifier();
        $inserzione -> stato = false;

        $inserzione -> save();

        if($request -> hasFile('foto')) {
            foreach ($request -> file('foto') as $foto) {
                $path = Storage::putFile('images', $foto);
                $edit = Image::make($path);
                if($edit -> height() >= $edit -> width()) {
                    $edit -> crop(1280, 720);
                } else {
                    $edit -> resize(1280, 720);
                }
                $edit -> save();

                //viene liberata memoria
                $edit = null;
                Foto::create([
                    'filename' => $path,
                    'id_inserzione' => $inserzione -> id,
                ]);
            }

        }

        return redirect()->route('inserzione', $inserzione);
    }

    public function search(Request $request) {
        $inserzioni = Inserzione::where('nome', 'like', '%'.$request -> input('q').'%') -> where('stato', 0) -> sortable() -> paginate(15);
        $inserzioni -> withPath('/search'.$request -> input('q'));
        return view('ad.search', ['inserzioni' => $inserzioni]);
    }

}

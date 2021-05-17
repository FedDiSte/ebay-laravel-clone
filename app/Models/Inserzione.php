<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Inserzione extends Model
{
    use HasFactory, Sortable;

    protected $table = 'inserzioni';

    protected $fillable = [
        'nome',
        'descrizione',
        'stato',
        'prezzo',
        'fine_inserzione',
        'id_creatore',
        'genere_id',
        'prezzo_latest'
    ];

    //utilizzata da ColumnSortable
    public $sortable = [
        'nome',
        'prezzo',
        'prezzo_latest',
        'fine_inserzione',
    ];

    public function utente() {
        return $this -> belongsTo(User::class, 'id_creatore', 'id');
    }

    public function genere() {
        return $this -> belongsTo(Genere::class, 'genere_id', 'id');
    }

    public function foto() {
        return $this -> hasMany(Foto::class, 'id_inserzione', 'id');
    }

    public function offerte() {
        return $this -> hasMany(Offerta::class, 'id_inserzione', 'id');
    }

    public function prezzoAlto() {
        if(offerte -> count() > 0) {
            return $this -> offerte -> max('prezzo');
        } else {
            return $this -> prezzo;
        }
    }

}

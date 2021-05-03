<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inserzione extends Model
{
    use HasFactory;

    protected $table = 'inserzioni';

    protected $fillable = [
        'id',
        'nome',
        'descrizione',
        'stato',
        'prezzo',
        'fine_inserzione',
        'id_creatore',
        'genere_id',
    ];

    public function utente() {
        return $this -> belongsTo(User::class, 'id_creatore', 'id');
    }

    public function genere() {
        return $this -> belongsTo(Genere::class, 'genere_id', 'id');
    }

}

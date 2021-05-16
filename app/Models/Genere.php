<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    use HasFactory;

    protected $table = 'generi';

    public $timestamps = false;

    protected $fillable = [
        'nome',
    ];

    //ritorna tutti gli utenti a cui piace questa determinata categoria
    public function utenti() {
        return $this -> hasMany(User::class, 'genere_preferito', 'id');
    }

    //ritorna tutte le inserzioni relative a questo genere
    public function inserzioni() {
        return $this -> hasMany(Inserzione::class, 'genere_id', 'id');
    }

}

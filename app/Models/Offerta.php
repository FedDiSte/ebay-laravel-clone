<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerta extends Model {
    use HasFactory;

    protected $table = 'offerte';

    protected $fillable = [
        'id_utente',
        'id_inserzione',
        'prezzo',
    ];

    public function utente() {
        return $this -> belongsTo(User::class, 'id_utente', 'id');
    }

    public function inserzione() {
        return $this -> belongsTo(Inserzione::class, 'id_inserzione', 'id');
    }

}

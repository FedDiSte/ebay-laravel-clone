<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use HasFactory, Notifiable;

    protected $table = "utenti";

    protected $fillable = [
        'username',
        'nome',
        'cognome',
        'email',
        'password',
        'genere_preferito',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function genere() {
        return $this -> belongsTo(Genere::class, 'genere_preferito', 'id');
    }

    public function inserzioni() {
        return $this -> hasMany(Inserzione::class, 'id_creatore', 'id');
    }

    public function offerte() {
        return $this -> hasMany(Offerta::class, 'id_utente', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model {
    use HasFactory;

    protected $table = 'foto';

    protected $fillable = [
        'id',
        'filename',
        'id_inserzione',
    ];

    public function post() {
        return $this -> belongsTo(Inserzione::class, 'inserzione_id', 'id');
    }

}

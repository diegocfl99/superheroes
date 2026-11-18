<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $fillable = [
        'nombre_real',
        'nombre_heroe',
        'foto_url',
        'informacion'
    ];
}
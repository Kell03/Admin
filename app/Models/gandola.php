<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gandola extends Model
{
    use HasFactory;


    protected $fillable = [
        'propietario',
        'marca',
        'modelo',
        'placa',
        'descripcion',
        'estado',
        
    ];
}

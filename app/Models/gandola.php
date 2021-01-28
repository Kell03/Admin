<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gandola extends Model
{

public function scopeBuscarpor($query, $tipo, $buscar){
      
      if(($tipo) && ($buscar)){

        return $query->where($tipo, 'like', "%$buscar%");

      }

  }

    protected $fillable = [
        'propietario',
        'marca',
        'modelo',
        'placa',
        'descripcion',
        'estado',
        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta extends Model
{
    use HasFactory;

       
       public function scopeBusqueda($query, $desde, $hasta){
      
      if(($desde) && ($hasta)){

        return $query->whereBetween('guias.created_at', ["$desde","$hasta"]);

      }

  }


protected $fillable = [
        'guia',
        'id_chofer',
        'chofer',
        'placa',
        'dueño',
        'origen',
        'destino',
        'carga',
        'created_at',
        'updated_at',
         'status',
        
    ];
  }

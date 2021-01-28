<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guias extends Model
{

      

    public function scopeBuscar($query, $desde, $hasta){
      
  if(($desde) && ($hasta)){

        return $query->whereBetween('guias.created_at', ["$desde","$hasta"]);

      }
      
}

      public function scopeBuscarpor($query, $tipo, $buscar){
      
      if(($tipo) && ($buscar)){

        return $query->where($tipo, 'like', "%$buscar%");

      }


}
   }
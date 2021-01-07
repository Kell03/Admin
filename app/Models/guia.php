<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;

       public function scopeBuscarpor($query, $tipo, $buscar){
      
      if(($tipo) && ($buscar)){

        return $query->where($tipo, 'like', "%$buscar%");

      }

  }
	
   protected $fillable = [
        'guia',
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
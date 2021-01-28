<?php

namespace App\Exports;

//use Illuminate\Contracts\View\View;

use App\Models\guia;
//use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;




class guiaExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
     
         use Exportable;


    
    public function forYear( $year)
    {
        $this->year = $year;
        
                return $this;


    }


      

    public function query()    {
       // return view('exports.guia', 
        //        	[
         //   'guia' => guia::get()
        
        //]);

                return guia::query()->whereYear('created_at', $this->year);




    }
}

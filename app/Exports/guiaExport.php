<?php

namespace App\Exports;

//use Illuminate\Contracts\View\View;
use DB;

use App\Models\guia;
//use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;





class guiaExport implements FromCollection,WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
     


    
    public function headings(): array
    {
        return [
             'Guia',    'Chofer',  'Placa', 'Dueño',   'Origen',  'Destino',   'Carga',   'Status',  'Fecha_sal',   'Fech_lleg',
        ];
 
       
       }
    public function collection()
    {
         $guias = DB::table('guias')->select(
            'guia', 
            'chofer',
            'placa',
            'dueño',
            'origen',
            'destino',
            'carga',
            'status',
            'created_at',
            'updated_at', 
                      )->get();
         return $guias;

    }
    public function export_periodo(Request $request)
    {
      
        $desde = $request->get('desde');

        $hasta = $request->get('hasta');
     
        $total_record=guias
        ::join("choferes","choferes.cedula" ,"=","guias.chofer")
        ->Buscar($desde,$hasta)
        ->select("guias.*")->count();

        $guias = guias
        ::join("choferes","choferes.cedula" ,"=","guias.chofer")
        ->Buscar($desde,$hasta)
        ->select("guias.*", "choferes.names", "choferes.apellido");
        
        return $guias;

    }
}

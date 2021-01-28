<?php

namespace App\Exports;

use App\Models\consulta;
use Maatwebsite\Excel\Concerns\FromCollection;

class consultaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return consulta::all();
    }
}

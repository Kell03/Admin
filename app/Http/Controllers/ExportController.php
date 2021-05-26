<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Requests\CreateGuiaRequest;
use App\Http\Requests\ChofereFormRequest;
use App\Http\Requests\cedeformrequest;

use App\Exports\guiaExport;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\guia;
use App\Models\guias;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function exports(Request $request)
    {


  
header("Content-type:application/xls");
header("Content-Disposition: attachment; filename=Reporte.xls");



       $desde = $request->get('desde');
       $hasta = $request->get('hasta');

         $items = guias
         ::Buscar($desde,$hasta)
        ->simplepaginate(1000);
          
    

        

return view('xls.user', compact('items','desde', 'hasta'));

      



    }

    public function exportsII(Request $request)
    {


 header("Pragma: public");
header("Expires: 0");
$filename = "nombreArchivoQueDescarga.xls";
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");



       $desde = $request->get('desde');
       $hasta = $request->get('hasta');
        $buscar = $request->get('buscar');
       $tipo = $request->get('tipo');

         $items = guias
         ::Buscar($desde,$hasta)
         ->buscarpor($tipo, $buscar)
        ->simplepaginate(15);
          
    

        

return view('xls.user', compact('items','desde', 'hasta','tipo','buscar'));

      



    }

      public function exportsIII(Request $request)
    {


 header("Pragma: public");
header("Expires: 0");
$filename = "nombreArchivoQueDescarga.xls";
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");



       $desde = $request->get('desde');
       $hasta = $request->get('hasta');
        $buscar = $request->get('buscar');
       $tipo = $request->get('tipo');
       $buscar2 = $request->get('buscar2');
        $tipo2 = $request->get('tipo2');


         $items = guias
         ::Buscar($desde,$hasta)
         ->buscarpor($tipo, $buscar)
         ->buscarpor($tipo2, $buscar2)
        ->simplepaginate(15);
          
    

        

return view('xls.user', compact('items','desde', 'hasta','tipo','buscar','tipo2','buscar2'));

      



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

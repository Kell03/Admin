<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateGuiaRequest;

use Illuminate\Http\Request;
use App\Models\guias;
use App\Models\guia;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        ->select("guias.*", "choferes.names", "choferes.apellido")->simplepaginate(5);
          return view('consultas.index',compact('guias', 'total_record'));




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

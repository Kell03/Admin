<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consulta;
use App\Models\guia;
use App\Models\guias;


class CombinadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
    $desde=$request->get('desde');

    $hasta=$request->get('hasta');
       
    $buscar = $request->get('buscar');


  $tipo = $request->get('tipo');

       $total_records = guias
       :://join("choferes","choferes.cedula" ,"=","guias.chofer")
       Buscar($desde, $hasta)
       ->buscarpor($tipo, $buscar)
       ->select("guias.*")->count();
            


       $guias = guias
       :://join("choferes","choferes.cedula" ,"=","guias.chofer")
       Buscar($desde, $hasta)
       ->buscarpor($tipo, $buscar)
       ->select("guias.*")->simplepaginate(5);
            
          return view('consultas.consul',compact('guias', 'total_records', 'desde', 'hasta', 'buscar', 'tipo'));


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

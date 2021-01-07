<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\gandolaformrequest;
use App\Models\chofere;
use App\Models\gandola;
use App\Models\Dueño;


class GandolaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
if($request){


$query= trim($request->get('search'));

    $gandolas = gandola::where('marca', 'LIKE', '%' .$query. '%')->OrderBy('id','asc')->simplepaginate(10);

      return view('gandolas.index', ['gandolas' => $gandolas, 'search' => $query]);

}
        //$gandolas = gandola::all();
          //return view('gandolas.index', ['gandolas' => $gandolas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                        return view('gandolas.create',[

         'gandolas'=> new gandola, 'dueño' => dueño::get()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gandolas = new gandola();

        $gandolas->propietario = request('propietario');
        $gandolas->marca = request('marca');
        $gandolas->modelo = request('modelo');
        $gandolas->placa = request('placa');
        $gandolas->descripcion = request('descripcion');
        $gandolas->estado = request('estado');

        $gandolas->save();

        return redirect('/gandolas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                return view('gandolas.show', ['gandola'=> gandola::findOrFail($id)]);  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(gandola $gandolas, $id)
    {
        return view('gandolas.edit',['dueño'=>dueño::get(),'choferes'=> chofere::get(), 'gandolas'=> gandola::findOrFail($id)]);   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(gandolaformrequest $request, $id)
    {
        $gandolas = gandola::findOrFail($id);

        $gandolas->propietario = $request->get('propietario');
        $gandolas->marca = $request->get('marca');
        $gandolas->modelo = $request->get('modelo');
        $gandolas->placa = $request->get('placa');
        $gandolas->descripcion = $request->get('descripcion');
        $gandolas->estado = $request->get('estado');
        $gandolas->created_at = $request->get('created_at');
        $gandolas->update();

        return redirect('/gandolas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
$gandolas = gandola::findOrFail($id);

        $gandolas->delete();

        return redirect('/gandolas');    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Requests\ChofereFormRequest;
use App\Http\Requests\gandolaformRequest;

use Illuminate\Http\Request;
use App\Models\chofere;
use App\Models\gandola;

class ChofereController extends Controller
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

    $choferes = chofere::where('cedula', 'LIKE', '%' .$query. '%')->OrderBy('id','asc')->get();

      return view('choferes.index', ['choferes' => $choferes, 'search' => $query]);

}

       // $choferes = chofere::all();
         // return view('choferes.index', ['choferes' => $choferes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('choferes.create',[

         'choferes'=> new chofere, 'gandolas' => gandola::get()

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
        $choferes = new chofere();

        $choferes->names = request('names');
        $choferes->apellido = request('apellido');
        $choferes->cedula = request('cedula');
        $choferes->placa = request('placa');
        $choferes->tlf = request('tlf');

        $choferes->save();

        return redirect('/choferes');

            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                return view('choferes.show', ['chofere'=> chofere::findOrFail($id)]);  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(chofere $choferes, gandola $gandolas, $id)
    {

        return view('choferes.edit',['gandolas'=>gandola::get(),'choferes'=> chofere::findOrFail($id)]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(chofere $choferes, ChofereFormRequest $request)
    {
             $choferes->update( $request->validated());


        return redirect('/choferes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $choferes = chofere::findOrFail($id);

        $choferes->delete();

        return redirect('/choferes');    

    }
}

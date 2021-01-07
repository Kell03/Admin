<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateGuiaRequest;
use App\Http\Requests\ChofereFormRequest;
use App\Http\Requests\cedeformrequest;


use App\Models\guia;
use App\Models\chofere;
use App\Models\cede;
use App\Models\Dueño;


use Illuminate\Http\Request;

class GuiaController extends Controller
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
        
 
 $buscar = $request->get('buscar');

  $tipo = $request->get('tipo');

 $guia = guia::buscarpor($tipo, $buscar)->paginate(5);

 return view('guias.index',compact('guia'));

//else
//{

//$query= trim($request->get('fech'));

  //   $guia = guia::where('created_at', 'LIKE', '%' .$query. '%')->OrderBy('id','asc')->simplepaginate();


    //  return view('guias.index', ['guia' => $guia, 'fech' => $query]);
//}

        //return view('guias.index',[
         
         //'guia'=> guia::get(), 'chofere' => chofere::get(), 'cede' => cede::get()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guias.create',[
          
          'guia'=> new guia, 'chofere'=> chofere::get(),'cede' => cede::get(),'dueño' => dueño::get()       
        ]);

            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGuiaRequest $request)
    {


        guia::create($request->validated());

    return redirect()->route('guias.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                 return view('guias.show', ['guia'=> guia::findOrFail($id)]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit(guia $guia)
    {
        return view('guias.edit',[

         'guia'=> $guia,
         'chofere'=> chofere::get(),
         'cede' => cede::get(),
         'dueño' => dueño::get()

        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(guia $guia, CreateGuiaRequest $request )
    {
             $guia->update( $request->validated());

             return redirect()->route('guias.index');


            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guia = guia::findOrFail($id);

        $guia->delete();

        return redirect('/guias');
    }
}

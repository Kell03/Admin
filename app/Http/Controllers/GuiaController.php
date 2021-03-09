<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateGuiaRequest;
use App\Http\Requests\ChofereFormRequest;
use App\Http\Requests\cedeformrequest;

use App\Exports\guiaExport;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\guia;
use App\Models\chofere;
use App\Models\cede;
use App\Models\Dueño;
use App\Models\gandola;
use App\Models\guias;



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
   
 //$guia = guia::buscarpor($tipo, $buscar)->paginate(5);

 //return view('guias.index',compact('guia'));



  $time = $request->get('tiempo'); 


// $guie = guia::select('guias')->count(); 

$guie = guia
::join("cedes","cedes.codigo" ,"=","guias.origen")
->buscarpor($tipo, $buscar)
->select("guias.*")->count(); 

$guias = guia
::join("cedes as cedes_origen","cedes_origen.codigo" ,"=","guias.origen")
->join("cedes as cedes_destino","cedes_destino.codigo" ,"=","guias.destino")
->buscarpor($tipo, $buscar)
->select("guias.*", "cedes_origen.names as names_origen", "cedes_destino.names as names_destino")
->simplepaginate(5);

$guias_exportar = guia
::join("cedes as cedes_origen","cedes_origen.codigo" ,"=","guias.origen")
->join("cedes as cedes_destino","cedes_destino.codigo" ,"=","guias.destino")
->buscarpor($tipo, $buscar)
->select("guias.*", "cedes_origen.names as names_origen", "cedes_destino.names as names_destino");


 //$guia = guia::where('created_at', 'like', "%$time%")->paginate(5);

 return view('guias.index',compact('guias', 'guie'));




//else
//{

//$query= trim($request->get('fech'));

  // s  $guia = guia::where('created_at', 'LIKE', '%' .$query. '%')->OrderBy('id','asc')->simplepaginate();

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
     
     

    public function exportPdf(Request $request)
    {

       $desde = $request->get('desde');

       $hasta = $request->get('hasta'); 
        //$desde = "2021-01-01";
        //$hasta = "2021-01-31";      
        //var_dump($desde);
        //var_dump($hasta).exit;
        //$guias = guias
        //::get();
        //$total_record=12;
        $guias = guias
        ::Buscar($desde,$hasta)
        ->simplepaginate(15);
          //return view('consultas.index',compact('guias', 'total_record'));

        $pdf     = PDF::loadView('pdf.user', compact('guias','desde', 'hasta'));
       

        return $pdf->download('user-list.pdf');




    }

        public function exportarPdf(Request $request)
    {

   $buscar = $request->get('buscar');

  $tipo = $request->get('tipo');

       $desde = $request->get('desde');

       $hasta = $request->get('hasta'); 
        //$desde = "2021-01-01";
        //$hasta = "2021-01-31";      
        //var_dump($desde);
        //var_dump($hasta).exit;
        //$guias = guias
        //::get();
        //$total_record=12;
        $guias = guias
        ::Buscar($desde,$hasta)->buscarpor($tipo, $buscar)
        ->simplepaginate(15);
          //return view('consultas.index',compact('guias', 'total_record'));

        $pdf     = PDF::loadView('pdf.uuser', compact('guias'));
       

        return $pdf->download('user-list.pdf');




    }


     public function export()
    {



        return Excel::download(new guiaExport, 'Reporte.xlsx');




    }



    public function create()
    {
        return view('guias.create',[
          
          'guia'=> new guia, 'chofere'=> chofere::get(), 'gandola'=> gandola::get(),'cede' => cede::get(),'dueño' => dueño::get()       
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
         'dueño' => dueño::get(),
         'gandola' => gandola::get()

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

<?php

namespace App\Http\Controllers;
use App\Http\Requests\cedeformrequest;

use Illuminate\Http\Request;
use App\Models\cede;

class cedecontroller extends Controller
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

      $cedes = cede::where('codigo', 'LIKE', '%' .$query. '%')->OrderBy('id','asc')->simplepaginate(5);

      return view('cedes.index', ['cedes' => $cedes, 'search' => $query]); 
       
       }


        //$cedes = cede::get()->paginate(5);
        //return view('cedes.index', ['cedes' => $cedes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cedes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cedes = new cede();

        $cedes->names = request('names');
        $cedes->codigo = request('codigo');

        $cedes->save();

        return redirect('/cedesss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            return view('cedes.show', ['cede'=> cede::findOrFail($id)]);  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                return view('cedes.edit', ['cede'=> cede::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cedeformrequest $request, $id)
    {
                        $cedes = cede::findOrFail($id);

        $cedes->names = $request->get('names');
        $cedes->codigo = $request->get('codigo');

        $cedes->update();

        return redirect('/cedesss');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
       $cedes = cede::findOrFail($id);

        $cedes->delete();

        return redirect('/cedesss');

    }
}

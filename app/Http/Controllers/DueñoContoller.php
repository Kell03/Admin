<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DueñoFormRequest;

use App\Models\Dueño;

class DueñoContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dueño = dueño::all();
          return view('dueños.index', ['dueños' => $dueño]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dueños.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dueño = new dueño();

        $dueño->codigo = request('codigo');
        $dueño->dueño = request('dueño');
        $dueño->nombre = request('nombre');
        $dueño->save();

        return redirect('/dueños');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('dueños.show', ['dueño'=> dueño::findOrFail($id)]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     return view('dueños.edit', ['dueño'=> dueño::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DueñoFormRequest $request, $id)
    {
        $dueño = dueño::findOrFail($id);

        $dueño->codigo = $request->get('codigo');
        $dueño->dueño = $request->get('dueño');
                $dueño->nombre = request('nombre');


        $dueño->update();

        return redirect('/dueños');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dueños = dueño::findOrFail($id);

        $dueños->delete();

        return redirect('/dueños');
    }
}

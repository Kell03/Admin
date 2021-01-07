<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserFormeRequest;
use App\Http\Requests\UserEditFormRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{


     public function __construct()
    {
        $this->middleware('auth');
    }
    



    public function index(Request $request)
    {
          


if($request){


$query= trim($request->get('search'));

    $users = user::where('name', 'LIKE', '%' .$query. '%')->OrderBy('id','asc')->get();

      return view('usuarios.index', ['users' => $users, 'search' => $query]);

}

          //$users = user::all();
          //return view('usuarios.index', ['users' => $users]);



           }



    public function create()
    {

        $roles = Role::all();
        return view('usuarios.create', ['roles'=>$roles]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserformeRequest $request)
    {
        $usuarios = new User();

        $usuarios->name = request('name');
        $usuarios->email = request('email');
        $usuarios->password = bcrypt(request('password'));

            $usuarios->password = bcrypt(request('password'));

        if($request->hasFile('imagen')){

            $file = $request->imagen;
            $file->move(public_path(). '/imagenes', $file->getClientOriginalName());
             
             $usuarios->imagen = $file->getClientOriginalName();

        }


        $usuarios->save();

        $usuarios->asignarRol($request->get('rol'));
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuarios.show', ['user'=> user::findOrFail($id)]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
         $roles = Role::all();
        return view('usuarios.edit', ['user'=> $user, 'roles' => $roles]);

            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditFormRequest $request, $id)
    {
               $usuarios = User::findOrFail($id);

        $usuarios->name = $request->get('name');
        $usuarios->email = $request->get('email');
        
        $pass = $request->get('password');
        if($pass != null){
        
          $usuarios->password = bcrypt($request->get('password'));

        }

        else {

            unset($usuarios->password);
        }
 

        $role = $usuarios->roles;
        if(count($role) > 0){
           
           $role_id = $role[0]->id;

                   User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);

        }

        else{

        $usuarios->asignarRol($request->get('rol'));


        }


if($request->hasFile('imagen')){

          $file = $request->imagen;
            $file->move(public_path(). '/imagenes', $file->getClientOriginalName());
             
             $usuarios->imagen = $file->getClientOriginalName();

        }

        $usuarios->update();

        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = User::findOrFail($id);

        $usuarios->delete();

        return redirect('/usuarios');
    }
}

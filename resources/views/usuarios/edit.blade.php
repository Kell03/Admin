@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-sm-6">

<form action="{{route('usuarios.update', $user->id)}}" method="POST">
   @method('PATCH')
  @csrf

<h3>Editar Usuario: {{$user->name}}</h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



  <div class="row">
       <div class="form-group col-md-6">
          <label>Nombre</label>
           <input type="text" name="name" class="form-control"  value="{{$user->name}}" placeholder="Escribe el Nombre">
       </div>

       <div class="form-group col-md-6">
           <label>Email</label>
            <input type="Email" name="email" class="form-control" value="{{$user->email}}" placeholder="Escribe el Email">
       </div>
 </div>

    <div class="row">
       <div class="form-group col-md-6">
          <label>Contraseña</label>
          <input type="password" name="password"class="form-control" value="{{$user->contraseña}}" placeholder="contraseña">
          </div>

        <div class="form-group col-md-6">
           <label>Confirme Contraseña</label>
           <input type="password" name="password_confirmation" class="form-control" value="{{$user->contraseña}}" placeholder="Confirme contraseña">
        </div>
</div>

<div class="row">
        <div class="form-group col-md-6">
           <label for="Nombre">Rol</label>
           <select name="rol" class="form-control">
           <option selected disabled>Elije un Rol para este usuario...</option>
           @foreach($roles as $role)
           @if($role->name == str_replace(array('["','"]'),'', $user->tieneRol()))
            <option value="{{$role->id}}" selected> {{$role->name}} </option>
            @else
            <option value="{{$role->id}}"> {{$role->name}} </option>
            @endif
           @endforeach
           </select>
           </div>
 

    <div class="form-group ">
        <label>Imagen</label>
         <input type="text" name="imagen" value="{{$user->imagen}}" class="form-control">
         @if($user->imagen != "")
          <img src="{{asset('imagenes/'.$user->imagen) }}" alt="{{$user->imagen}}" height="50px" width="50px">
         @endif
    </div>
</div>

<div class="row"> 
    <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
  </div>
    
</div>
</form>

</div>

</div>

</div>


@endsection
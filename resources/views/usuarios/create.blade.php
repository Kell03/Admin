@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-sm-6">
      <h2>Crear Nuevo Usuario</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</div>

</div>
<form action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="row">
       <div class="form-group col-md-6">
          <label>Nombre</label>
           <input type="text" name="name" class="form-control" placeholder="Escribe el Nombre">
       </div>

       <div class="form-group col-md-6">
           <label>Email</label>
            <input type="Email" name="email" class="form-control" placeholder="Escribe el Email">
       </div>
 </div>

    <div class="row">
       <div class="form-group col-md-6">
          <label>Contraseña</label>
          <input type="password" name="password"class="form-control" placeholder="contraseña">
          </div>

        <div class="form-group col-md-6">
           <label>Confirme Contraseña</label>
           <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme contraseña">
        </div>
</div>

<div class="row">
        <div class="form-group col-md-6">
           <label for="Nombre">Rol</label>
           <select name="rol" class="form-control">
           <option selected disabled>Elije un rol para este usuario.. </option>
           @foreach($roles as $role)
            <option value="{{$role->id}}"> {{$role->name}} </option>
           @endforeach
           </select>
           </div>
 

    <div class="form-group col-md-6">
        <label>Imagen</label>
         <input type="file" name="imagen" class="form-control">
    </div>
</div>

<div class="row"> 
    <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Registrar</button>
    <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>

  </div>
    
</div>
    
</form>




@endsection
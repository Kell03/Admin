@extends('layouts.app')

@section('content')
<div class="container">
  @can('administrador')
<h2>Lista de Usuarios <a href="{{ route('usuarios.create')}}"><button type="button" class="btn btn-success float-right">Agregar Usuario</button></a>
</h2>

@endcan
<h6>

  @if($search)
  <div class="alert alert-primary"  role="alert">
   
 Los resultados de tu  busqueda  {{$search}} son:
</div>

@endif
</h6>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Foto</th>

      <th scope="col">Rol</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td><img src="{{asset('imagenes/'. $user->imagen)}}" alt="{{$user->imagen}}" height="50px" width="50px"></td>
      <td>
         @foreach($user->roles as $role)
        {{$role->name}}</td>

      @endforeach
      <td>      

        
        <form action="{{route('usuarios.destroy', $user->id)}}" method="POST">
          <a href="{{route('usuarios.show', $user->id)}}"> <button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>
 </button></a>

          <a href="{{route('usuarios.edit', $user->id)}}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>

          @csrf
          @method('DELETE')

           


                 <button type="Submit" class="btn btn-danger  btn-sm"><i class="far fa-trash-alt"></i></button> 
        </form>

</td>
    </tr>
   @endforeach
  </tbody>
</table>

</div>
@endsection
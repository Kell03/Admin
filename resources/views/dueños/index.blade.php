
@extends('layouts.app')

@section('content')
<div class="container">
<h2>Lista de Centros de Dueños <a href="{{ route('dueños.create')}}"><button type="button" class="btn btn-success float-right">Agregar Nuevo

 </button></a>
</h2>



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dueño</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($dueños as $dueño)
    <tr>
      <th scope="row">{{$dueño->id}}</th>
      <td>{{$dueño->codigo}}</td>
      <td>{{$dueño->nombre}}</td>
      <td>{{$dueño->dueño}}</td>

       <td>      
          <form action="{{route('dueños.destroy', $dueño->id)}}" method="POST">
          <a href="{{route('dueños.show', $dueño->id)}}"> <button type="button" class="btn btn-secondary">Ver </button></a>
          <a href="{{route('dueños.edit', $dueño->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
          @csrf
          @method('DELETE')

          <button type="Submit" class="btn btn-danger">Eliminar</button> 
        
          </form>

</td>
    </tr>
   @endforeach

  </tbody>
</table>

</div>
@endsection
 
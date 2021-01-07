
@extends('layouts.app')

@section('content')
<div class="container">
<h2>Lista de Centros de Distribucion <a href="{{ route('cedes.create')}}"><button type="button" class="btn btn-success float-right">Agregar CD</button></a>
</h2>

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
      <th scope="col">Cedes</th>
      <th scope="col">Codigo</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($cedes as $cede)
    <tr>
      <th scope="row">{{$cede->id}}</th>
      <td>{{$cede->names}}</td>
      <td>{{$cede->codigo}}</td>

       <td>      
          <form action="{{route('cedes.destroy', $cede->id)}}" method="POST">
          <a href="{{route('cedes.show', $cede->id)}}"> <button type="button" class="btn btn-secondary">Ver </button></a>
          <a href="{{route('cedes.edit', $cede->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
          @csrf
          @method('DELETE')

          <button type="Submit" class="btn btn-danger">Eliminar</button> 
        
          </form>

</td>
    </tr>
   @endforeach

  </tbody>
</table>
{{ $cedes->links() }}

</div>
@endsection
 
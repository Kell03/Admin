@extends('layouts.app')

@section('content')
<div class="container">
<h2>Lista de choferes <a href="{{ route('choferes.create')}}"><button type="button" class="btn btn-success float-right">Agregar Chofer</button></a>
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
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Cedula</th>
      <th scope="col">Placa</th>
      <th scope="col">Telefono</th>
      <th scope="col">Opciones</th>



    </tr>
  </thead>
  <tbody>

  	@foreach($choferes as $chofere)
    <tr>
      <th scope="row">{{$chofere->id}}</th>
      <td>{{$chofere->names}}</td>
      <td>{{$chofere->apellido}}</td>
      <td>{{$chofere->cedula}}</td>
      <td>{{$chofere->placa}}</td>
      <td>{{$chofere->tlf}}</td>
      
<td>      

        
        <form action="{{route('choferes.destroy', $chofere->id)}}" method="POST">
          
          <a href="{{route('choferes.show',$chofere->id)}}"> <button type="button" class="btn btn-secondary">Ver </button></a>

          <a href="{{route('choferes.edit',$chofere->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

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
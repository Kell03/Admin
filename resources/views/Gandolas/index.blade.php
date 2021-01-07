@extends('layouts.app')

@section('content')
<div class="container">
<h2>Lista de gandolas <a href="{{ route('gandolas.create')}}"><button type="button" class="btn btn-success float-right">Agregar Gandola</button></a>
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
      <th scope="col">Propietario</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Placa</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Estado</th>
      <th scope="col">Opciones</th>



    </tr>
  </thead>
  <tbody>

  	@foreach($gandolas as $gandola)
    <tr>
      <th scope="row">{{$gandola->id}}</th>
      <td>{{$gandola->propietario}}</td>
      <td>{{$gandola->marca}}</td>
      <td>{{$gandola->modelo}}</td>
      <td>{{$gandola->placa}}</td>
      <td>{{$gandola->descripcion}}</td>
      <td>{{$gandola->estado}}</td>
<td>      

        
        <form action="{{route('gandolas.destroy', $gandola->id)}}" method="POST">
          
          <a href="{{route('gandolas.show', $gandola->id)}}"> <button type="button" class="btn btn-secondary">Ver </button></a>

          <a href="{{route('gandolas.edit', $gandola->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

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
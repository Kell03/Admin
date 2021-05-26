@extends('layouts.app')

@section('content')
<div class="container">
<h2>Lista de gandolas <a href="{{ route('gandolas.create')}}"><button type="button" class="btn btn-success float-right">Agregar Gandola</button></a>
</h2>
<h6>

<nav class="navbar navbar-light float-right">
  <form class="form-inline">
    <div class="input-group input-group-sm"> 
    
     
     <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
      <option>Buscar por</option>
      <option>Propietario</option>
      <option>Placa</option>
      <option>Modelo</option>
      <option>Marca</option>
    </select>

    <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

    <div class="input-group-append">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
  </div>
    </div>
  </form>
</nav>


    </div>
    </form>
</nav>




    <br>  

<div class="container">

<table class="table table-sm table-hover">
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


<h5>
 El numero de Gandolas es: {{$gand}}
</h5>

<br>  

{{ $gandolas->links() }}


</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
<h2>Lista de choferes <a href="{{ route('choferes.create')}}"><button type="button" class="btn btn-success float-right">Agregar Chofer</button></a>
</h2>
<nav class="navbar navbar-light float-right">
  <form class="form-inline">
    <div class="input-group input-group-sm"> 
    
     
     <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
      <option>Buscar por</option>
      <option>names</option>
      <option>Apellido</option>
      <option>Cedula</option>
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
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Cedula</th>
      <th scope="col">Telefono</th>
      <th scope="col">Ingreso</th>
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
      <td>{{$chofere->tlf}}</td>
      <td>{{$chofere->created_at}}</td>
      
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
<h4>  
El numero de Choferes es: {{$chofer}}
</h4>
<br>  
{{ $choferes->links() }}

</div>
@endsection
</div>
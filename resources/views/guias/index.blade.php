
@extends('layouts.app')

@section('content')
<div class="container">
<h2>Lista de guias <a href="{{ route('guias.create')}}"><button type="button" class="btn btn-success">Agregar Guia</button></a>
</h2>

<nav class="navbar navbar-light float-right">
  <form class="form-inline">
    <div class="input-group input-group-sm"> 
    
     
     <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
      <option>Buscar por</option>
      <option>Guia</option>
      <option>Dueño</option>
      <option>Placa</option>
      <option>Origen</option>
      <option>Destino</option>
      <option>Status</option>
    </select>

    <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

    <div class="input-group-append">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
  </div>
    </div>
  </form>
</nav>

<nav class="navbar navbar-light float-right">
  
    <form class="form-inline">
          <div class="input-group input-group-sm"> 

      <input class="form-control mr-sm-2" type="Date" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search</button>
    </div>
    </div>
    </form>
</nav>




<br>
</br>
<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
     
      <th scope="col">Guia</th>
      <th scope="col">Chofer</th>
      <th scope="col">Placa</th>
      <th scope="col">Origen</th>
      <th scope="col">Destino</th>
      <th scope="col">Carga</th>
      <th scope="col">Status</th>
      <th scope="col">Fecha_sal</th>
      <th scope="col">Fech_lleg</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($guia as $guia)
    <tr>

      <td>{{$guia->guia}}</td>
      <td>{{$guia->chofer}}</td>
       <td>{{$guia->placa}}</td>
       <td>{{$guia->origen}}</td>
      <td>{{$guia->destino}}</td>
       <td>{{$guia->carga}}</td>
       <td>{{$guia->status}}</td>
      <td>{{$guia->created_at}}</td>
       <td>{{$guia->updated_at}}</td>


      <td>      

        <form action="{{route('guias.destroy', $guia->id)}}" method="POST">
          <a href="{{route('guias.show', $guia)}}"> <button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></button></a>

          <a href="{{route('guias.edit', $guia)}}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
          @csrf
          @method('DELETE')

           


                 <button type="Submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button> 
        </form>

           

</td>
    </tr>
    

   @endforeach
  </tbody>
</table>


</div>
</div>
@endsection
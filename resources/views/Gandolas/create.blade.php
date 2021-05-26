@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-sm-6">
<form action="{{route('gandolas.store')}}" method="POST">
  @csrf
<div class="form-group">
    <label for="Propietario">Propietario</label>
        <select class="form-control border-0 bg-light shadow-sm" name="propietario" >
         <option></option>

        @foreach($dueño as $row)
        <option value="{{$row->dueño}}">{{$row->nombre}}-{{$row->dueño}} </option>
        

@endforeach

    </select>
  </div>

  <div class="form-group">
    <label for="marca">Marca</label>
    <input type="text" class="form-control" name="marca" placeholder="Escribe la marca" >

  </div>

    <div class="form-group">
    <label for="modelo">Modelo</label>
    <input type="text" class="form-control" name="modelo" placeholder="Escribe el modelo">
  </div>

  <div class="form-group">
    <label for="placa">Placa</label>
    <input type="text" class="form-control" name="placa" placeholder="Escribe el placa">
  </div>



    <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" placeholder="Escribe el descripcion">
  </div>

<div class="form-group">
      <label for="estado">Estado</label>
    
  <select  name="estado" class="form-control border-0 bg-light shadow-sm">
    <option ></option>
    <option>Dañado</option>
    <option>Optimo</option>
</select>

</div>
<div class="form-group">
 
 <label form="url"> @lang('Date') </label>

    
<?php 

    if (isset($gandolas->created_at)){
         $fecha = $gandolas->created_at->format('Y-m-d');
     }else{
        $fecha=date('Y-m-d');
    }
    ?>
        
    <input class="form-control border-0 bg-light shadow-sm"

     id="url"
     type="date" 

     name="created_at"


required 
     >
</div>



    <button type="submit" class="btn btn-primary">Registrar</button>
    <a href="{{route('gandolas.index')}}"><button type="button" class="btn btn-danger"> Cancelar</button> </a>

</form>

</div>



</div>

</div>


@endsection
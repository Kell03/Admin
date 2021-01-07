@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-sm-6">


 
<form action="{{route('gandolas.update',  $gandolas->id)}}" method="POST">
  @method('PATCH')
    @csrf

      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-group">
    <label for="Propietario">Propietario</label>
        <select class="form-control border-0 bg-light shadow-sm" name="propietario" >
         <option value="{{old('propietario', $gandolas->propietario)}}"> {{old ('propietario',$gandolas->propietario)}}</option>

        @foreach($dueño as $row)
        <option value="{{$row->dueño}}">{{$row->codigo}}-{{$row->dueño}} </option>
        

@endforeach



    </select>
  </div>

  <div class="form-group">
    <label for="marca">marca</label>
    <input type="text" class="form-control" name="marca" value="{{old('marca', $gandolas->marca)}}"placeholder="Escribe la marca" >

  </div>

    <div class="form-group">
    <label for="modelo">modelo</label>
    <input type="text" class="form-control" name="modelo" value="{{old('modelo', $gandolas->modelo)}}" placeholder="Escribe el modelo">
  </div>

  <div class="form-group">
    <label for="placa">placa</label>
    <input type="text" class="form-control" name="placa" value="{{old('placa', $gandolas->placa)}}" placeholder="Escribe el placa">
  </div>



    <div class="form-group">
    <label for="descripcion">descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{old('descripcion', $gandolas->descripcion)}}" placeholder="Escribe el descripcion">
  </div>

<div class="form-group">
      <label for="estado">estado</label>
    
  <select  name="estado" class="form-control border-0 bg-light shadow-sm">
    <option value="{{old('estado', $gandolas->estado)}}">  {{old('estado', $gandolas->estado)}}</option>
    <option>Dañado</option>
    <option>optimo</option>
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
     value="{{ old ('gandolas', $fecha)}}"
     name="created_at"


required 
     >
</div>



    <button type="submit" class="btn btn-primary">Registrar</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>

</form>


</div>



</div>

</div>


@endsection
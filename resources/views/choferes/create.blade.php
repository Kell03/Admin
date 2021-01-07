@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-sm-6">



<form action="{{route('choferes.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="Choferes">Choferes</label>
    <input type="text" class="form-control" name="names" placeholder="Escribe el nombre" >
  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" placeholder="Escribe el apellido" >

  </div>

    <div class="form-group">
    <label for="cedula">Cedula</label>
    <input type="text" class="form-control" name="cedula" placeholder="Escribe la cedula">
  </div>



  <div class="form-group">
    <label for="placa">Placa</label>
    <select class="form-control border-0 bg-light shadow-sm" name="placa" >
        @foreach($gandolas as $row)
        <option></option>
        <option value="{{$row->placa}}"> {{$row->id}}. {{$row->modelo}}-{{$row->placa}} </option>
      @endforeach
      </div>
  </select>

    <div class="form-group">
    <label for="tlf">Telefono</label>
    <input type="text" class="form-control" name="tlf" placeholder="Escribe el tlf">
    </div>

    <button type="submit" class="btn btn-primary">Registrar</button>
<a href="{{ route('choferes.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>





</div>



</div>

</div>


@endsection
@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-sm-6">
<form action="{{route('dueños.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="codigo">Codigo.</label>
    <input type="text" class="form-control" name="codigo" placeholder="Escribe el Codigo" >
  </div>
  <div class="form-group">
    <label for="dueño">Dueño</label>
    <input type="text" class="form-control" name="dueño" placeholder="Escribe el Dueño" >

  </div>

    
    <button type="submit" class="btn btn-primary">Registrar</button>
    <a href="{{ route('dueños.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>

</form>

</div>

</div>

</div>


@endsection
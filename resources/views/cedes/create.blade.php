@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-sm-6">
<form action="{{route('cedes.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="names">Centro Dist.</label>
    <input type="text" class="form-control" name="names" placeholder="Escribe el Centro Dist" >
  </div>
  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" name="codigo" placeholder="Escribe el codigo" >

  </div>

    
    <button type="submit" class="btn btn-primary">Registrar</button>
<a href="{{ route('cedes.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>

</div>

</div>

</div>


@endsection
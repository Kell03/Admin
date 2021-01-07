@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-sm-6">

<form action="{{route('cedes.update', $cede->id)}}" method="POST">
   @method('PATCH')
  @csrf

<h3>Editar Cede: {{$cede->names}}</h3>
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
    <label for="names">Cede</label>
    <input type="text" class="form-control" name="names" value="{{$cede->names}}"placeholder="Escribe la cede" >
  </div>
  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{$cede->codigo}}" placeholder="Escribe el codigo" >

  </div>

    <button type="submit" class="btn btn-primary">Registrar</button>
<a href="{{ route('cedes.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>

</div>

</div>

</div>


@endsection
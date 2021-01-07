@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-sm-6">

<form action="{{route('dueños.update', $dueño->id)}}" method="POST">
   @method('PATCH')
  @csrf

<h3>Editar dueño: {{$dueño->dueño}}</h3>
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
    <label for="names">Codigo</label>
    <input type="text" class="form-control" name="codigo" value="{{$dueño->codigo}}"placeholder="Escribe la dueño" >
  </div>
  <div class="form-group">
    <label for="codigo">Dueño</label>
    <input type="text" class="form-control" name="dueño" value="{{$dueño->dueño}}" placeholder="Escribe el codigo" >

  </div>

    <button type="submit" class="btn btn-primary">Registrar</button>
<a href="{{ route('dueños.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>

</div>

</div>

</div>


@endsection
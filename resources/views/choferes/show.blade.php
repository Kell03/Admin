@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$chofere->names}}:{{$chofere->apellido}}</h1>
    <h3 class="display-6">Cedula:{{$chofere->cedula}}</h3>
    <h2 class="lead">Placa:{{$chofere->placa}}  Chuto:{{$chofere->chuto}}	</h2>
  </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$gandola->marca}}:{{$gandola->modelo}}</h1>
    <p class="lead">Dueño:{{$gandola->propietario}}</p>
  </div>
</div>

@endsection
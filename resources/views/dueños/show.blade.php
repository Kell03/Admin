@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$dueño->codigo}}</h1>
    <p class="lead">{{$dueño->dueño}}</p>
  </div>
</div>

@endsection
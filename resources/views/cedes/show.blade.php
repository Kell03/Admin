@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$cede->names}}</h1>
    <p class="lead">{{$cede->codigo}}</p>
  </div>
</div>

@endsection
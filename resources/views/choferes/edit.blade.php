@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-sm-6">

      <h3>Editar Chofer: {{$choferes->names}} {{$choferes->apellido}}</h3>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('choferes.update', $choferes->id)}}" method="POST">
   @method('PATCH')

  @csrf
  <div class="form-group">
    <label for="Choferes">Choferes</label>
    <input type="text" class="form-control" name="names" value="{{$choferes->names}}" placeholder="Escribe el nombre" >
  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" value="{{$choferes->apellido}}" placeholder="Escribe el apellido" >

  </div>

    <div class="form-group">
    <label for="cedula">Cedula</label>
    <input type="text" class="form-control" name="cedula" value="{{$choferes->cedula}}" placeholder="Escribe la cedula">
  </div>



    <div class="form-group">
    <label for="tlf">Telefono</label>
    <input type="text" class="form-control" name="tlf" value="{{$choferes->tlf}}" placeholder="Escribe el tlf">
  </div>

<div class="form-group">


 <label form="url"> @lang('Fecha de llegada') </label>

    
     <?php 
    if(isset($choferes->created_at)){

        $fecha = $choferes->created_at->format('Y-m-d');
    }else{


        $fecha = date('Y-m-d');
    }

   ?>  

        
    <input class="form-control border-0 bg-light shadow-sm"

     
     type="date" 

     name="created_at"
     placeholder="AAAA-MM-DD"

     value="{{ old ('created_at', $fecha)}}" 

     >

</div>


    <button type="submit" class="btn btn-primary">Registrar</button>
<a href="{{ route('choferes.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>

</div>



</div>

</div>


@endsection
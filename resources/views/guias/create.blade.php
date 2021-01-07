@extends('layouts.app')

@section('content')
<div class="container">


	<div class="row">

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</div>


		<div class="col-sm-6">
<form action="{{route('guias.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="Guia">Guia</label>
    <input type="text" class="form-control" name="guia" placeholder="Escribe la guia" >
  </div>
  <div class="form-group">
    <label for="Nombre">Chofer</label>
    <select class = "form-control border-0 bg-light shadow-sm" name="chofer">
        
        <option>  </option>
        @foreach($chofere as $row)
        <option value="{{ $row->cedula}}">
        {{ $row->id}}. {{ $row->names}} {{ $row->apellido}} 
        - {{ $row->cedula}}
        </option>
        @endforeach
        
       
    </select>
</div>

    <div class="form-group">
    <label for="placa">Placa</label>
<select class="form-control border-0 bg-light shadow-sm" name="placa">
	<option></option>
	@foreach($chofere as $row)
<option value="{{$row->placa}}">
	{{$row->id}}. {{$row->names}}-{{$row->placa}}

</option>
@endforeach
</select>  

</div>
<div class="form-group">
    <label for="dueño">dueño</label>
<select class="form-control border-0 bg-light shadow-sm" name="dueño">
    <option></option>
    @foreach($dueño as $row)
<option value="{{$row->dueño}}"> {{$row->codigo}} - {{$row->dueño}}

</option>
@endforeach
</select>
    <div class="form-group">
    <label for="cede">Origen</label>
<select class="form-control border-0 bg-light shadow-sm" name="origen">
	<option></option>
	@foreach($cede as $row)
<option value="{{$row->codigo}}">
	{{$row->id}}. {{$row->names}}-{{$row->codigo}}

</option>
@endforeach
</select>  

</div>

<div class="form-group">
    <label for="cede">Destino</label>
<select class="form-control border-0 bg-light shadow-sm" name="destino">
	<option></option>
	@foreach($cede as $row)
<option value="{{$row->codigo}}">
	{{$row->id}}. {{$row->names}}-{{$row->codigo}}

</option>
@endforeach
</select>  

</div>

<div class="form-group">
    <label for="carga">carga</label>
<select class="form-control border-0 bg-light shadow-sm" name="carga">
	<option></option>
<option value="Materia Prima"> Materia Prima</option>
<option value="Producto"> Producto</option>
<option value="Otro"> Otro</option>

</select>  



</div>

<div class="form-group">


 <label form="url"> @lang('Fecha de Cargas') </label>

   


    <input class="form-control border-0 bg-light shadow-sm"

   <?php 
    if(isset($guia->created_at)){

        $fecha = $guia->created_at->format('y-m-d H:i:s');
    }else{


        $fecha= date('y-m-d H:i:s');
    }

   ?>  
     type="date" 

     name="created_at"
 >
    

</div>


<div class="form-group">


 <label form="url"> @lang('Fecha de Despacho') </label>

    
     <?php 
    if(isset($guia->updated_at)){

        $fecha = $guia->updated_at->format('y-m-d H:i:s');
    }else{


        $fechas=date('y-m-d H:i:s');
    }

   ?>  

        
    <input class="form-control border-0 bg-light shadow-sm"

     
     type="date" 

     name="updated_at"

           
     >
    

</div>

<label form="url"> Estado del Transporte: </label>
     <br>

<div class="form-group form-check">
     
     <input type="checkbox"  id="inlineCheckbox2" name="status" class="form-check-input "  value= "cerrado" 

        @if(old('status',$guia->status) == "cerrado")
             checked

        @endif
>
  

     <label class="custom-check-label" for="inlineCheckbox2">cerrado</label>

</div>

<div class="form-group form-check">



     <input type="checkbox"  id="inlineCheckbox1" name="status" class="form-check-input "  value= 'Transito' 
        @if(old('status',$guia->status) == "Transito")
        checked

        @endif

>
 <label class="custom-check-label" for="inlineCheckbox1">Transito</label>

</div>







    <button type="submit" class="btn btn-primary">Registrar</button>
<a href="{{ route('guias.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>

</div>

</div>

</div>


@endsection
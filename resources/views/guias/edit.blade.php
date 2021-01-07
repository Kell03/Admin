@extends('layouts.app')

@section('content')
<div class="container">
 
    	<div class="row">
		<div class="col-sm-6">

<form action="{{route('guias.update', $guia)}}" method="POST">
@method('PATCH')
  @csrf
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
    <label for="Guia">Guia</label>
    <input type="text" class="form-control" name="guia" value="{{ old('guia', $guia->guia) }}"  >
   
  </div>
  <div class="form-group">
    <label for="Nombre">Chofer</label>

      <select class = "form-control border-0 bg-light shadow-sm" name="chofer">
        
        <option value="{{old('chofer', $guia->chofer)}}"> {{old ('chofer',$guia->chofer)}} </option>
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
<select class="form-control border-0 bg-ligth shadow-sm" name="placa">

  <option value="{{old('placa', $guia->placa)}}"> {{old ('placa',$guia->placa)}}</option>
  @foreach($chofere as $row)
<option value="{{$row->placa}}">
  {{$row->id}}. {{$row->names}}-{{$row->placa}}

</option>
@endforeach


</select>
  

<label for="dueño">dueño</label>
<select class="form-control border-0 bg-light shadow-sm" name="dueño">
    <option value="{{old ('placa', $guia->dueño)}}"> {{old ('dueño',$guia->dueño)}} </option>
    @foreach($dueño as $row)
<option value="{{$row->dueño}}"> {{$row->codigo}} - {{$row->dueño}}

</option>
@endforeach
</select>

  </div>



   <div class="form-group">
    <label for="cede">Origen</label>
<select class="form-control border-0 bg-light shadow-sm" name="origen">
  <option value="{{old('origen', $guia->origen)}}"> {{old('origen', $guia->origen)}}</option>
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
  <option value="{{old('destino', $guia->destino)}}">{{old('destino', $guia->destino)}}</option>
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
  <option>{{old('carga', $guia->carga)}}</option>
<option value="Materia Prima"> Materia Prima</option>
<option value="Lleno"> Lleno</option>
<option value="Plancha"> Plancha</option>

</select>  



</div>
<div class="form-group">


 <label form="url"> @lang('Fecha de llegada') </label>

    
     <?php 
    if(isset($guia->created_at)){

        $fecha = $guia->created_at->format('Y-m-d');
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



<div class="form-group">


 <label form="url"> @lang('Fecha de Despacho') </label>

    
     <?php 
    if(isset($guia->updated_at)){

        $fecha = $guia->updated_at->format('Y-m-d');
    }else{


        $fecha = date('Y-m-d');
    }

   ?>  

        
    <input class="form-control border-0 bg-light shadow-sm"

     
     type="date" 

     name="updated_at"
     placeholder="AAAA-MM-DD"

     value="{{ old ('updated_at', $fecha)}}" 

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







    <button type="submit" class="btn btn-primary">Atualizar</button>
<a href="{{ route('guias.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>

</div>

</div>

</div>


@endsection
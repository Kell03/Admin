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
    <label for="nombre">Chofer </label>

   <input  type="text" class="form-control"  id="chofer" name="chofer"  value="{{ old('chofer', $guia->chofer) }}" placeholder="Ingresar nombre...">

     <?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link ,"gestra");
$result = mysqli_query($link ,"SELECT names, apellido FROM choferes");
$array = array();
if($result){

  while($row = mysqli_fetch_array($result)){

    $equipo = utf8_encode($row['names']." ".$row['apellido']);
    array_push($array, $equipo);
  

  }
}



?>
        

        <script type="text/javascript">
    

    $(document).ready(function(){

var items = <?= json_encode($array);
               ?>

$("#chofer").autocomplete({

  source: items
});
});
  </script>

</div>



    <div class="form-group">   
   

  <label for="placa">Placa</label>


  <select class = "form-control border-0 bg-light shadow-sm"  id="referencia" name="referencia" onchange="mostrar()">
        
        <option value="{{ old('placa', $guia->placa) }}">{{ old('placa', $guia->placa) }}  </option>
        @foreach($gandola as $row)
        <option value="{{ $row->propietario}}">
         {{ $row->placa}}  
        
        </option>
        @endforeach
        
       
    </select>      
  
<script type="text/javascript">
   


    $(document).ready(function(){
        
        $('#referencia').select2();


});

     function mostrar(){


var lista = document.getElementById("referencia");

// Obtener el índice de la opción que se ha seleccionado
var indiceSeleccionado = lista.selectedIndex;
// Con el índice y el array "options", obtener la opción seleccionada
var opcionSeleccionada = lista.options[indiceSeleccionado];
// Obtener el valor y el texto de la opción seleccionada
var textoSeleccionado = opcionSeleccionada.text;



var dueño = document.getElementById("referencia").value;

document.getElementById("dueño").value=dueño;


document.getElementById("placa").value=textoSeleccionado;



  }





  </script>
 
</div>
 <div class="form-group">
    
  <input type="text" class="form-control" style="display:none" name="placa" id="placa">


</div>





<div class="form-group">
    <label for="dueño">Dueño</label>

  <input type="text" class="form-control"value="{{ old('placa', $guia->dueño) }}"  name="dueño" id="dueño">
{{-- <select class="form-control border-0 bg-light shadow-sm" name="dueño">
   <option></option>
    @foreach($dueño as $row)
<option value="{{$row->dueño}}"> {{$row->nombre}} - {{$row->dueño}}

</option>
@endforeach
</select>

</div>--}}

</div>



   <div class="form-group">
    <label for="cede">Origen</label>
<input  type="text" class="form-control"  id="origen" name="origen"  value="{{ old('origen', $guia->origen) }}" placeholder="Ingresar nombre...">

     <?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link ,"gestra");
$result = mysqli_query($link ,"SELECT codigo FROM cedes");
$array = array();
if($result){

  while($row = mysqli_fetch_array($result)){

    $equipo = utf8_encode($row['codigo']);
    array_push($array, $equipo);
  

  }
}



?>
        

        <script type="text/javascript">
    

    $(document).ready(function(){

var items = <?= json_encode($array);
               ?>

$("#origen").autocomplete({

  source: items
});
});
  </script>

</div>

<div class="form-group">
    <label for="cede">Destino</label>
<input  type="text" class="form-control"  id="destino" name="destino"  value="{{ old('destino', $guia->destino) }}" placeholder="Ingresar nombre...">

     <?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link ,"gestra");
$result = mysqli_query($link ,"SELECT codigo FROM cedes");
$array = array();
if($result){

  while($row = mysqli_fetch_array($result)){

    $equipo = utf8_encode($row['codigo']);
    array_push($array, $equipo);
  

  }
}



?>
        

        <script type="text/javascript">
    

    $(document).ready(function(){

var items = <?= json_encode($array);
               ?>

$("#destino").autocomplete({

  source: items
});
});
  </script>
 

</div>

<div class="form-group">
    <label for="carga">Carga</label>
<select class="form-control border-0 bg-light shadow-sm" name="carga">
  <option>{{old('carga', $guia->carga)}}</option>
<option value="Materia Prima"> Materia Prima</option>
<option value="Producto"> Producto</option>
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

</div>

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




 
 <label form="url"> Estado de Guia: </label>
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
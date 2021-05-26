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
      <label for="placa">Nombre</label>

    <input  type="text" class="form-control"  id="chofer" name="chofer" placeholder="Ingresar nombre...">


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


  
  {{--<div class="form-group">
 
   <input class="form-control" type="hidden" id="id_chofer" name="id_chofer">


    <select class = "form-control border-0 bg-light shadow-sm" id="cedula" name="id_chofer">
        
        <option>  </option>
        @foreach($chofere as $row)
        <option value="{{ $row->cedula}}">
        {{ $row->id}}. {{ $row->names}} {{ $row->apellido}} 
        - {{ $row->cedula}}
        </option>
        @endforeach
        
       
    </select>
</div>--}}


    <div class="form-group">
    <label for="placa">Placa</label>


  <select class = "form-control border-0 bg-light shadow-sm"  id="referencia" name="referencia" onchange="mostrar()">
        
        <option>  </option>
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

  <input type="text" class="form-control"  name="dueño" id="dueño">
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
{{--<select class="form-control border-0 bg-light shadow-sm" name="origen">
	<option></option>
	@foreach($cede as $row)
<option value="{{$row->codigo}}">
	{{$row->id}}. {{$row->names}}-{{$row->codigo}}

</option>
@endforeach
</select>  --}}

<input type="text" class="form-control" name="origen" id="origen" placeholder="Ingresar Origen">
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
{{--<select class="form-control border-0 bg-light shadow-sm" name="destino">
	<option></option>
	@foreach($cede as $row)
<option value="{{$row->codigo}}">
	{{$row->id}}. {{$row->names}}-{{$row->codigo}}

</option>
@endforeach
</select>  --}}

<input type="text" class="form-control" name="destino" id="destino" placeholder="Ingresar Origen">
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
    <label for="carga">carga</label>
<select class="form-control border-0 bg-light shadow-sm" name="carga">
	<option></option>
<option value="Materia Prima"> Materia Prima</option>
<option value="Producto"> Producto</option>
<option value="Plancha"> Plancha</option>

</select>  



</div>

<div class="form-group">


 <label form="url"> @lang('Fecha de Cargas') </label>

   


    <input class="form-control border-0 bg-light shadow-sm"

   <?php 
    if(isset($guia->created_at)){

        $fecha = $guia->created_at->format('y');
    }else{


        $fecha= Date('y-m-d H:i:s');
    }

   ?>  
     type="Date" 

     name="created_at"
 >
    

</div>


<div class="form-group">


 <label form="url"> @lang('Fecha de Despacho') </label>

    
     <?php 
    if(isset($guia->updated_at)){

        $fecha = $guia->updated_at->format('y-m-d H:i:s');
    }else{


        $fecha = date('y-m-d H:i:s');
    }

   ?>  

        
    <input class="form-control border-0 bg-light shadow-sm"

     
     type="Date" 

     name="updated_at"
   
     
           
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







    <button type="submit" class="btn btn-primary">Registrar</button>
<a href="{{ route('guias.index')}}"><button type="button" class="btn btn-danger ">Cancelar</button></a>
</form>

</div>

</div>

</div>


@endsection
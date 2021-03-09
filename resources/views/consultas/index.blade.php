
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Busqueda de Guias por Fecha</h2>


    <nav class="navbar navbar-light float-right">
    <form class="form-inline">
        <div class="input-group input-group-sm"> 
    
          <label>Desde</label>
          <input class="form-control border-0 bg-light shadow-sm"
          <?php $fecha= date('y'); ?>  
          type="date" name="desde">

          <label>Hasta</label>
          <input class="form-control border-0 bg-light shadow-sm"
          <?php $fecha= date('y'); ?>  
          type="date" name="hasta" >

          <div class="input-group-append">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
          </div>

        </div>
    </form>
</nav>





<br>
</br>
<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
     
      <th scope="col">Guia</th>
      <th scope="col">Chofer</th>
      <th scope="col">Placa</th>
      <th scope="col">Origen</th>
      <th scope="col">Destino</th>
      <th scope="col">Carga</th>
      <th scope="col">Status</th>
      <th scope="col">Fecha Salida</th>
      <th scope="col">Fecha llegada</th>
    </tr>
  </thead>
  <tbody>
    <?php //$total_record=0 ; ?>
    <?PHP //VAR_DUMP($guias); ?>

  	@foreach($guias as $guia)
    <tr>

      <td>{{$guia->guia}}</td>
      <td>{{$guia->chofer}}</td>
       <td>{{$guia->placa}}</td>
       <td>{{$guia->origen}}</td>
      <td>{{$guia->destino}}</td>
       <td>{{$guia->carga}}</td>
       <td>{{$guia->status}}</td>
      <td>{{$guia->created_at}}</td>
       <td>{{$guia->updated_at}}</td>
       <?php //$total_record++ ?>

    </tr>
    

   @endforeach




  </tbody>
</table>

<h4>desde = {{$desde}}
</h4>

<h4>hasta = {{$hasta}}
</h4>

<h4>El numero de registros es = {{$total_record}}
</h4>

<nav class="navbar navbar-light float-right">
  <form class="form-inline">
    <div class="input-group input-group-sm"> 

<a href="{{ route('post.export')}}"><button type="button" class="btn btn-success btn-lg"> Exportar
                          <i class="fas fa-download"></i>

     
                                 </button></a>

    
    </div>
  </form>
</nav>

    </div>
    </form>
</nav> 

<nav class="navbar navbar-light float-right">
  <form class="form-inline">
    <div class="input-group input-group-sm"> 

<a href="{{ route('user.pdf',array('desde'=>$desde,'hasta'=>$hasta))}}"><button type="button" class="btn btn-outline-danger btn-lg"> Exportar
                          <i class="fas fa-download"></i>

     
                                 </button></a>

    
    </div>
  </form>
</nav>

<br>
{{ $guias->links() }}



</div>
</div>
@endsection
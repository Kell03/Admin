<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    .table{

      width: 100%;
      border:1px solid #999999;
    }


  </style>
</head>


<body>
  <table class="table">
    <thead>
      <tr>
            <th> Guia</th>  
            <th>Chofer</th> 
            <th>Placa</th>  
            <th>Dueño</th>
            <th>Origen</th>
            <th>Destino</th>  
            <th>Carga</th>
            <th>Status</th>
            <th>Fecha_sal</th>  
            <th>Fech_lleg</th>


       </tr>

    </thead>
    <tbody>
      <?php //var_dump($guias).exit; ?>
      @foreach($guias as $guia)
    <tr>

      <td>{{$guia->guia}}</td>
     {{--<td>{{$guia->names." ".$guia->apellido}}</td>--}}
      <td>{{$guia->chofer}}</td>
       <td>{{$guia->placa}}</td>
       <td>{{$guia->dueño}}</td>
       <td>{{$guia->origen}}</td>
      <td>{{$guia->destino}}</td>
       <td>{{$guia->carga}}</td>
       <td>{{$guia->status}}</td>
      <td>{{$guia->created_at}}</td>
       <td>{{$guia->updated_at}}</td>


      </tr>      

                @endforeach

    </tbody>
  </table>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.table{

			width: 100%;
			border:1px solid #999999;
		}
    .table th{

      background-color: gray;
      color:white;
    }

   h3{

    text-align: center;
   }



	</style>
</head>


<body><h3>Lista de Viajes desde {{$desde}} hasta {{$hasta}}</h3>

	<table border="1" class="table">
		<thead>
			<tr>
            <th> Guia</th>	
            <th>Chofer</th>	
            <th>Placa</th>	
            <th>Propietario</th>
            <th>Origen</th>
            <th>Destino</th>	
            <th>Carga</th>
            <th>Status</th>
            <th>Fecha_salilda</th>	
            <th>Fecha_llegada</th>


			 </tr>

		</thead>
		<tbody>
      <?php //var_dump($guias).exit; ?>
			@foreach($items as $guia)
    <tr>

      <td width="34%" align="center">{{$guia->guia}}</td>
     {{--<td>{{$guia->names." ".$guia->apellido}}</td>--}}
      <td width="34%" align="center">{{$guia->chofer}}</td>
       <td width="34%" align="center">{{$guia->placa}}</td>
       <td width="34%" align="center">{{$guia->dueño}}</td>
       <td width="34%" align="center">{{$guia->origen}}</td>
      <td width="34%" align="center">{{$guia->destino}}</td>
       <td width="34%" align="center">{{$guia->carga}}</td>
       <td width="34%" align="center">{{$guia->status}}</td>
      <td width="34%" align="center">{{$guia->created_at}}</td>
       <td width="34%" align="center">{{$guia->updated_at}}</td>
      </tr>      

                @endforeach

		</tbody>
	</table>

</body>
</html>
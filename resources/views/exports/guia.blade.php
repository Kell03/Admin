<table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">Id</th>      
      <th><h1>Guia </h1></th>
      <th>Chofer</th>
      <th>Placa</th>
      <th>Origen</th>
      <th>Destino</th>
      <th>Carga</th>
      <th>Status</th>
      <th>Fecha_sal</th>
      <th>Fech_lleg</th>
    </tr>
    </thead>
    <tbody>
    @foreach($guia as $guia)
 
       <tr>
      <td>{{$guia->id}}</td>
      <td>{{$guia->guia}}</td>
      <td>{{$guia->nombre}}</td>
      <td>{{$guia->placa}}</td>
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

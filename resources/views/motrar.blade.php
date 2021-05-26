<?php

 $ID_usuario = $_GET['ID_usuario'];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link ,"gestra");

$sql_u = mysqli_query( $link, "SELECT * FROM choferes WHERE names ='$ID_usuario'");

$row_u = mysqli_fetch_array($sql_u);

$nombre = $row_u['names'];
$apellido = $row_u['apellido'];
$edad = $row_u['cedula'];
?>
<h4> Datos del usuario para examinar </h4>
<table class="table table-condensed">
	<tr>
		<td> Nombre : </td>
		<td> <?php echo $nombre; ?></td>
	</tr>

	<tr>
		<td> Apellidos : </td>
		<td> <?php echo $apellido; ?></td>
	</tr>

	<tr>
		<td> Edad : </td>
		<td> <?php echo $edad; ?></td>
	</tr>
</table>
<?php

?>
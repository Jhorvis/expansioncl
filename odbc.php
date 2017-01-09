 <?php
require 'consulta.php';
$a = new Usuarios();
$datos = $a->notas();
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.8.0.min.js"></script>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">

  <link rel="stylesheet" href="font/css/font-awesome.css" type="text/css">

<link href="img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<script src="js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script src="js/functions.js"></script>

<script src="font/css/font-awesome.min"></script>
</head>
<?php
######################################
function microtime_float()
{
list($useg, $seg) = explode(" ", microtime());
return ((float)$useg + (float)$seg);
}

$tiempo_inicio = microtime_float();

// hago un bucle, simplemente para hacer un script que tarde un poco
for ($i=0; $i<3000000; $i++){
}

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;

echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio);
######################################





?>
<table width="100%"  height="150" id="example1" class="table table-bordered table-striped  table-hover">

<tr>
	<td> Fecha </td>
	<td> Periodo </td>
	<td> Carrera </td>
	<td> Materia </td>
	<td> Nota </td>
    </tr>
  
    <tr>

<?php

  
     

echo "</tr>";

?>

</table>
<?php



?>
</html>
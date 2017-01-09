
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");


require("clases/claseusuario.php");
$a= new Usuarios();


$datas=$a->Verificarproducto(@$_POST['codigo']);
 

 $RUT =  $_GET ['rt'];

$datos=$a->ConsultarClienterut(@$RUT);
foreach ($datos as $rr) {}


$idcliente=@$rr->idcliente;

$vendedor = @$rr->vendedor;

$datos2=$a->verificarproductosenventa(@$idcliente);

foreach ($datas as $as) {}

$valor = $_GET['rt'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Unir</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
 <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>

<script src="plugins/jquery/jQuery-2.1.4.min.js"></script>

<script src="bootstrap/js/bootstrap.js"></script>

<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">

<link href="img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<script src="js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script src="js/functions.js"></script>

</head>
<body>

 <style>  .scol{
    width: auto;
    height:512px;
    overflow: scroll;
}

</style>
<div id="wrapper">
 
  <div class="shell">
 
 
    <div class="container">
     


<?php  include ("template/header.php");?>

<?php 

if (@$_SESSION['lvl']==1){

?>

<nav id="navigation"  > <a href="#" class="nav-btn">HOME<span></span></a>
<ul  >
         <li ><a href="home.php">Inicio</a></li>
    
          
          <li class="active" ><a href="catalogo.php">Catalogo</a></li>
          <li><a href="moduloregistro.php"></a></li>
          <li><a href="notificaciones.php"></a></li>
          <li><a href="listado.php"></a></li>
       
          <li><a href="#"></a></li>
        </ul>
        <div class="cl">&nbsp;</div>
</nav>



<?php } ?>

  
<?php



require_once "clases/claseusuario.php";

$a= new Usuarios();



 foreach ($datas as $rs) {}

  $precioproducto = @$rs->precio_venta;

   $subtotal = $precioproducto * @$_POST['cantidad'];
  $descuento = (($subtotal * @$_POST['descuento'])/100);
  $iva = $subtotal * 0.19;
 $total = ($subtotal + $iva) - $descuento;

   if (isset($_POST['procesar'])){

    $codigo = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];
    $descuento = $_POST['descuento'];
    $idcliente = $rr->idcliente;
    

$a->insertafacturasventa($codigo,$cantidad,$descuento,$precioproducto,$subtotal,$iva,$total,$idcliente,$vendedor);
  $producto =  $a->Verificarproducto($codigo);

?>

<script language="JavaScript" type="text/javascript">

var pagina="facturacion.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
<?php } 


if (isset($_POST['facturar'])){

 ##################################

$suma=$a->subtotal(@$idcliente); 
foreach ($suma as $sm);
$subtotal=$sm->Subtotal; 


 $suma=$a->iva(@$idcliente); 
foreach ($suma as $sm);

$iva = $sm->iva;


$suma=$a->descuentos(@$idcliente); 
foreach ($suma as $sm);
$descuento=$sm->descuento;


$suma=$a->total(@$idcliente); 
foreach ($suma as $sm);
 $total = $sm->total; 

$tipofactura = 2;
  ###############################

  $a->agregarfacturacliente($idcliente,$vendedor,$subtotal,$descuento,$iva,
    $total);

  $search=$a->buscafactura($idcliente);
  foreach ($search as $bs){}
    $idfactura = @$bs->idfactura;

  $a->actualizarordenfactura($idfactura,$idcliente);
  $a->completarfactura($idfactura,$tipofactura);

?>
<script language="JavaScript" type="text/javascript">

var pagina="facturacion.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>

<?php } ?>

   

  <div class="main">
 

 


<div class="featured">

<h4><center><strong> Expansión Chile</strong> C.A. </center> </h4>
        
</div>





<h3  ><span style="margin-left:20px;"class=" glyphicon glyphicon-search"  ><b style="font-family:bold;"> INFORMACIÓN DEL CLIENTE</b></span></h3>   
 
<br>
<div class="featurede"   > 

<table width="100%"    class="table table-bordered">


<tr> 

<th width="33%">Nombre</th><th width="33%">vendedor</th><th rowspan="4"><th width="33%">RUT</th>

</th>

</tr>


<tr> 

<td><?php echo @$rr->nombre;?></td><td><?php echo @$rr->vendedor;?></td><td><?php echo @$rr->rut;?></td>

</tr>


<tr> 

<th>Telefono</th><th>Telefono 2</th><th>Correo</th> 


</tr>


<tr> 

<td><?php echo @$rr->telefono;?></td><td><?php echo @$rr->telefono2;?></td><td><?php echo @$rr->correo;?></td>

</tr>

 
</table><br>

<form method="POST" name="procesar" action="#">
<table>
  <tr>
<td><input type="text" class="form-control" name="codigo" placeholder="Código producto"></td>
<td><input type="text" class="form-control" name="cantidad" placeholder="Cantidad"></td>
<td><input type="text" class="form-control" name="descuento" Placeholder="Descuento"></td>

<td><button type="submit"  class="btn btn-primary" role='button' name='procesar' accesskey="Z"  /> Agregar </button>
<td><tr>
<table>
</form>

<br>
<br>

</h3>
 

<table class="table  table-bordered" id="factura">

  

<thead>
  
<th>Articulo</th>
<th>Descripción</th>
<th>Precio/U * Cantidad</th>
<th>Precio</th>
<td>Quitar</th>



</thead>



<tbody>

  <?php foreach ($datos2 as $rt){ ?>
<td><?php echo @$rt->codigoproducto;?></td>

<td><?php  echo @$rt->deshort;?></td>
<td><center><?php echo @$rt->precioprod ." X ". $rt->cantidadprod;?></center></td>

<td><?php echo @$rt->subtotal;?></td>
<td></td>

</tbody>


<?php } ?>


</table>

<br><br>
<form method="POST">

Sub-total: <b><?php $suma=$a->subtotal(@$idcliente); 
foreach ($suma as $sm);
$subtotal=$sm->Subtotal; 
echo $subtotal; ?>$</b>

<br>IVA(19%):<b> <?php $suma=$a->iva(@$idcliente); 
foreach ($suma as $sm);

$iva = $sm->iva;
echo $iva ?>$</b>

<br>Descuentos: <b><?php $suma=$a->descuentos(@$idcliente); 
foreach ($suma as $sm);
$descuento=$sm->descuento;
echo $descuento;  ?>%</b>

<br>Total: <b><?php $suma=$a->total(@$idcliente); 
foreach ($suma as $sm);
 $total = $sm->total; 
echo $total; ?>$</b>

<br>
  <button type="submit" class="btn btn-primary" name="facturar">Procesar Factura</button>








</form>
<br>
<div align="left">

<?php if ( @$rr->nombre){echo '
<div class="alert alert-success">
<a href="selecciona_cliente.php"><span class="glyphicon glyphicon-arrow-left"></span></a>

Consulta exitosa!

</div>';}else { ?>

<div class="alert alert-danger">

 <center> El Cliente no se encuentra Registrado!</center>

</div>

<a href="selecciona_cliente.php"><span class="glyphicon glyphicon-arrow-left" style="font-size:24px;"></span></a> 



<?php } ?>

</div>
<br><br>

</div>


</div>

<?php

?>

<?php  include ("template/footer.php");?>

    </div>
    <!-- end of container -->
  </div>
  <!-- end of shell -->
</div>
<!-- end of wrapper -->
</body>
</html>

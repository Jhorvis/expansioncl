
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");

require("clases/claseusuario.php");
$p= new Usuarios();
$id = $_GET ['id'];

$datos = $p->Verificarvendedor2();

$dato = $p->verificarclienteid($id);
foreach ($dato as $rv) {}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Expansión Chile</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
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
<body>
 
<div id="wrapper">
 
  <div class="shell">
 
 
    <div class="container">
     
<script type="text/javascript">

function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}

function txNombres() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  event.returnValue = false;
} 
</script>

<?php  include ("template/header.php");?>

<?php 

if (@$_SESSION['lvl']==1){

?>

<nav id="navigation"  > <a href="#" class="nav-btn">HOME<span></span></a>
<ul  >
          <li ><a href="home.php">Inicio</a></li>
          <li><a href="productos.php">Compras</a></li>
          <li class="active" ><a href="clientes.php">Clientes</a></li>
          <li><a href="notificaciones.php"></a></li>
          <li><a href="listado.php"></a></li>
       
          <li><a href="#"></a></li>
        </ul>
        <div class="cl">&nbsp;</div>
</nav>



<?php } ?>

  

  <div class="main">
 

 


<div class="featured">

<h4><center><strong> Expansión Chile</strong> C.A. </center> </h4>
        
</div>









<div class="featurede" align="center" > 

 
<table width="100%" border="0"      style="background-color:#fff;">
  <tr>
    <td colspan="3"><h3  ><span style="margin-left:20px;"  ><b style="font-family:bold;">REGISTRO DE CLIENTES</b></span></h3>   
</td>

  </tr>

</table>

 

<?php  

if ($_POST){
  













$p->updateclientes(
      $id,
      $_POST['nombrecliente'],
      $_POST['identificacion'],
      $_POST['direccion'],
      $_POST['tlf1'],
      $_POST['tlf2'],
      $_POST['email'],
      $_POST['vendedor']
      );

echo '   

 
   

 

<div class="modal-header">
<h4 class="modal-title"  >Confirmacion Exitosa!</h4>
</div>
<div class="modal-body">  
<p><h4 align="center">Informacion Almacenada Correctamente. <span class="glyphicon glyphicon-ok"></span></h4></p>
</div>

<div class="modal-footer">
<table width="100%"  height="340" >
<tr>

<td align="center"><a class="btn btn-primary" role="button"  href="home.php"  ><span class="glyphicon glyphicon-th"></span>
 Menu Principal</a></td>

 <td align="center"><a class="btn btn-primary" role="button"  href="clientes.php"  > Nuevo Registro <span class="glyphicon glyphicon-plus
">
</span></a></td>

</tr>
</table>
</div>

 
</div>
 
 
';

     
      }else {
?>    



 <div class="row">

<form method="POST" action=""> 
<br> 


<div class="col-sm-4">

<label class="col-xs-7">Nombre cliente</label>

<input name="nombrecliente" value="<?php echo $rv->nombre;  ?>" type="text" class="form-control" required>
 
</div>


<div class="col-sm-4">
<label class="col-xs-7">Identificación</label>

<input name="identificacion" value="<?php echo $rv->identificacion;  ?>" type="text" class="form-control" required>
</div>


<div class="col-sm-4">
<label class="col-xs-5">Dirección</label>

<input name="direccion" type="text" value="<?php echo $rv->direccion;  ?>" class="form-control" required>
</div>

<br><br>
<br><br>

<div class="col-sm-4">
<label class="col-xs-5">Teléfono 1</label>

<input name="tlf1" type="text" value="<?php echo $rv->telefono;  ?>" class="form-control" required>
</div>

<div class="col-sm-4">
<label class="col-xs-5">Teléfono 2</label>

<input name="tlf2" type="text" value="<?php echo $rv->telefono2;  ?>" class="form-control" required>
</div>

<div class="col-sm-4">
<label class="col-xs-5">Correo</label>

<input name="email" type="email" value="<?php echo $rv->correo;  ?>" class="form-control" required>
</div>

<div class="col-sm-4">
<label class="col-xs-7" >Vendedor</label>

<SELECT name="vendedor"  class="form-control" required>


<option value="">Seleccionar</option>
<?php foreach ($datos as $rr) { ?>
<option value="<?php echo $rr->codigo_vendedor;?>"><?php echo $rr->codigo_vendedor; ?></option>
<?php } ?>
</SELECT>

</div>



<div class="col-sm-4">
<br>
<button name="procesar" type="submit" class="btn btn-primary">Procesar Registro</button>

</div>

<br><br>
<br><br>
<br><br>




 </div>


 
</form>



 </div>






 
 



 
<table width="100%" border="0"      style="background-color:#fff;">
  <tr>

<td>
  
  <a href="clientes.php" style="margin-left:20px;"><span class="glyphicon glyphicon-arrow-left" style="font-size:24px;"></span></a> <br><br>
 
 
</td>


</tr>

</table>
 

   </div>





       


<?php } include ("template/footer.php");?>







    
    </div>
    <!-- end of container -->
  </div>
  <!-- end of shell -->
</div>
<!-- end of wrapper -->
</body>
</html>
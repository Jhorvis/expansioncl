
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");
  
require("clases/claseusuario.php");
$p= new Usuarios();
$dato = $p->verificarcategoria();
$datoss = $p->verificarempresa2();
$id = $_GET ['id'];

$datos = $p->verificarproductosid($id);
foreach ($datos as $rv) {}

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
    
          
          <li class="active" ><a href="productos.php">Catalogo</a></li>
          <li><a href="moduloregistro.php"></a></li>
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
    <td colspan="3"><h3  ><span style="margin-left:20px;"  ><b style="font-family:bold;">REGISTRO DE PRODUCTOS</b></span></h3>   
</td>

  </tr>

</table>

 

<?php  

if ($_POST){



$p->updateproductos(
      $id,
      $_POST['codigo'],
      $_POST['desclong'],
      $_POST['deshort'],
      $_POST['categoria'],
      $_POST['unidad'],
      $_POST['empresa_compra'],
      $_POST['precio_comp'],
      $_POST['precio_vent'],
      $_POST['porcentaje_vendedor'],
      $_POST['stock'],
      $_POST['minimo'],
      $_POST['ubicacion']
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

 <td align="center"><a class="btn btn-primary" role="button"  href="productos.php"  > Nuevo Registro <span class="glyphicon glyphicon-plus
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

<label class="col-xs-3">Código</label>

<input name="codigo" value="<?php echo $rv->codigo;  ?>" type="text" class="form-control" required>
 
</div>


<div class="col-sm-4">
<label class="col-xs-7">Descripción larga</label>

<input name="desclong" value="<?php echo $rv->deslong;  ?>" type="text" class="form-control" required>
</div>


<div class="col-sm-4">
<label class="col-xs-7">Descripción corta</label>

<input name="deshort" value="<?php echo $rv->deshort;  ?>"type="text" class="form-control" required>
</div>

<br><br>
<br><br>

<div class="col-sm-4">
<label class="col-xs-7" >Categoría</label>

<SELECT name="categoria"  class="form-control" required>


<option value="">Seleccionar</option>
<?php foreach ($dato as $rr) { ?>
<option value="<?php echo $rr->nombrecategoria;?>"><?php echo $rr->nombrecategoria; ?></option>
<?php } ?>
</SELECT>

</div>

<div class="col-sm-4">
<label class="col-xs-3">Unidad</label>

<input name="unidad" value="<?php echo $rv->unidad;  ?>"type="text" class="form-control" required>
</div>
<div class="col-sm-4">
<label class="col-xs-7" >Empresa compra</label>

<SELECT name="empresa_compra"  class="form-control" required>


<option value="">Seleccionar</option>
<?php foreach ($datoss as $rs) { ?>
<option value="<?php echo $rs->codigo_empresa;?>"><?php echo $rs->nombrempresa; ?></option>
<?php } ?>
</SELECT>

</div>
<br><br>
<br><br>

<div class="col-sm-4">
<label class="col-xs-7">Precio de compra</label>

<input name="precio_comp" value="<?php echo $rv->precio_compra;  ?>"  type="number" class="form-control" required>
</div>
<div class="col-sm-4">
<label class="col-xs-7" >Precio de venta</label>

<input name="precio_vent" value="<?php echo $rv->precio_venta;  ?>"  type="number" class="form-control" required>
</div>

<br><br>
<br><br>
<div class="col-sm-2">
<label  >% de venta</label>

<input name="porcentaje_vendedor" value="<?php echo $rv->porcentaje_venta;  ?>" onkeypress="ValidaSoloNumeros()"   type="text" class="form-control" maxlength="4" required>
</div>
<div class="col-sm-2">
<label >Stock bodega</label>

<input name="stock" value="<?php echo $rv->stockbodega;  ?>" onkeypress="ValidaSoloNumeros()"   type="number" class="form-control" maxlength="4" required>
</div>
<div class="col-sm-2">
<label >Stock mínimo</label>

<input name="minimo" value="<?php echo $rv->stockminimo;  ?>" onkeypress="ValidaSoloNumeros()"   type="number" class="form-control" maxlength="4" required>
</div>
<div class="col-sm-2">
<label >Ubicación</label>

<input name="ubicacion" value="<?php echo $rv->ubicacion;  ?>" placeholder="Letra" onkeypress="txNombres()"  type="text" class="form-control" maxlength="1" required>
</div>
<div class="col-sm-4">
<label >Imagen</label>

<input name="imagen" value="<?php echo $rv->imagen;  ?>"  type="file">
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
  
  <a href="catalogo.php" style="margin-left:20px;"><span class="glyphicon glyphicon-arrow-left" style="font-size:24px;"></span></a> <br><br>
 
 
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
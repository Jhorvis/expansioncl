
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");


require("clases/claseusuario.php");
$a= new Usuarios();

$id=$_GET['id'];
$datas=$a->verificarproductosid($id);

 


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

  

  <div class="main">
 

 


<div class="featured">

<h4><center><strong> Expansión Chile</strong> C.A. </center> </h4>
        
</div>




<div class="featurede" align="center" > 

<table width="100%" height="320" class="table table-bordered">
  
<tr valign="top">

<td width="22%">
  

 <?php include ("template/sidebar.php") ?>





</td>





<td width="78%">
  
<table border="0"  width="100%">

<tr>
  <td>
   

<form action="#" method="POST" class="laberd" >

<table width="100%" border="0">
  <tr>
    <td colspan="3"><h3  ><span style="margin-left:20px;"class="fa fa-list"  ><b style="font-family:bold;"> Detalles de productos</b></span></h3>   
</td>

  </tr>

</table>



<table width="100%"   height="100" >

<tr>
  <td>
  <?php
  foreach ( $datas as $rs) {
    ?>
<BR><BR><BR><BR>
  
    <b>Código:</b> <?php echo $rs->codigo;?><BR><BR>
   <b> Descripción:</b> <?php    echo $rs->deslong;?><BR><BR>
   <b> Categoria:</b> <?php echo $rs->categoria;?><BR><BR>
  <b> Unidad:</b> <?php  echo $rs->unidad;?><BR><BR>
  <b>Precio para la venta:</b> <?php  echo $rs->precio_venta;?><BR><BR>
  <b> Minimo Stock:</b> <?php  echo $rs->stockminimo;?><BR><BR>
  <b>Ubicación Bodega:</b> <?php   echo $rs->ubicacion;?>

   

  </td>


  <td>
    <center><img src="<?php echo $rs->imagen; }?>" WIDTH=178 HEIGHT=180></center>
  </td>
</tr>
  
</table>

<tr>

<input name="identidad" value="<?php echo $_SESSION['identidad'];?>" type="hidden">



 
</tr>








   </div>


</td>
</tr>

<tr style="background-color:#FFF;">

 













        
      </div>
       
      <div class="cl">&nbsp;</div>
    
   









    
    </div>
    <!-- end of container -->
  </div>
  <!-- end of shell -->





</div>
<!-- end of wrapper -->
</body>
</html>
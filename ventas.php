
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");


require("clases/claseusuario.php");
$a= new Usuarios();


$datas=$a->catalogo();
 


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



<?php 

if ($_SESSION['lvl']==1){

?>

<div class="featurede" align="center" > 

<table width="100%" height="320" class="table table-bordered">
  
<tr valign="top">







<td width="78%">
  
<table border="0"  width="100%">

<tr>
  <td>
   

<form action="#" method="POST" class="laberd" >

<table width="100%" border="0">
  <tr>
    <td colspan="3"><h3  ><span style="margin-left:20px;"class="fa fa-shopping-cart"  ><b style="font-family:bold;"> Compra de productos</b></span></h3>   
</td>

  </tr>

</table>



<table width="100%"   height="100" >
  

<tr>

<input name="identidad" value="<?php echo $_SESSION['identidad'];?>" type="hidden">


  
<td  width="15%">   <a href="selecciona_cliente.php" class="btn btn-primary"> Agregar venta <span class="fa fa-money
"></span></a></td> 
<td  width="15%">   <a href="clientes.php" class="btn btn-danger"> Agregar Cliente <span class="fa fa-users
"></span></a></td> 
</tr>




</form>



   </div>


</td>
</tr>

<tr style="background-color:#FFF;">

 
<?php 

if ($_SESSION['lvl']==1){

?>

 

 <table width="100%"  height="150" id="example1" class="table table-bordered table-striped">
                    
 
 
<thead>
<tr>
<th>Fecha de venta</th>
<th>Fecha ingreso</th>
<th>Fecha despacho</th>
<th><center>Código de venta</center></th>
<th><center>Código cliente</center></th>
<th><center>Nombre cliente</center></th>
<th><center>N° de factura</center></th>
<th><center>Valor total</center></th>
<th><center>Detalles</center></th>

</tr>
</thead>


<tbody>



 <?php foreach ($datas as $rs) {
  

  ?>

 
<tr>
  

<td>    <center> <?php  echo "24/12/1989"; ?> </center>   </td>
<td>    <center> <?php  echo "24/12/1989"; ?> </center>   </td>
<td>    <center> <?php  echo "24/12/1989"; ?> </center>   </td>
<td>    <?php echo "CBV-1h1"; ?>   </td>

<td>    <center><?php echo "en proceso";  ?> </center>  </td>
<td>    <center><?php echo "en proceso";  ?> </center>  </td>

<td>   <center> <?php echo "en proceso"; ?> </center>  </td>
<td>   <center> <?php echo "en proceso"; ?> </center>  </td>
<td> <center><?php 


echo "<a href='detalles_producto.php?id=$rs->idproducto';\"><img src='img/1463032850_View_Details.png' width='32' height='27'</a>";
  
?></center></td>


</tr>





 
  



 <?php  } ?>
</tbody>


</table>


</tr>

</table>



</td>



</tr>

</table>

   </div>

 <script src="plugins/jquery/jQuery-2.1.4.min.js"></script>
     <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>


    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
   <?php } ?>



 



<?php 

if ($_SESSION['lvl']==2){

?>

<div class="featurede" align="center" > 

<table width="100%" height="320" class="table table-bordered">
  
<tr valign="top">

<td width="22%">
  

 <?php include ("template/sidebar.php") ?>

 



</td>





<td width="78%">
  
<img src="delivery-man.png" width="100%" >



  
</td>



</tr>

</table>

   </div>

   <?php }  ?>













        
      </div>
       
      <div class="cl">&nbsp;</div>
    
   


<?php  } include ("template/footer.php");?>







    
    </div>
    <!-- end of container -->
  </div>
  <!-- end of shell -->





</div>
<!-- end of wrapper -->
</body>
</html>
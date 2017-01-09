
<?php  
###################### Llamamiento de la clase principal ####################

require("clases/claseusuario.php");
$p= new Usuarios();


###################### Registro de Categorias de productos ####################
if (isset($_POST['procesar'])){
  




$p->insertacategoria(
      $_POST['categoria'],
      $_POST['descripcion']
     
      );
header("location:../home.php#ajax/agregar_categoria.php"); 

 exit(); }

 ###################### Registro de productos ####################

if (isset($_POST['procesarproducto'])){

 if ($p->Verificarproducto($_POST['codigo'])){
  
?>
 
<script language="JavaScript" type="text/javascript">
alert("ERROR! Este producto ya se encuentra registrado");

var pagina="../home.php#ajax/agregar_producto.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
 
<?php 
  exit();
  
  }





$codigo=$_POST['codigo'];
$imagen=$_FILES['imagen']["name"];
$ruta=$_FILES['imagen']['tmp_name'];
$destino="../imagenes/".$codigo.$imagen;
$nombreimagen="imagenes/".$codigo.$imagen;
copy($ruta,$destino);


$p->insentaproductos(
      $_POST['codigo'],
      $_POST['desclong'],
      $_POST['deshort'],
      $_POST['categoria'],
      $_POST['unidad'],
      $_POST['precio_vent'],
       $_POST['minimo'],
      $_POST['ubicacion'],
      $nombreimagen
      );

header("location:../home.php#ajax/agregar_producto.php"); 
   exit();       
}

     

 ###################### Registro de Clientes ####################


if (isset($_POST['procesarcliente'])){

 if ($p->Verificarcliente($_POST['rut'])){
  
?>
 
<script language="JavaScript" type="text/javascript">
alert("ERROR! Este cliente ya esta registrado");

var pagina="../home.php#ajax/agregar_cliente.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
 
    
<?php 
  exit();
  
  }


$p->insertaclientes(
      $_POST['codigocliente'],
      $_POST['nombrecliente'],
      $_POST['nombrempresa'],
      $_POST['ciudad'],
      $_POST['comuna'],
      $_POST['direccion'],
       $_POST['rut'],
      $_POST['giro'],
      $_POST['tlf1'],
      $_POST['tlf2'],
      $_POST['email'],
       $_POST['observacion'],
      $_POST['vendedor']
      );

header("location:../home.php#ajax/agregar_cliente.php"); 
   exit();       
}
    

 ###################### Registro de Vendedores ####################

if (isset($_POST['procesarvendedor'])){

 if ($p->Verificarcliente($_POST['rut'])){
  
?>
 
<script language="JavaScript" type="text/javascript">
alert("ERROR! Este vendedor ya esta registrado bajo el nombre de");

var pagina="../home.php#ajax/agregar_vendedor.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
 
    
<?php 
  exit();
  
  }


$p->insertavendedor(
      $_POST['apellidos'],
      $_POST['nombres'],
      $_POST['ncuenta'],
      $_POST['ciudad'],
      $_POST['comuna'],
      $_POST['direccion'],
       $_POST['rut'],
      $_POST['zonaven'],
      $_POST['tlf1'],
      $_POST['tlf2'],
      $_POST['email'],
       $_POST['codigovendedor'],
       $_POST['observacion']
      );

header("location:../home.php#ajax/agregar_vendedor.php"); 
   exit();       
}
############################ Busca proveedor para facturar ################

if (isset($_POST['buscaproveedor'])){



$valor = $_POST['buscar'];


?>




<script language="JavaScript" type="text/javascript">

var pagina="../home.php#ajax/agregar_compra.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
<?php
exit();

}
############################ Busca Cliente para facturar ################

if (isset($_POST['buscacliente'])){



$valor = $_POST['buscar'];


?>




<script language="JavaScript" type="text/javascript">

var pagina="../home.php#ajax/agregar_venta.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
<?php
exit();

}


####################### Agregar producto factura ##############

 

   

if (isset($_POST['agregarproducto'])){

    $valor = $_POST['rut'];
    $codigo = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];
    $idproveedor = $_POST['idproveedor'];
    $total = $_POST['cantidad'] * $_POST['precio'];
    $precioproducto = $_POST['precio'];
$p->insertafacturascompra($codigo,$cantidad,$precioproducto,$total,$idproveedor);
 $producto =  $p->Verificarproducto($codigo);

?>

<script language="JavaScript" type="text/javascript">

var pagina="../home.php#ajax/agregar_compra.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
<?php 
exit();
} 

####################### Agregar producto factura 2 ##############

 

   

if (isset($_POST['agregarproducto2'])){





    $valor = $_POST['rut'];
    $codigo = $_POST['codigo']; 
    $producto =  $p->Verificarproducto($codigo);
     foreach ($producto as $pp) {}
    $cantidad = $_POST['cantidad'];
    $idcliente = $_POST['idcliente'];
    $precioproducto = $pp->precio_venta;

    $subtotal = $precioproducto * @$cantidad;
    $descuento = (($subtotal * @$_POST['descuento'])/100);
    $iva = $subtotal * 0.19;
    $total = ($subtotal + $iva) - @$_POST['descuento'];
    $idproducto =  $pp->idproducto;


///////////////////////////////////////////////////////
$datos2=$p->verificarproductosenventacan(@$idcliente,$idproducto);
foreach ($datos2 as $rts){}
@$cantiactual=$rts->cantidadprod;

$buscastock = $p->sumaingresos($idproducto);

foreach ($buscastock as $key);
  $in= $key->ingreso;

$buscastock = $p->sumaegresos($idproducto);
foreach ($buscastock as $key);
  $out= $key->egreso;

   $existencia = $in - $out - $cantiactual;

   if ($existencia < $cantidad){


  ?>
 
<script language="JavaScript" type="text/javascript">
alert("ERROR! La cantidad indicada para el producto solicitado no esta disponible, Existencia actual: <?php echo $existencia?>");

var pagina="../home.php#ajax/agregar_venta.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
 
    
<?php 
  exit();
  
  }
/////////////////////////////////////////////////////////////////////

$p->insertafacturasventa($codigo,$cantidad,$_POST['descuento'],$precioproducto, $subtotal,
  $iva,$total,$idcliente);


?>

<script language="JavaScript" type="text/javascript">

var pagina="../home.php#ajax/agregar_venta.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
<?php 
exit();
} 
####################### Facturar ###############################




if (isset($_POST['facturar'])){


$idproveedor = $_POST['idproveedor'];


  

$nfactura=$_POST['nfactura'];
$imagen=$_FILES['imagen']["name"];
$ruta=$_FILES['imagen']['tmp_name'];
$destino="../imagenesfactura/".$nfactura.$imagen;
$nombreimagen="imagenesfactura/".$nfactura.$imagen;
copy($ruta,$destino);


$suma=$p->totalcompra(@$idproveedor); 
foreach ($suma as $sm);
 $total = $sm->total; 

$tipofactura = 1;


   
  $p->agregarfacturacompra(
    $idproveedor,
    $total,
    $_POST['nfactura'],
    $nombreimagen,
    $_POST['fecha']

    );


  $search=$p->buscafacturacompra($idproveedor);
  foreach ($search as $bs){}
    $idfactura = @$bs->idfactura;

  $p->actualizarordenfacturacompra($idfactura,$idproveedor);
  $p->completarfactura($idfactura,$tipofactura);


$datos2=$p->verificarproductosencompracompleta(@$idproveedor,$idfactura);
foreach ($datos2 as $pr){ 
$idproducto = $pr->idproducto;
$cantidad = $pr->cantidadprod;




  $p->actualizarstock(
       $idproducto,
       $idfactura,
       $cantidad

    );


$buscastock = $p->sumaingresos($idproducto);
foreach ($buscastock as $key);
  $in= $key->ingreso;

$buscastock = $p->sumaegresos($idproducto);
foreach ($buscastock as $key);
  $out= $key->egreso;

  $existencia = $in - $out;
  
if ($existencia==0){
          $p->actualizaproductos(0,$idproducto);
} else {
  if ($existencia<=$pr->stockminimo){
   $p->actualizaproductos(1,$idproducto);
  }else {
     if ($existencia>$pr->stockminimo){
      $p->actualizaproductos(2,$idproducto);

     }
  }
}

}

?>

<script language="JavaScript" type="text/javascript">

var pagina="../home.php#ajax/selecciona_proveedor.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
<?php 
exit();
} 

####################### Facturar venta ###############################




if (isset($_POST['facturarv'])){


  $buscastock = $p->sumaingresos($idproducto);

foreach ($buscastock as $key);
  $in= $key->ingreso;

$buscastock = $p->sumaegresos($idproducto);
foreach ($buscastock as $key);
  $out= $key->egreso;




$idcliente = $_POST['idcliente'];

$dat=$p->Verificarclienteid($idcliente);
foreach ($dat as $de) {}
$vendedor = $de->vendedor;

$suma=$p->subtotal(@$idcliente); 
foreach ($suma as $sm);
$subtotal=$sm->Subtotal; 


 $suma=$p->iva(@$idcliente); 
foreach ($suma as $sm);

$iva = $sm->iva;


$suma=$p->descuentos(@$idcliente); 
foreach ($suma as $sm);
$descuento=$sm->descuento;


$suma=$p->total(@$idcliente); 
foreach ($suma as $sm);
 $total = $sm->total; 


$tipofactura = 2;

   




  $p->agregarfacturacliente(
    $idcliente,
    $vendedor,
    $subtotal,
    $descuento,
    $iva,
    $total);


  $search=$p->buscafactura($idcliente);
  foreach ($search as $bs){}
    $idfactura = @$bs->idfactura;

  $p->actualizarordenfactura($idfactura,$idcliente);
  $p->completarfactura($idfactura,$tipofactura);


$datos2=$p->verificarproductosenventacompleta(@$idcliente,$idfactura);
foreach ($datos2 as $pr){ 
$idproducto = $pr->idproducto;
$cantidad = $pr->cantidadprod;





  $p->actualizarstockventa(
       $idproducto,
       $idfactura,
       $cantidad

    );


$buscastock = $p->sumaingresos($idproducto);

foreach ($buscastock as $key);
  $in= $key->ingreso;

$buscastock = $p->sumaegresos($idproducto);
foreach ($buscastock as $key);
  $out= $key->egreso;

  $existencia = $in - $out;
  
if ($existencia==0){
          $p->actualizaproductos(0,$idproducto);
} else {
  if ($existencia<=$pr->stockminimo){
   $p->actualizaproductos(1,$idproducto);
  }else {
     if ($existencia>$pr->stockminimo){
      $p->actualizaproductos(2,$idproducto);

     }
  }
}

}

?>

<script language="JavaScript" type="text/javascript">

var pagina="../home.php#ajax/selecciona_cliente.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
<?php 
exit();
} 



############################## Registro de proveedores #############################################


if (isset($_POST['procesarproveedor'])){

 if ($p->Verificarproveedor($_POST['rut'])){
  
?>
 
<script language="JavaScript" type="text/javascript">
alert("ERROR! Este cliente ya esta registrado");

var pagina="../home.php#ajax/agregar_cliente.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
 
    
<?php 
  exit();
  
  }

$p->insertaproveedor(
      $_POST['codigoem'],
      $_POST['nombrempre'],
      $_POST['tlf1'],
      $_POST['tlf2'],
      $_POST['rut'],
      $_POST['ciudad'],
      $_POST['comuna'],
      $_POST['direccion'],
      $_POST['giro'],
      $_POST['email'], 
      $_POST['nombreencargado'],
      $_POST['condicion'],
      $_POST['observacion']
    
     
      );

header("location:../home.php#ajax/agregar_vendedor.php"); 
   exit();       
}
    
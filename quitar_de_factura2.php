<?php

$valor = $_GET['value'];
$idproveedor = $_GET['id'];

require("clases/claseusuario.php");
$a= new Usuarios();

$a->quitarproducto($idproveedor);

?>


<script language="JavaScript" type="text/javascript">

var pagina="../home.php#ajax/agregar_venta.php?rt=<?php echo $valor;?>"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
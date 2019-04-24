
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");
  
require("clases/claseusuario.php");
$a= new Usuarios();


que wea mirai cochino culiao


$RUT =  $_GET ['rt'];
$datos=$a->Verificarcliente(@$RUT);
foreach ($datos as $rr) {}
$idcliente = $rr->idcliente;
$datos2=$a->verificarproductosenventa(@$idcliente);

if ($RUT == 0){
  ?>
  <script language="JavaScript" type="text/javascript">
alert("Debe seleccionar un proveedor!");
var pagina="../expansion2/home.php#ajax/selecciona_proveedor.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);

</script>
  <?php

}

?>

     
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

<div id="dashboard-header" class="row">
  <div class="col-xs-12 col-sm-4 col-md-5">
    <h3>Compra de productos</h3>
  </div>
  <div class="clearfix visible-xs"></div>
  
</div>
 






<div class="row">
  <div id="breadcrumb" class="col-xs-12">
    <a href="#" class="show-sidebar">
      <i class="fa fa-bars"></i>
    </a>
    <ol class="breadcrumb pull-left">
      <li><a href="index.html">Dashboard</a></li>
      <li><a href="#">Ventas</a></li>
      <li><a href="#">Registrar ventas</a></li>
    </ol>
    <div id="social" class="pull-right">
      <a href="#"><i class="fa fa-google-plus"></i></a>
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-youtube"></i></a>
    </div>
  </div>
</div>




     
      
<div class="row">
  <div class="col-xs-12 col-sm-8">
    <div class="box">
      <div class="box-header">
        <div class="box-name">
          <i class="fa fa-search"></i>
          <span>Facturación</span>
        </div>
        <div class="box-icons">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
          <a class="expand-link">
            <i class="fa fa-expand"></i>
          </a>
          <a class="close-link">
            <i class="fa fa-times"></i>
          </a>
        </div>
        <div class="no-move"></div>
      </div>
      <div class="box-content">
        <form id="defaultForm" method="post" action="ajax/validar_categorias.php" class="form-horizontal" enctype="multipart/form-data">
          <fieldset>
            <legend>Venta de productos</legend>
            <div class="form-group">
              
              <div class="col-sm-4">
                <input type="text" class="form-control" name="codigo" placeholder="Código del producto" />
              </div>
         
          <input type="hidden" name="idcliente" value="<?php echo $rr->idcliente ?>">
             <input type="hidden" name="rut" value="<?php echo $rr->rut ?>">

              <div class="col-sm-4">
                <input type="number" class="form-control" name="cantidad" placeholder="Cantidad de productos" />
              </div>
               <div class="col-sm-4">
                <input type="number" class="form-control" name="descuento" placeholder="Descuento en %" />
              </div>
                
                
            </div>
             
             <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
              <button type="submit" class="btn btn-primary"  name="agregarproducto2">Agregar</button>
            </div>
          </div>
<table class="table  table-bordered" id="factura">

  

<thead>
  
<th>Articulo</th>
<th>Descripción</th>
<th>Precio/U * Cantidad</th>
<th>Precio</th>
<td>Quitar</th>



</thead>



<tbody>

  <?php foreach ($datos2 as $rts){ ?>
<td><?php echo @$rts->codigoproducto;?></td>

<td><?php  echo @$rts->deshort;?></td>
<td><center><?php echo @$rts->precioprod ." X ". $rts->cantidadprod;?></center></td>

<td><?php echo @$rts->total;?></td>
<td><?php 


echo "<center><a href='ajax/quitar_de_factura2.php?id=$rts->idorden&value=$RUT';\"><img src='img/deleted.png' width='32' height='27'</a></center>";
 
?></td>

</tbody>


<?php } ?>


</table>
          </fieldset>
        
         
        </form>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4">
    <div class="box">
      <div class="box-header">
        <div class="box-name">
          <i class="fa fa-search"></i>
          <span>Datos del cliente</span>
        </div>
        <div class="box-icons">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
          <a class="expand-link">
            <i class="fa fa-expand"></i>
          </a>
          <a class="close-link">
            <i class="fa fa-times"></i>
          </a>
        </div>
        <div class="no-move"></div>
      </div>
      <div class="box-content">
        
 <table width="100%"  height="150" id="example1" class="table table-bordered table-striped">
                    
 

 

  

Nombre: <b><?php echo $rr->nombre; ?> </b>
<br>
   
RUT: <b><?php echo $rr->rut; ?></b> 
 <br>
  Teléfono: <b><?php echo $rr->telefono; ?> </b>

</table>

      </div>
    </div>
  </div>










 <div class="col-xs-12 col-sm-4">
    <div class="box">
      <div class="box-header">
        <div class="box-name">
          <i class="fa fa-search"></i>
          <span>Factura</span>
        </div>
        <div class="box-icons">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
          <a class="expand-link">
            <i class="fa fa-expand"></i>
          </a>
          <a class="close-link">
            <i class="fa fa-times"></i>
          </a>
        </div>
        <div class="no-move"></div>
      </div>
      <div class="box-content">

<form method="POST" action="ajax/validar_categorias.php">

      <input type="hidden" name="idcliente" value="<?php echo $rr->idcliente ?>">
             <input type="hidden" name="rut" value="<?php echo $rr->rut ?>">

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
<br>
  <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
              <button type="submit" class="btn btn-success"  name="facturarv">Facturar</button>
            </div>
          </div><br><br>

          </form>
 </div>
  </div>

</div>


<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
  $('#s2_with_tag').select2({placeholder: "Select OS"});
  $('#s2_country').select2();
}
// Run timepicker
function DemoTimePicker(){
  $('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
  // Create Wysiwig editor for textare
  TinyMCEStart('#wysiwig_simple', null);
  TinyMCEStart('#wysiwig_full', 'extreme');
  // Add slider for change test input length
  FormLayoutExampleInputLength($( ".slider-style" ));
  // Initialize datepicker
  $('#input_date').datepicker({setDate: new Date()});
  // Load Timepicker plugin
  LoadTimePickerScript(DemoTimePicker);
  // Add tooltip to form-controls
  $('.form-control').tooltip();
  LoadSelect2Script(DemoSelect2);
  // Load example of form validation
  LoadBootstrapValidatorScript(DemoFormValidator);
  // Add drag-n-drop feature to boxes
  WinMove();
});
</script>





<div class="modal fade  " id="myModal14" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div  class="modal-dialog"  >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Completar Factura.</h5>
     <br />
     
   <div class="scol"> 

<table width="100%" .scrol  class="table table-hover" >
  </table>



<form method="POST" action="ajax/validar_categorias.php" enctype="multipart/form-data"> 
<br> 



<div class="col-sm-4">
<label class="col-xs-8">N° Factura</label>

<input name="nfactura" type="text" class="form-control" required>
</div>

<div class="col-sm-4">
<label class="col-sm-2 control-label">Date</label>
         
              <input name="fecha" type="text" id="input_date" class="form-control" placeholder="Date">
              <span class="fa fa-calendar txt-danger form-control-feedback"></span>

   </div>

<div class="col-sm-2">
<label class="col-xs-">imagen</label>

<input name="imagen"  type="file" accept="image/*" />
</div>
<br><br>
<br><br>

<div class="col-sm-4">
<br>
<button name="facturar" type="submit" class="btn btn-success">Procesar Factura</button>
 <input type="hidden" name="idproveedor" value="<?php echo $rr->idproveedor ?>">
</div>

<br><br>
<br><br>
<br><br>




 </div>


 
</form>


  </div>
   
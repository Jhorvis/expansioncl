
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");
  
require("clases/claseusuario.php");
$p= new Usuarios();
$dato = $p->verificarcategoria();
$datos = $p->verificarempresa2();
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
    <h3>Registro de productos</h3>
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
      <li><a href="#">Productos</a></li>
      <li><a href="#">Agregar Producto</a></li>
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
          <span>Categorías</span>
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
            <legend>Registro de productos</legend>
            <div class="form-group">
              <label class="col-sm-3 control-label">codigo interno</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="codigo" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Descripción larga</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="desclong" />
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-3 control-label">Descripción corta</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="deshort" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Unidad</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="unidad" />
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-3 control-label">Precio venta</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="precio_vent" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Minímo de venta</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="minimo" />
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-3 control-label">Ubicación</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="ubicacion" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Imagen</label>
              <div class="col-sm-5">
                <input name="imagen"  type="file" accept="image/*" />
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Seleccionar categoría</label>
              <div class="col-sm-5">


            <SELECT name="categoria"  class="form-control" required>


               <option value="">Seleccionar</option>
               <?php foreach ($dato as $rr) { ?>
                <option value="<?php echo $rr->nombrecategoria;?>"><?php echo $rr->nombrecategoria; ?></option>
                <?php } ?>
               </SELECT>



               
              </div>
            </div>
            
            
            
          </fieldset>
        
          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
              <button type="submit" class="btn btn-primary"  name="procesarproducto">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4">
    <div class="box">
      <div class="box-header">
        <div class="box-name">
          <i class="fa fa-search"></i>
          <span>Último Producto registrado</span>
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
        
 <table width="100%"  height="150" id="example1" class="table table-bordered">
                    
 
 

 <?php


$p= new Usuarios();


$datas=$p->verificarproducto2();
 
  foreach ($datas as $rs) {}
  

  ?>

 

  

Descripción: <b><?php echo $rs->deslong; ?> </b>
<br>
   
Categoría: <b><?php echo $rs->categoria; ?></b> 
 <br>
  Código: <b><?php echo $rs->codigo; ?> </b>



 </table>


      </div>
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

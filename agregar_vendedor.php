
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");

require("clases/claseusuario.php");
$p= new Usuarios();

$datos = $p->Verificarvendedor2();
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
      <li><a href="#">Vendedores</a></li>
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
  <div class="col-xs-12 col-sm-12">
    <div class="box">
      <div class="box-header">
        <div class="box-name">
          <i class="fa fa-search"></i>
          <span>Vendedores</span>
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
            <legend>Registrar una nuevo Vendedor</legend>
            <div class="form-group">
              <label class="col-sm-2 control-label">Apellidos</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="apellidos"
                placeholder="Apellidos" data-toggle="tooltip" data-placement="bottom" title="Primer y Segundo Apellido" onkeypress="txNombres()"  />
              </div>
           
              <label class="col-sm-2 control-label">Nombres</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="nombres"
                placeholder="Nombres" data-toggle="tooltip" data-placement="bottom" title="Primer y segundo nombre" onkeypress="txNombres()" />
              </div>
            </div> 
          

             <div class="form-group">
              <label class="col-sm-2 control-label">N° Cuenta</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="ncuenta"
                onkeypress="ValidaSoloNumeros()"
                placeholder="N° de Cuenta Bancaria" data-toggle="tooltip" data-placement="bottom" title="Ingresa el numero de cuenta bancaria del vendedor"  />
              </div>
           
            
              <label class="col-sm-2 control-label">Ciudad</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="ciudad" 
                placeholder="Ciudad" data-toggle="tooltip" data-placement="bottom" title="Elige una ciudad" onkeypress="txNombres()" />
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Comuna</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="comuna"
                placeholder="Comuna" data-toggle="tooltip" data-placement="bottom" title="Especifica la comuna" onkeypress="txNombres()"  />
              </div>
            
            
              <label class="col-sm-2 control-label">RUT</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="rut" 
                placeholder="RUT" data-toggle="tooltip" data-placement="bottom" title="Indica el RUT" onkeypress="ValidaSoloNumeros()" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Dirección</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="direccion" id="wysiwig_simple" placeholder="Ingresa la dirección: CALLE/AVENIDA/N° CASA o APTO"></textarea>
            </div>
          </div>
             
            <div class="form-group">
              <label class="col-sm-2 control-label">Zona de venta</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="zonaven" 
                placeholder="Zona de venta" data-toggle="tooltip" data-placement="bottom" title="Ingresa la zona de venta para este vendedor"  />
              </div>
            
            
           
              <label class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="tlf1" 
                placeholder="Telefono" data-toggle="tooltip" data-placement="bottom" title="Ingrese numero teléfonico" onkeypress="ValidaSoloNumeros()" />
              </div>
            </div>
          

            <div class="form-group">
              <label class="col-sm-2 control-label">Telefono 2</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="tlf2" 

                placeholder="Telefono alternativo" data-toggle="tooltip" data-placement="bottom" title="Ingrese numero teléfonico alternativo" onkeypress="ValidaSoloNumeros()"/>
              </div>
           
            
           
              <label class="col-sm-2 control-label">Correo Eléctronico</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" name="email" 

                placeholder="Correo Eléctronico" data-toggle="tooltip" data-placement="bottom" title="Indique un correo electronico siguiendo el formato ejemplo@expancion.cl"/>
              </div>
            </div>
            
           


            
             <div class="form-group">
              <label class="col-sm-2 control-label">Código vendedor</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" name="codigovendedor" 

                placeholder="Código vendedor" data-toggle="tooltip" data-placement="bottom" title="Asigne un código único a este vendedor"/>
           
              </div>
            </div>

               <div class="form-group">
              <label class="col-sm-2 control-label">Observación</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="observacion" rows="5" id="wysiwig_simple" placeholder="Observaciones" data-toggle="tooltip" data-placement="bottom" title="Describa una observación en caso de haberla, no mayor a 100 carácteres"></textarea>
            </div>
          </div>
        
            
            
            
          </fieldset>
        
          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
              <button type="submit" class="btn btn-primary"  name="procesarvendedor">Enviar</button>
            </div>
          </div>
        </form>
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

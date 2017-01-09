
<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");


require("clases/claseusuario.php");
$a= new Usuarios();
$a->limpiaordenfactura();
$datos = $a->verificarempresa2();

?>




<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#">Compras</a></li>
			<li><a href="#">Registro de compras</a></li>
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
	<div class="col-xs-14 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Registro de compras</span>
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
				<form id="defaultForm" method="post" action="ajax/validar_categorias.php" class="form-horizontal">
					<fieldset>
						<legend>Selecciona un proveedor</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label">Proveedor</label>
							<div class="col-sm-5">
								<select class="populate placeholder" name="buscar" id="s2_country">
									<option value="">-- Selecciona un proveedor --</option>
									<?php foreach ($datos as $rr) { ?>
                                   <option value="<?php echo $rr->RUT_empresa;?>"><?php echo $rr->nombrempresa; ?></option>
                                  <?php } ?>
									
								</select>
							</div>
						</div>
						
					</fieldset>
				
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary"  name="buscaproveedor">Continuar</button>
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

 
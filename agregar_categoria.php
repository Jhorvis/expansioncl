



<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#">Productos</a></li>
			<li><a href="#">Categorías</a></li>
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
				<form id="defaultForm" method="post" action="ajax/validar_categorias.php" class="form-horizontal">
					<fieldset>
						<legend>Registrar una nueva categoría</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nombre categoría</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="categoria" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Descripción</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="descripcion" />
							</div>
						</div>
						
						
					</fieldset>
				
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary"  name="procesar">Submit</button>
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
					<span>Lista de categorias creadas</span>
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
				
 <table width="100%"  height="150" id="example1" class="table table-bordered table-striped  table-hover">
                    
 
 
<thead>
<tr>
 
<th><center>Nombre</center></th>

<th>Descripción</th>



</tr>
</thead>


<tbody>



 <?php

require("clases/claseusuario.php");
$a= new Usuarios();


$datas=$a->verificarcategoria();
 
  foreach ($datas as $rs) {
  

  ?>

 
<tr>
  

<td>    <center> <?php echo $rs->nombrecategoria; ?> </center>   </td>

<td>    <?php echo $rs->descripcion; ?>   </td>


 
  



 <?php  } ?>
</tbody>


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

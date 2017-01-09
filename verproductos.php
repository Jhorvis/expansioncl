<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");
require("clases/claseusuario.php");
$a= new Usuarios();
$datos = $a->catalogo();

function monedaformato($valor) {
return '$' . number_format($valor, 2);
} 

?>
<!DOCTYPE html>
<html lang="en">
 
  <body>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-shopping-cart"></i>
					<span>Listado de compras realizadas</span>
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
			<div class="box-content no-padding table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
					<thead>
						<tr>
							<th><label><input type="text" name="search_rate" value="Nombre" class="search_init" /></label></th>
							<th><label><input type="text" name="search_name" value="Codigo" class="search_init" /></label></th>
							<th><label><input type="text" name="search_votes" value="Stock Bodega" class="search_init" /></label></th>
							<th><label><input type="text" name="search_homepage" value="Cantidad" class="search_init" /></label></th>
							<th><label><input type="text" name="search_rate" value="Mínimo venta" class="search_init" /></label></th>
							<th><label><input type="text" name="search_name" value="Categoría" class="search_init" /></label></th>
							<th><label><input type="text" name="search_votes" value="Valor" class="search_init" /></label></th>
							<th><label><input type="text" name="search_homepage" value="Detalles" class="search_init" /></label></th>
						</tr>
					</thead>
					<tbody><?php foreach ($datos as $rs) {
					   
						echo "<tr>";
							
							echo "<td>
							<img class='img-rounded' src=".$rs->imagen
							."> ".$rs->deshort."</td>";
							echo"<td>".$rs->codigo."</td>";
							echo"<td>".$rs->disponibilidad."</td>";
							echo"<td>".$rs->disponibilidad."</td>";
							echo"<td>".$rs->stockminimo."</td>";
							echo"<td>".$rs->categoria."</td>";
							echo"<td>". monedaformato($rs->precio_venta). "</td>";
							echo"<td> <a href='#'> Detalles </a> </td>";
						echo "</tr>";}
							?>
						</tbody>
					<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Código</th>
							<th>Stock en bodega</th>
							<th>Cantidad</th>
							<th>Minimo venta</th>
							<th>Categoría</th>
							<th>Valor venta</th>
							<th>Ver</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>

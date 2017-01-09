<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");
require("clases/claseusuario.php");
$a= new Usuarios();
$datos = $a->verventas();

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
							<th><label><input type="text" name="search_rate" value="Buscar por fecha" class="search_init" /></label></th>
							<th><label><input type="text" name="search_name" value="N° Factura" class="search_init" /></label></th>
							<th><label><input type="text" name="search_votes" value="Cliente" class="search_init" /></label></th>
							<th><label><input type="text" name="search_homepage" value="Monto" class="search_init" /></label></th>
						
						</tr>
					</thead>
					<tbody><?php foreach ($datos as $rs) {
					   
						echo "<tr>";
							
							echo "<td>".$rs->fecha."</td>";
							echo"<td>".$rs->numfactura."</td>";
							echo"<td>".$rs->idcliente."</td>";
							echo"<td>". monedaformato($rs->total). "</td>";
						
						echo "</tr>";}
							?>
						</tbody>
					<tfoot>
						<tr>
							<th>Fecha</th>
							<th>N° Factura</th>
							<th>Cliente</th>
							<th>Monto Factura</th>
							
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

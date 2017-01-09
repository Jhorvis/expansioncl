
<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");

require("clases/claseusuario.php");
$a= new Usuarios();
$a->limpiaordenfactura();
$datos = $a->catalogo();



?>



<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#">Catálogo</a></li>
			<li><a href="#">Catálogo de productos y precios</a></li>
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
	<div class="col-xs-12"> 
		<div class="control-group">
			<label class="control-label">Showing 1 - 12 of 100 results</label>
			<div class="pull-right">
				<select id="product-select">
					<option>Latest</option>
					<option>Most Popular</option>
					<option>Product name A - Z</option>
					<option>Product name Z - A</option>
					<option>Best Ratings</option>
					<option>Lowest Price</option>
					<option>Highest Price</option>
				</select>
			</div>
		</div>
	</div>
</div>
<div class="row">	
	<?php foreach ($datos as $pr) {
					
				?>

	<div class="col-xs-12 col-sm-3">

		<div class="box box-pricing">
			<div class="thumbnail">
				<center><img src="<?php echo $pr->imagen; ?>" WIDTH=178 HEIGHT=180 alt="">  
				<div class="caption">
					<h5 class="text-center"><?php echo $pr->deshort; ?></h5>
					<p><?php echo $pr->precio_venta." $"; ?></p>

<?php
                     if ($pr->disponibilidad == 0){
           ?>          
					<p><font color="red"><b>Agotado</b></font></p>
<?php
                   }elseif ($pr->disponibilidad==1) {?>
                  <p><font color="orange"><b>Disponible</b></font></p>
             <?php      } else {?>

             <p><font color="green"><b>Disponible</b></font></p>
         <?php    }

?>

					<a href="#" class="btn btn-primary">Mas detalles</a> 
				</div>
			</div>
		</div>
	
	</div>

	<?php } ?>
	</div>	
<div class="row">		
	<div class="col-xs-12">
		<ul class="pagination pagination-lg">
			<li><a href="#">«</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">10</a></li>
			<li><a href="#">»</a></li>
		</ul>
	</div>
</div>
<script type="text/javascript">
// Run Select2 on element
function Select2Test(){
	$("#product-select").select2();
}
$(document).ready(function() {
	// Load script of Select2 and run this
	LoadSelect2Script(Select2Test);
	WinMove();
});
</script>

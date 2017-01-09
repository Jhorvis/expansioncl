
<?php @session_start();

if (!isset($_SESSION['lvl'])) header("location:index.php");

require("clases/claseusuario.php");
$a= new Usuarios();

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
			<li><a href="#">Catálogo Simple</a></li>
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
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-picture-o"></i>
					<span>Imagenes de productos</span>
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
				<?php foreach ($datos as $pr) {
					
				?>
				<a class="fancybox" rel="gallery1" href="<?php echo $pr->imagen; ?>" title="<?php echo $pr->deslong; ?>">
					<img src="<?php echo $pr->imagen; ?>" alt="" 
					WIDTH=178 HEIGHT=180/>
				</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<script>
// Create fancybox2 gallery
function DemoGallery(){
	$('.fancybox').fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
}
$(document).ready(function() {
	// Load Fancybox2 and make gallery in callback
	LoadFancyboxScript(DemoGallery);
});
</script>

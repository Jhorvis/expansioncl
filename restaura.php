
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Expansión Chile</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="css/style_v2.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

<?php 

require("clases/claseusuario.php");
$a = new Usuarios();

if (isset($_POST['aceptar']))
{

$datos = $a->buscacorreo($_POST['email']);

if (!$datos){
echo "error! el correo electrónico no se encuentra registrado en nuestra base de datos!";
exit();
}

foreach ($datos as $key);
$password = $key->password;
$email = $key->correo;
$nombre = $key->nombre;
$apellido = $key->apellido;
$nombrecompleto = $nombre." ".$apellido;



require_once('mail/class.phpmailer.php');
include ('mail/class.smtp.php');
$correo = new PHPMailer(); 

$correo->IsSMTP();
 
$correo->SMTPAuth = true;
 
$correo->SMTPSecure = 'tls';
 
$correo->Host = "smtp.gmail.com";
 
$correo->Port = 587;
 
$correo->Username   = "soporte.expansioncl@gmail.com";
 
$correo->Password   = "006767osjj";

$correo->SetFrom("soporte@expancionchile.esy.es", "Expansión Chile");

$correo->AddReplyTo("soporte@expancionchile.esy.es","Expansión Chile");

$correo->AddAddress($email, $nombrecompleto);
 
$correo->Subject = "Recuperación de contraseña";

$correo->MsgHTML("Estimado Sr(a).<strong>".$nombrecompleto."</strong>,
				su contraseña es <strong>".$password."</strong>. Por favor conservela en un lugar seguro.");
 
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  ?>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		
			<div class="box">
				<div class="box-content">
					
					<div class="text-center">
						<h3 class="page-header">Mensaje Enviado</h3>
					</div>
					 <div class="form-group">
					<p>Se envió un mensaje a su dirección de correo electrónico con su contraseña</p>
					<center><a href="index.php" class="btn btn-success">Inicio</a></center>
					
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<?php
}








} else {

?>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		
			<div class="box">
				<div class="box-content">
					<form action='#' method='POST' > 
					<div class="text-center">
						<h3 class="page-header">Recuperacion de contraseña</h3>
					</div>
					 
					<div class="form-group">
						<label class="control-label">Introduzca su correo electrónico</label>
						<input type="email" class="form-control" name="email" />
					</div>
				
					<div class="text-center">
						<button type="submit" class="btn btn-primary" name="aceptar">aceptar</button>
					</div>
					<form>
					
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>

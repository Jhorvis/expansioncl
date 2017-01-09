<?php

require("clases/claseusuario.php");
  
$a=new Usuarios();

@$user = $_POST['user'];


if (isset($_POST['registrar']))
{

$contrasena = $_POST['password'];
$confirmacion = $_POST['confirmacion'];
$email = $_POST['email'];
$telefono = $_POST['tlf'];
$user = $_POST['id'];
$buscarut = $a->buscarut($user);
foreach ($buscarut as $key);
$rut = $key->RUT;

$buscaemail = $a->buscaemail($email);


if ($contrasena != $confirmacion){
	?>
	<form id="form1" name="form1" action="#" method="post"> 
    <input type="hidden" name="user" value="<?php echo $user; ?>">
   
    </form>
   
<script type="text/javascript">
	alert("ERROR! Las contraseñas no coinciden");
	 document.form1.submit();
</script>
	<?php
	exit();
	
}

if ($contrasena == 12345 || $contrasena == 123456 || $contrasena == 1234567 || $contrasena == 12345678 || $contrasena == 123456789 || $contrasena == 00000 || $contrasena == 000000 || $contrasena == 0000000 || $contrasena == 00000000 || $contrasena == 000000000
	|| $contrasena == 0000000000){
?>
	<form id="form1" name="form1" action="#" method="post"> 
    <input type="hidden" name="user" value="<?php echo $user; ?>">
   
    </form>
   
<script type="text/javascript">
	alert("ERROR! por motivos de seguridad su contraseña no puede ser numeros consecutivos ni contener solamente ceros (0)");
	 document.form1.submit();
</script>
	<?php
exit();
}


if ($contrasena == $rut) {

?>
	<form id="form1" name="form1" action="#" method="post"> 
    <input type="hidden" name="user" value="<?php echo $user; ?>">
   
    </form>
   
<script type="text/javascript">
	alert("ERROR! por motivos de seguridad su contraseña no puede ser igual al numero de su RUT!");
	 document.form1.submit();
</script>
	<?php
exit();
}

if ($buscaemail){

		?>
	
	<form id="form1" name="form1" action="#" method="post"> 
    <input type="hidden" name="user" value="<?php echo $user; ?>">
   
    </form>

<script type="text/javascript">
	alert("ERROR! El correo ya se encuentr registrado!");
	 document.form1.submit();
</script>
	<?php
	exit();
}

$a->actualizauser(
	$contrasena,
	$email,
	$telefono,
	$user
	);
?><script type="text/javascript">
	alert("Usuario registrado con exito!");

var pagina="index.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
	<?php
}

 ?>
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
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		
			<div class="box">
				<div class="box-content">
					<form action='#' method='POST' > 
					<div class="text-center">
						<h3 class="page-header">Expansión Chile - Registro</h3>
					</div>
					 <input type="hidden" name="id" value="<?php echo $user; ?>">
					<div class="form-group">
						<label class="control-label">Ingrese una nueva contraseña</label>
						<input type="password" class="form-control" name="password" 
						minlength="5" maxlength="10"  data-toggle="tooltip" data-placement="bottom" title="Debe ingresar un minimo de 5 caracteres" />

					</div>
					<div class="form-group">
						<label class="control-label">Confirme contraseña</label>
						<input type="password" class="form-control" name="confirmacion" />
					</div>
						<div class="form-group">
						<label class="control-label">Correo Electrónico</label>
						<input type="email" class="form-control" name="email" />
					</div>
				
						<div class="form-group">
						<label class="control-label">Número Teléfonico</label>
						<input type="text" class="form-control" name="tlf" />
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
					</div>
					<form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

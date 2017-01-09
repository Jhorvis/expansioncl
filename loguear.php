

<?php
 require_once "clases/claseauditoria.php";
$au = new auditoria();
if (isset($_POST['loguear']))
{
 
require("clases/claseusuario.php");
  
$c=new Usuarios();
$datos = $c->buscausernew($_POST['user']);

foreach ($datos as $key);
$nombreequipo =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
$password = @$key->password;
$EsActivo = @$key->EsActivo;
$LgUsuariosId = @$key->LgUsuariosId;

$dato=$c->loguear($_POST['user'],$_POST['pass']);


  if ($EsActivo == 2){
    ?> 

<script type="text/javascript">
  alert("Su usuario se encuentra INACTIVO, contacte a el administrador");
var pagina="index.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
    <?php
exit();
  }


  if (!$password && $EsActivo == 1){
    ?>
    <form id="form1" name="form1" action="register.php" method="post"> 
    <input type="hidden" name="user" value="<?php echo $LgUsuariosId; ?>">
   
    </form>
    <script type="text/javascript">
  
     document.form1.submit();
   
    </script>
    <?php
exit();
  }

if (!$datos){
      ?> 

<script type="text/javascript">
  alert("El usuario  no se encuentra registrado en la base de datos");
var pagina="index.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
    <?php
    exit();
}

if ($dato){


session_start();

$_SESSION['NBUsuario']=$dato[0]->NBUsuario;
$_SESSION['LgCargoId']=$dato[0]->LgCargoId;
$_SESSION['LgUsuariosId']=$dato[0]->LgUsuariosId;
$_SESSION['nombre']=$dato[0]->nombre;
$_SESSION['apellido']=$dato[0]->apellido;
$_SESSION['RUT']=$dato[0]->RUT;
$_SESSION['ip'] =  $_SERVER['REMOTE_ADDR'];
$_SESSION['nombreequipo'] = $nombreequipo;

//-----------------------------------------------
$variable4 = $au->buscaerrores($LgUsuariosId);
   foreach ($variable4 as $v4);
   $id4 = @$v4->AiniciaId;

$variable2 = $au->buscainicio($LgUsuariosId);
foreach ($variable2 as $v2);
echo $id2 = @$v2->AiniciaId;
echo  $fecha = @$v2->Fecha;
echo $hora = @$v2->Hora;
echo $NBEquipo = @$v2->NBEQUIPO;
echo $ip = @$v2->ip;

$variable3 = $au->buscainicio2($LgUsuariosId);
foreach ($variable3 as $v3);
$id3 = @$v3->AiniciaId;


if ($variable2){
$au->eliminainicionormal($id2);
$au->eliminainicionormal2($id3);

$au->inicionnormal2($fecha,$hora,$LgUsuariosId, $ip, $NBEquipo);
$au->inicionnormal($LgUsuariosId, $_SERVER['REMOTE_ADDR'], $nombreequipo);
$au->intentoerroneo3($id4);
} else {
//-----------------------------------------------
 $au->inicionnormal($LgUsuariosId, $_SERVER['REMOTE_ADDR'], $nombreequipo);
 $au->intentoerroneo3($id4);
}


header("location:home.php");

	
}else{
	  ?> 

<script type="text/javascript">
  alert("Contraseña incorrecta");
var pagina="index.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
    <?php

    $variable = $au->buscaerrores($LgUsuariosId);
   foreach ($variable as $v);
   $numerror = @$v->erroneo;
   $id = @$v->AiniciaId;

   if($numerror>2){
    $au->intentoerroneo3($id);
    $c->inactivausuario($LgUsuariosId);
    echo $LgUsuariosId;
    ?> 

<script type="text/javascript">
  alert("AVISO! Su usuario ha sido bloqueado por intentos erroneos de conexion, por favor contacte al adminstrador");
var pagina="index.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 0.01);
</script>
    <?php
    exit();

   }

if($variable){
  
   
    $intentos = $numerror + 1;

 $au->intentoerroneo2($id,$intentos);



} else {
    $intentos2 = 1;
    $au->intentoerroneo($LgUsuariosId, $_SERVER['REMOTE_ADDR'], $nombreequipo, $intentos2);
}
}
}
	?>

 <?php

$servidor="hfsql_odbc";
$basedatos="prueba";
$usuario="admin";
$clave="";

class bd{
    
public $conn;  

public function conectar(){

require('clases/config.php');


// Conectarse a la base de datos utilizando un DSN de ODBC
$dap = new PDO ( "odbc:{HFSQL}=",$servidor,$usuario,array(PDO::ATTR_PERSISTENT => true));
              
 if(!$dap) { 
 die( "No se pudo conectar con la Base de Datos. Por favor, notificarlo al Administrador."); 
    } 

              }

    
public function desconectar(){
    
$this->conn=null;
    
    }

}
?>
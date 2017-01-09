<?php


require_once("conectar.php");
class Usuarios extends bd{

    function __construct(){
        $this->conectar();        
        }    
      function __destruct(){
        $this->desconectar();        
        }




 public function notas(){
$sentencia=$this->conn->prepare
("SELECT CeEstudiInsc.FeInscrip as Fecha_Inscripcion, CeEstudiInsc.CePerioLectID , AAEntidad.NUCEDULA as Cedula,  cecarrera.NbCarrera as Carrera, CeEstudiInsc.NuLapso , cemateria.CoMateria, cemateria.CaUnidCred,  cemateria.NbMateria, CeSeccMaterPerio.CeSeccionID,  SUM(CeMaterEvalDet.VaNota) as Nota
From cecarrera , cecarrerapens, cemateria, CeCarreraPensMater, CeSeccMaterPerio, CeMaterEval,  CeMaterEvalDet , AAEntidad, CeEstudiInsc, ceestudi
Where
 Cecarrera.CeCarreraID = cecarrerapens.CeCarreraID and
cecarrerapens.CeCarreraPensID = CeCarreraPensMater.CeCarreraPensID and  
CeCarreraPensMater.CeMateriaID = cemateria.CeMateriaID and   
CeCarreraPensMater.CeCarreraPensMaterID = CeSeccMaterPerio.CeCarreraPensMaterID and  
CeSeccMaterPerio.CeSeccMaterPerioID = CeMaterEval.CeSeccMaterPerioID and 
CeSeccMaterPerio.CePerioLectID = CeEstudiInsc.CePerioLectID and 
CeMaterEval.CeMaterEvaID = CeMaterEvalDet.CeMaterEvaID and 
CeMaterEvalDet.CeEstudiID = ceestudi.CeEstudiID and  ceestudi.AAEntidadID = AAEntidad.AAEntidadID and AAEntidad.NUCEDULA = 14921774 and 
CeMaterEvalDet.CeEstudiID = CeEstudiInsc.CeEstudiID and  CeEstudiInsc.AASUCURSID = 1
GROUP by

 AAEntidad.NUCEDULA,  cecarrera.NbCarrera, CeEstudiInsc.FeInscrip, cemateria.CoMateria, cemateria.CaUnidCred,  cemateria.NbMateria, CeSeccMaterPerio.CeSeccionID, CeEstudiInsc.NuLapso, CeEstudiInsc.CePerioLectID 
order by 
CeEstudiInsc.NuLapso ASC"); 


$sentencia->execute();
    return($sentencia->fetchAll(PDO::FETCH_OBJ));   
    
}
}
?>
<?php
require_once('../../programacion/conexion/DataBase.php');
  class Empleados{
  	
  public function agregar_evento($nom_evento,$nom_fecha,$nom_hora,$nom_descripcion,$idempleados){
  	$bd = new Database();
    $consulta="INSERT INTO eventoss (nombre,fecha,hora,descripcion,empleados_id_empleado) values ('$nom_evento','$nom_fecha','$nom_hora','$nom_descripcion','$idempleados');";
		$bd->ejecutar($consulta);
    echo "datos correctos";
   
	//	Header("Location: ../../index.php");
	
       
  }


  }

?>
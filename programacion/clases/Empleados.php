<?php
require_once('../../programacion/conexion/DataBase.php');
  class Empleados{
  	
  public function agregar_evento($nombre,$fecha,$hora,$descripcion,$idempleado){
  	$bd = new Database();
    $consulta="INSERT INTO eventoss (nombre,fecha,hora,descripcion,empleados_id_empleado) values ('$nombre','$fecha','$hora','$descripcion','$idempleado');";
		$bd->ejecutar($consulta);
    echo "lalal";
   
	//	Header("Location: ../../index.php");
	
       
  }


  }

?>
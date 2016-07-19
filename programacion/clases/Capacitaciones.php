<?php
require_once('../../programacion/conexion/DataBase.php');

 class Capacitaciones{

public function agregar_capacitacion($nombre,$fecha,$hora,$lugar,$emplead){
  	    $bd = new Database();
        $consulta="INSERT INTO capacitaciones (tipo_capacitacion,fecha,hora,lugar,empleados_id_empleado) values ('$nombre','$fecha','$hora','$lugar','$emplead');";
		$bd->ejecutar($consulta);
        Header("Location: ../../index.php");
       
  }
  public function Mostrar_datos(){
  	
  }
 }
?>
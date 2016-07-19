<?php
require_once ('../../programacion/clases/Empleados.php');
//if(isset($_POST["submit"])){
	$lugar=$_POST['evtnombre'];
//$apep=//mysql_real_escape_string(strip_tags($_POST['apellidop']));  //$_POST['apellidop'];
  $fecha=$_POST['evtfecha'];
  //$amm=mysql_real_escape_string(strip_tags($_POST['apellidomater']));  //$_POST['apellidom'];
  $hora=$_POST['evthora'];
  //$corr= mysql_real_escape_string(strip_tags($_POST['email'])); //$_POST['correo'];
 $descripcion=$_POST['evtdescripcion'];
  //$userr= mysql_real_escape_string(strip_tags($_POST['user_name'])); //$_POST['user_name'];
  $idempleados=$_POST['evtidempleado'];
 
 $Empleados=new Empleados();
 $Empleados->agregar_evento($lugar,$fecha,$hora,$descripcion,$idempleados);
 echo "pruebakakka";
//}

?>
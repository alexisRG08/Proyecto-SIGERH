<?php
require_once ('../../programacion/clases/Administrador.php');

if($_REQUEST['valor']=='agregar-empleado')
{
  
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$direccion = $_REQUEST['direccion'];
	$telefono = $_REQUEST['telefono'];
	$edad = $_REQUEST['edad'];
	$fechaNacimiento = $_REQUEST['fechaNacimiento'];
	$rfcEmpleado = $_REQUEST['rfcEmpleado'];
	$estudio = $_REQUEST['estudio'];
	$numeroEmpleado = $_REQUEST['numeroEmpleado'];
	$puesto = $_REQUEST['puesto'];
	$departamento = $_REQUEST['departamento'];
	$curp = $_REQUEST['curp'];
	$numsocial = $_REQUEST['numsocial'];
	if($nombre==null){
     echo "<font color='red'>**Ingresa el nombre del empleado <font>";
	}else{

	$admin=new Administrador();
	$admin->agregar_empleado($nombre,$apellido,$direccion,$telefono,$edad,$fechaNacimiento,$rfcEmpleado,$estudio,$numeroEmpleado,$puesto,$departamento,$curp,$numsocial);
	}	
}
?>
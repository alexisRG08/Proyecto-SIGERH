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
	$puesto = $_REQUEST['puesto'];
	$departamento = $_REQUEST['departamento'];
	$curp = $_REQUEST['curp'];
	$numsocial = $_REQUEST['numsocial'];
	$estado= $_REQUEST['estado'];
	if($nombre==null){
     echo "<font color='red'>**Ingresa el nombre del empleado <font>";
	}else{

	$admin=new Administrador();
	$admin->agregar_empleado($nombre,$apellido,$direccion,$telefono,$edad,$fechaNacimiento,$rfcEmpleado,$estudio,$puesto,$departamento,$curp,$numsocial,$estado);
	}	
}

if($_REQUEST['valor']=="actualizar-empleado")
{
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$direccion = $_REQUEST['direccion'];
	$telefono = $_REQUEST['telefono'];
	$edad = $_REQUEST['edad'];
	$fechaNacimiento = $_REQUEST['fechaNacimiento'];
	$rfcEmpleado = $_REQUEST['rfcEmpleado'];
	$estudio = $_REQUEST['estudio'];
	$curp = $_REQUEST['curp'];
	$numsocial = $_REQUEST['numsocial'];
	$estado= $_REQUEST['estado'];
	
	$admin=new Administrador();
   	$admin->actualizar_empleado($nombre,$apellido,$direccion,$telefono,$edad,$fechaNacimiento,$rfcEmpleado,$estudio,$curp,$numsocial,$estado);
}

if($_REQUEST['valor']=="Refrescar")
{
   $admin=new Administrador();
   $admin->mostrar_empleados();
}

if($_REQUEST['valor']=="eliminar-empleado")
{
	$id_empleado=$_REQUEST['id_empleado'];
   	$admin=new Administrador();
   	$admin->eliminar_empleado($id_empleado);
}

?>
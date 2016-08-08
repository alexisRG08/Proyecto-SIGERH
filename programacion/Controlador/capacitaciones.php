<?php
require_once ('../../programacion/clases/Administrador.php');

	if ($_REQUEST['valor']=='agregar-capacitaciones') 
	{
		$nombrec = $_REQUEST['nombrec'];
		$fechac = $_REQUEST['fechac'];
		$horac = $_REQUEST['horac'];
		$lugarc = $_REQUEST['lugarc'];
		$descripcionc = $_REQUEST['descripcionc'];

		$admin=new Administrador();
		$admin-> agregar_capacitaciones($nombrec,$fechac,$horac,$lugarc,$descripcionc);
		$admin-> mostrar_capacitaciones();
		echo "Datos ingresados correctamente";
	}

	if ($_REQUEST['valor']=='actualizar-capacitacion') 
	{
		$idcapacitacion=$_REQUEST['idcapacitacion'];
		$nombrec = $_REQUEST['nombrec'];
		$fechac = $_REQUEST['fechac'];
		$horac = $_REQUEST['horac'];
		$lugarc = $_REQUEST['lugarc'];
		$descripcionc = $_REQUEST['descripcionc'];
		
		$admin=new Administrador();
		$admin-> actualizar_capacitaciones($idcapacitacion,$nombrec,$fechac,$horac,$lugarc,$descripcionc);
		$admin-> mostrar_capacitaciones();
		echo "Datos actualizados correctamente";
	}

	if($_REQUEST['valor']=='eliminar-capacitacion')
	{
		$idcapacitacion=$_REQUEST['idcapacitacion'];

   		$admin=new Administrador();
   		$admin->eliminar_capacitaciones($idcapacitacion);
   		$admin->mostrar_capacitaciones();
   		echo "Datos eliminados correctamente"; 
	} 

	if ($_REQUEST['valor']=='buscar-capacitacion') 
	{
		$buscarCapacitacion = $_REQUEST['buscarCapacitacion'];

		$admin=new Administrador();
		$admin-> buscar_capacitaciones($buscarCapacitacion);
	}

	if($_REQUEST['valor']=='refrescar')
	{
   		$admin=new Administrador();
   		$admin-> mostrar_capacitaciones();
	}

?>
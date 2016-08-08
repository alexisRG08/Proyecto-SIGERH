<?php
require_once ('../../programacion/clases/Administrador.php');

	if ($_REQUEST['valor']=='agregar-capacitaciones') 
	{
		$nombrec = $_REQUEST['nombrec'];
		$fechac = $_REQUEST['fechac'];
		$horac = $_REQUEST['horac'];
		$lugarc = $_REQUEST['lugarc'];
		$descripcionc = $_REQUEST['descripcionc'];
		echo "Datos ingresados correctamente";
		$admin=new Administrador();
		$admin-> agregar_capacitaciones($nombrec,$fechac,$horac,$lugarc,$descripcionc);
		$admin-> mostrar_capacitaciones();
	}

	if($_REQUEST['valor']=='refrescar')
	{
   		$admin=new Administrador();
   		$admin-> mostrar_capacitaciones();
	}

?>
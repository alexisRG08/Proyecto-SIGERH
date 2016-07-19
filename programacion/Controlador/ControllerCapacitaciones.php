<?php
require_once ('../../programacion/clases/Capacitaciones.php');
if(isset($_POST["submit"])){
	$nombre=$_POST['capnombre'];
	$fecha=$_POST['capfecha'];
	$hora=$_POST['caphora'];
	$lugar=$_POST['caplugar'];
	$empleado=$_POST['capempleado'];

    $Capacitaciones=new Capacitaciones();
    $Capacitaciones->agregar_capacitacion($nombre,$fecha,$hora,$lugar,$empleado);
}
?>
<?php
require_once ('../../programacion/clases/Empleados.php');
require_once('../../programacion/clases/Administrador.php');

if($_REQUEST['valor']=='Agregar-Evento'){

	$nom_evento=$_POST['nom_evento'];

  $nom_fecha=$_POST['nom_fecha'];
  $nom_hora=$_POST['nom_hora'];
 $nom_descripcion=$_POST['nom_descripcion'];
  $idempleados="1";
if ($nom_evento==null) {
  echo "Escribe el nombre del evento..";
}else{
  
$Empleados=new Empleados();
  $Empleados->agregar_evento($nom_evento,$nom_fecha,$nom_hora,$nom_descripcion,$idempleados);
  
}
  
    }   

if($_REQUEST['valor']=='actualizar-evento'){
  $nombre =strip_tags($_POST['nombre']);
  $fecha =strip_tags($_POST['fecha']); 
  $hora = strip_tags($_POST['hora']);
  $descripcion = strip_tags($_POST['descripcion']);

  if($nombre==null){
    echo "Ingresa el nombre del evento";
  }else{
    if ($fecha==null) {
      echo "Ingresa la fecha del evento";
    }
  }
}

?>
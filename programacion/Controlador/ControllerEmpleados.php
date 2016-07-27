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
  $id_evento=strip_tags($_POST['id_evento']);
  $nombre =strip_tags($_POST['nombre']);
  $fecha =strip_tags($_POST['fecha']); 
  $hora = strip_tags($_POST['hora']);
  $descripcion = strip_tags($_POST['descripcion']);

  if($nombre==null){
    echo "<center>Ingresa el nombre del evento</center>";
  }else{
    if ($fecha==null) {
      echo "<center>Ingresa la fecha del evento</center>";
    }else{
      if ($hora==null) {
        echo "<center>Ingresa la hora del evento</center>";
      }else{
       if ($descripcion==null) {
         echo "<center>Ingrese la descripcion del evento</center>";
       }else{
        $sql="UPDATE eventoss SET descripcion=0 WHERE  id_detail=$id_evento ;";
        $actualizar=new Administrador();
        $actualizar->actualizar_evento($sql);
       }
      }
    }
  }
}

?>
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
  if($nom_fecha==null){
    echo "Escribe la fecha del evento";
  }else{
    if($nom_hora==null){
      echo "Escribe la Hora del evento";
    }else{
      if ($nom_descripcion==null) {
        echo "Escribe una descipción del evento";
      }else{
        $Empleados=new Empleados();
        $Empleados->agregar_evento($nom_evento,$nom_fecha,$nom_hora,$nom_descripcion,$idempleados);
      }
    }
  }

  
}
  
    }   

if($_REQUEST['valor']=='actualizar-evento'){
  $id_evento=$_POST['id_evento'];
  $nombre =$_POST['nombre'];
  $fecha =$_POST['fecha']; 
  $hora = $_POST['hora'];
  $descripcion = $_POST['descripcion'];

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

        $sql="UPDATE eventos SET nombre='$nombre', fecha='$fecha',  hora='$hora', descripcion='$descripcion' WHERE  ideventos=$id_evento ;";
        $actualizar=new Administrador();
        $actualizar->actualizar_evento($sql);
       }
      }
    }
  }
}
if($_REQUEST['valor']=='btn_buscar'){
   $buscarevt=strip_tags($_POST['buscarevt']);
  $actualizar=new Administrador();
  $actualizar->mostrareventos($buscarevt);

}
if($_REQUEST['valor']=='refrescar_tabla'){
   $mostrar=new Administrador();
  $mostrar->mostrareventos("");
 
}

?>
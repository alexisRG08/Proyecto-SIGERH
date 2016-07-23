<?php
require_once ('../../programacion/clases/Empleados.php');

if($_REQUEST['valor']=='Agregar-Evento'){

//if(isset($_POST["submit"])){
	$nom_evento=$_POST['nom_evento'];

//$apep=//mysql_real_escape_string(strip_tags($_POST['apellidop']));  //$_POST['apellidop'];
  $nom_fecha=$_POST['nom_fecha'];
  //$amm=mysql_real_escape_string(strip_tags($_POST['apellidomater']));  //$_POST['apellidom'];
  $nom_hora=$_POST['nom_hora'];
  //$corr= mysql_real_escape_string(strip_tags($_POST['email'])); //$_POST['correo'];
 $nom_descripcion=$_POST['nom_descripcion'];
  //$userr= mysql_real_escape_string(strip_tags($_POST['user_name'])); //$_POST['user_name'];
  $idempleados="1";
if ($nom_evento==null) {
  echo "Escribe el nombre del evento";
}else{
  $Empleados=new Empleados();
  $Empleados->agregar_evento($nom_evento,$nom_fecha,$nom_hora,$nom_descripcion,$idempleados);
}
  
  
    }   
?>
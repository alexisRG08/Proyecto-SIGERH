<?php
require_once('../../programacion/clases/Administrador.php');

if($_REQUEST['valor']=='agregar_usuario')
{
	$nickname=$_REQUEST['usuario'];
	$password=$_REQUEST['password'];
	$departamento=$_REQUEST['departamento'];
	$tipo_usuario=$_REQUEST['tipo_usuario'];
    
  echo $departamento;
	$Administrador=new Administrador();
  $Administrador-> agregar_usuario($nickname,$password,$departamento,$tipo_usuario);
    

}

if($_REQUEST['valor']=='mostrar_departamento')
{
<<<<<<< HEAD
   $area=$_REQUEST['area'];
   echo $area;
   require_once('../../programacion/conexion/DataBase.php');
   $bd=new DataBase();
   //$sql="select d.iddepartamentos, d.nombre_departamento from departamentos d INNER JOIN area a on d.iddepartamentos=a.departamentos_iddepartamentos where a.idarea=$area";
   $sql="select * from departamentos";
   echo $sql;
=======

   $area=$_REQUEST['area'] ;
     require_once('../../programacion/conexion/DataBase.php');
   $bd=new DataBase();

  //$sql="select d.iddepartamentos, d.nombre_departamento from departamentos d INNER JOIN area a on d.iddepartamentos=a.departamentos_iddepartamentos where a.idarea=$area";
   

  $sql="select from departamentos where  area_idarea=$area";
  // echo $sql;
>>>>>>> origin/master
   $bd->ejecutar($sql);
   $resultados=$bd->ejecutar($sql);  ?>
   <select id="empleado3" class="form-control"  value="mostrar_empleado" onchange="mostrar_empleado();">;
  <?php
   while($row=mysqli_fetch_array($resultados))
       {
         echo "<option value='".$row['iddepartamentos']."'>";
         echo $row['iddepartamentos'];
         echo "</option>";
      } 
       echo '</select>'; 
}

 ?>
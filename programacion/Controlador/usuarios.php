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
      
     /*echo '<div class=modal-body>';
     echo '<div class=alert-success>';
     echo '<br>REPORTE ENVIADO EXITOSAMENTE <br> <br>';
     echo  '</div>';
     echo  '</div>';*/

}

if($_REQUEST['valor']=='mostrar_departamento')
{
   $area=$_REQUEST['area'];
   require_once('../../programacion/conexion/DataBase.php');
   $bd=new DataBase();
   $sql="select * from departamentos where area_idarea=$area;";
   $bd->ejecutar($sql);
   $resultados=$bd->ejecutar($sql);
   echo '<select class="form-control" id="departamento">';
   while($row=mysqli_fetch_array($resultados))
       {
         echo "<option value='".$row['id_departamento']."'>";
         echo $row['nombre_departamento'];
         echo "</option>";
      } 
       echo '</select>';
    
}

if($_REQUEST['valor']=='eliminar_usuario')
{
   
    $id_colaborador=$_REQUEST['colaborador'];
    $Administrador=new Administrador();
    $Administrador->eliminar_usuario($id_colaborador);
      
}


if($_REQUEST['valor']=='actualizar_usuario')
{
   
    $usuario=$_REQUEST['usuario'];
     $contrasenia=$_REQUEST['contrasenia'];
      $id_colaborador=$_REQUEST['id'];
    $Administrador=new Administrador();
    $Administrador->actualizar_usuario($usuario,$contrasenia,$id_colaborador);
      
}

 ?>
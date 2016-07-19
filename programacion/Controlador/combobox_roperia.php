<?php 
if($_REQUEST['valor']=='mostrar_departamento_r')
{
   $area=$_REQUEST['area'];
   require_once('../../programacion/conexion/DataBase.php');
   $bd=new DataBase();
   $sql="select * from departamento where Area_id_area=$area;";
   $bd->ejecutar($sql);
   $resultados=$bd->ejecutar($sql);
   echo '<select class="form-control" id="dep_r">';
   while($row=mysqli_fetch_array($resultados))
       {
         echo "<option value='".$row['id_departamento']."'>";
         echo $row['nombre_departamento'];
         echo "</option>";
      } 
       echo '</select>';
    
}

?>
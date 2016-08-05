<script type="text/javascript">
function formulario(){
  document.getElementById("contrasena").style.display="none";  
  
} 
</script>

<?php
require_once('../../programacion/conexion/DataBase.php');

class Administrador
{
	function mostrareventos(){
    $bd=new Database();
    $sql="select * from eventos";
      $resultado=$bd->ejecutar($sql);
      $cont1=0;
     $cont=0;
       while($fila=mysqli_fetch_array($resultado))
      {
                  $id_evento=$fila['ideventos'];
                   $nombre = $fila['nombre'];
                    $fecha = $fila['fecha']; 
                    $hora = $fila['hora'];
                    $descripcion = $fila['descripcion']; 
                   echo "<tr>";
                    echo "<td contenteditable><center> $nombre</center></td>";
                    echo "<td contenteditable> <center>$fecha</center></td>";
                   echo "<td contenteditable><center> $hora</center></td>";
                   echo "<td contenteditable><center> $descripcion</center></td>";
                   echo "<td><button type='submit'  class='btn btn-primary' onclick='deletevento($id_evento)' value='eliminar-evento'>Eliminar</button></td>"; 
                  echo " <td><button type='submit' class='btn btn-primary' onclick='updatevento($id_evento,$cont1)' value='actualizar-evento'>Actualizar</button></td>";
                    echo "</tr>"; 
                  
                    $cont++;
                   $cont1=$cont1+7;   
      }
                  
  }
  
  function eliminar_evento($id_evento){
   $bd=new Database();
   $sql="delete from eventos where ideventos=$id_evento";
   $bd->ejecutar($sql);
   echo "eliminado evento";
  }
  function actualizar_evento($sql){
$bd=new Database();
$bd->ejecutar($sql);
echo "Datos actualizados";
  }
	function agregar_empleado($nombre,$apellido,$direccion,$telefono,$edad,$fechaNacimiento,$rfcEmpleado,$estudio,$puesto,$departamento,$curp,$numsocial,$estado)
	{
		$bd=new Database();
       	$sql="insert into empleados (nombre,apellidos,direccion,telefono,edad,fechanacimiento,rfc,escolaridad,Tipo_empleo_idTipo_empleo,departamentos_iddepartamentos,curp,nsocial,status) values
       		('$nombre','$apellido','$direccion','$telefono','$edad','$fechaNacimiento','$rfcEmpleado','$estudio','$puesto','$departamento','$curp','$numsocial','$estado')";
       	$bd->ejecutar($sql); 
        }
  function eliminar_empleado($id_empleado)
  {
        $bd=new Database();
        $sql="update empleados set status='Baja' where id_empleado=$id_empleado;";
        $bd->ejecutar($sql);
        echo $sql; 
  }
  function actualizar_empleado($id_empleado,$nombre,$apellido,$direccion,$telefono,$edad,$fechaNacimiento,$rfcEmpleado,$estudio,$curp,$numsocial)
  {
    $bd=new Database();
    $sql="update empleados set nombre='$nombre',apellidos='$apellido',direccion='$direccion',telefono='$telefono',edad=$edad,fechanacimiento='$fechaNacimiento',rfc='$rfcEmpleado',escolaridad='$estudio',curp='$curp',nsocial='$numsocial'
     where id_empleado=$id_empleado;";
    $bd->ejecutar($sql);
    echo $sql;
  }     

	function agregar_usuario($nickname,$password,$tipo_usuario)
	{
		    $bd=new Database();
       	$sql="insert into usuarios (usuario,contrasena,tipo) values($nickname,$password,$tipo_usuario)";
       	$bd->ejecutar($sql);
       	echo $sql;

	}
	function mostrar_empleados(){ 
		  $bd=new Database();
      $sql="select * from empleados where status='alta';";
      $resultado=$bd->ejecutar($sql);
      $cont=0;
      $cont1=0;
         echo" <div class='table-responsive'>
                          <table class='table table-bordered table-hover table-condensed table table-striped'>
                          <tr>
                            <th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>Edad</th><th>Fecha de nacimiento</th><th>RFC</th>
                            <th>Nivel de estudio</th><th>Puesto</th><th>Departamento</th><th>Curp</th><th>Numero del seguro social</th><th>Estado</th>
                            <th>Actualizar</th><th>Eliminar</th>
                          </tr>";
      while($fila=mysqli_fetch_array($resultado))
      {
        $idd = $fila['id_empleado'];
        $campo1 = $fila['nombre'];
        $campo2 = $fila['apellidos'];
        $campo3 = $fila['direccion'];
        $campo4 = $fila['telefono'];
        $campo5 = $fila['edad'];
        $campo6 = $fila['fechanacimiento'];
        $campo7 = $fila['rfc'];
        $campo8 = $fila['escolaridad'];
        $campo9 = $fila['Tipo_empleo_idTipo_empleo'];
        $campo10 = $fila['departamentos_iddepartamentos'];
        $campo11 = $fila['curp'];
        $campo12 = $fila['nsocial'];
        $campo13 = $fila['status'];
     
        echo"<tr>";
              echo"<td contenteditable>$campo1</td>";
              echo"<td contenteditable>$campo2</td>";
              echo"<td contenteditable>$campo3</td>";
              echo"<td contenteditable>$campo4</td>";
              echo"<td contenteditable>$campo5</td>";
              echo"<td contenteditable>$campo6</td>";
              echo"<td contenteditable>$campo7</td>";
              echo"<td contenteditable>$campo8</td>";
              echo"<td >$campo9</td>";
              echo"<td >$campo10</td>";
              echo"<td contenteditable>$campo11</td>";
              echo"<td contenteditable>$campo12</td>";
              echo"<td >$campo13</td>";
              echo"<td><button type='button' class='btn btn-primary' value='actualizar-empleado' onclick='actualizarEmpleado($idd,$cont1)'>Actualizar</button></td>";
              echo"<td><button type='button' class='btn btn-primary' value='eliminar-empleado' onclick='eliminarEmpleado($idd,$cont)'>Eliminar</button></td>";
        echo"</tr>";
       
              $cont++;
              $cont1=$cont1+15;
      } 
       echo"</table>
             </div>";     
            

	}
  function sesion_login($usuario,$contrasena){
  $bd=new Database();
 $sql= "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and contrasena='".$contrasena."';";

  $resultado=$bd->ejecutar($sql);
   $count = mysqli_num_rows($resultado);
           if($count >= 1){
           $_SESSION['usuario'] = $usuario;  
           echo "<br> Bienvenido! " . $_SESSION['usuario'];
           $this->validartipo($usuario);
           }else{
            echo "Información Incorrecta<br>";
              }   
  }
  function validartipo($dato){
     $bd=new Database();
     $sql="SELECT * FROM usuarios WHERE usuario = '".$dato."';";
    $result=$bd->ejecutar($sql);
     while($fila=mysqli_fetch_array($result))
      {
        $tipo = $fila['tipo'];
        $this->controltipo($tipo);
        
      }
  }
  function controltipo($nivel){
    if ($nivel==1) {
      echo "<br><button type='submit' id='btncontinuar' class='btn btn-primary' onclick='niveladmin()'>continuar</button>"; 
    }else{
      echo "<br><button type='submit' id='btncontinuar' class='btn btn-primary' onclick='nivelnormal()'>continuar</button>"; 
    }
  }
}
?>
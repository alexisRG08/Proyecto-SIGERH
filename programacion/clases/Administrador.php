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
    $sql="select * from eventoss";
      $resultado=$bd->ejecutar($sql);
      $cont1=0;
     $cont=0;
       while($fila=mysqli_fetch_array($resultado))
      {
                  $id_evento=$fila['id_eventos'];
                   $nombre = $fila['nombre'];
                    $fecha = $fila['fecha']; 
                    $hora = $fila['hora'];
                    $descripcion = $fila['descripcion']; 
                    $idempleado = $fila['empleados_id_empleado']; 
                   echo "<tr>";
                    echo "<td contenteditable><center> $nombre</center></td>";
                    echo "<td contenteditable> <center>$fecha</center></td>";
                   echo "<td contenteditable><center> $hora</center></td>";
                   echo "<td contenteditable><center> $descripcion</center></td>";
                   echo "<td contenteditable><center> $idempleado</center></td>";
                   echo "<td><button type='submit'  class='btn btn-primary' onclick='deletevento($id_evento)' value='eliminar-evento'>Eliminar</button></td>"; 
                  echo " <td><button type='submit' class='btn btn-primary' onclick='updatevento($id_evento,$cont1)' value='actualizar-evento'>Actualizar</button></td>";
                    echo "</tr>"; 
                    $cont++;
                   $cont1=$cont1+7;   
      }
                  
  }
  function eliminar_evento($id_evento){
   $bd=new Database();
   $sql="delete from eventoss where id_eventos=$id_evento";
   $bd->ejecutar($sql);
   echo "eliminado evento";
  }
	function agregar_empleado($nombre,$apellido,$direccion,$telefono,$edad,$fechaNacimiento,$rfcEmpleado,$estudio,$numeroEmpleado,$puesto,$departamento,$curp,$numsocial)
	{
		$bd=new Database();
       	$sql="insert into empleados (nombre,apellidos,direccion,telefono,edad,fechanacimiento,rfc,escolaridad,numero_empleado,Tipo_empleo_idTipo_empleo,departamentos_iddepartamentos,curp,nsocial) values
       		('$nombre','$apellido','$direccion','$telefono','$edad','$fechaNacimiento','$rfcEmpleado','$estudio','$numeroEmpleado','$puesto','$departamento','$curp','$numsocial')";
       	$bd->ejecutar($sql);
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
      $sql="select * from empleados";
      $resultado=$bd->ejecutar($sql);
      $cont=0;
      $cont1=0;
      while($fila=mysqli_fetch_array($resultado))
      {
        $cont=0;
        $idd = $fila['id_empleado'];
        $campo1 = $fila['nombre'];
        $campo2 = $fila['apellidos'];
        $campo3 = $fila['direccion'];
        $campo4 = $fila['telefono'];
        $campo5 = $fila['edad'];
        $campo6 = $fila['fechanacimiento'];
        $campo7 = $fila['rfc'];
        $campo8 = $fila['escolaridad'];
        $campo9 = $fila['numero_empleado'];
        $campo10 = $fila['Tipo_empleo_idTipo_empleo'];
        $campo11 = $fila['departamentos_iddepartamentos'];
        $campo12 = $fila['curp'];
        $campo13 = $fila['nsocial'];
        echo"<tr>";
              echo"<td>$campo1</td>";
              echo"<td>$campo2</td>";
              echo"<td>$campo3</td>";
              echo"<td>$campo4</td>";
              echo"<td>$campo5</td>";
              echo"<td>$campo6</td>";
              echo"<td>$campo7</td>";
              echo"<td>$campo8</td>";
              echo"<td>$campo9</td>";
              echo"<td>$campo10</td>";
              echo"<td>$campo11</td>";
              echo"<td>$campo12</td>";
              echo"<td>$campo13</td>";
              echo"<td><button type='button' class='btn btn-primary' value='actualizarEmpleado' onclick='actualizarEmpleado($idd,$cont1);'>Actualizar</button></td>";
              echo"<td><button type='button' class='btn btn-primary' value='eliminarEmpleado' onclick='eliminarEmpleado($idd,$cont)'>Eliminar</button></td>";
        echo"</tr>";
              $cont++;
              $cont1=$cont1+13;
      }      
            

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
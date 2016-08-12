<script type="text/javascript">
function formulario(){
  document.getElementById("contrasena").style.display="none";  
  
}
</script>

<?php
require_once('../../programacion/conexion/DataBase.php');

class Administrador
{
	function mostrareventos($buscar){
    if ($buscar=="") {
      $sql="select * from eventos";
    }
    else{
      $sql="select * from eventos where nombre LIKE '$buscar%';";
    }
    $bd=new Database();

    
    $resultado=$bd->ejecutar($sql);
    $cont1=0;
    $cont=0;

    echo"  <table id='tablaeventos' class='table table-bordered table-hover table-condensed table table-striped'>
    <tr>
    <th>Nombre</th><th>Fecha</th><th>Hora</th><th>Descripción</th><th>Eliminar</th><th>Editar</th>
    </tr>";
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
    echo"</table>";  

  }

  function eliminar_evento($id_evento){
   $bd=new Database();
   $sql="delete from eventos where ideventos=$id_evento";
   $bd->ejecutar($sql);
 //  echo "eliminado evento";
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
  echo "Datos ingresados correctamente,";
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
//  echo $sql;
}     
function buscar_empleado($buscaEmpleado)
{ 

  $bd=new Database();
     $sql="select e.id_empleado,e.nombre,e.apellidos,e.direccion,e.telefono,e.edad,e.fechanacimiento,e.rfc,e.escolaridad,t.tipo,d.nombre_departamento,e.curp,
   e.nsocial,e.status FROM empleados e INNER JOIN tipo_empleo t ON e.Tipo_empleo_idTipo_empleo=t.idTipo_empleo INNER JOIN departamentos d ON e.departamentos_iddepartamentos=d.iddepartamentos 
  where e.nombre LIKE '$buscaEmpleado%' and e.status='Alta';";
  $consulta=$bd->ejecutar($sql);
  $Num_filas=mysqli_num_rows($consulta);
  $consulta=$bd->ejecutar($sql);
  $Num_filas=mysqli_num_rows($consulta);

  if($Num_filas>0)
  { 
  echo" <div class='table-responsive'>
  <table class='table table-bordered table-hover table-condensed table table-striped'>
  <tr>
  <th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>Edad</th><th>Fecha de nacimiento</th><th>RFC</th>
  <th>Nivel de estudio</th><th>Puesto</th><th>Departamento</th><th>Curp</th><th>Numero del seguro social</th><th>Estado</th>
  <th>Actualizar</th><th>Eliminar</th>
  </tr>";
    $cont=0;
    $cont1=0;

    while($fila=mysqli_fetch_array($consulta))
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
      $campo9 = $fila['tipo'];
      $campo10 = $fila['nombre_departamento'];
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

  }
  else
  {
    echo'<div class="alert alert-danger">Cero resultados</div>';
  }

}

function buscar_empleados($buscarEmpleados)
{ 
  $bd=new Database();
  if($buscarEmpleados=='todos') 
  {
    $sql="select e.id_empleado,e.nombre,e.apellidos,e.direccion,e.telefono,e.edad,e.fechanacimiento,e.rfc,e.escolaridad,t.tipo,d.nombre_departamento,e.curp,
  e.nsocial,e.status FROM empleados e INNER JOIN tipo_empleo t ON e.Tipo_empleo_idTipo_empleo=t.idTipo_empleo INNER JOIN departamentos d ON e.departamentos_iddepartamentos=d.iddepartamentos;";
  }
  if($buscarEmpleados=='altas')
  {
    $sql="select e.id_empleado,e.nombre,e.apellidos,e.direccion,e.telefono,e.edad,e.fechanacimiento,e.rfc,e.escolaridad,t.tipo,d.nombre_departamento,e.curp,
  e.nsocial,e.status FROM empleados e INNER JOIN tipo_empleo t ON e.Tipo_empleo_idTipo_empleo=t.idTipo_empleo INNER JOIN departamentos d ON e.departamentos_iddepartamentos=d.iddepartamentos
  WHERE e.status='alta';"; 
  }
  if($buscarEmpleados=='bajas')
  {
    $sql="select e.id_empleado,e.nombre,e.apellidos,e.direccion,e.telefono,e.edad,e.fechanacimiento,e.rfc,e.escolaridad,t.tipo,d.nombre_departamento,e.curp,
  e.nsocial,e.status FROM empleados e INNER JOIN tipo_empleo t ON e.Tipo_empleo_idTipo_empleo=t.idTipo_empleo INNER JOIN departamentos d ON e.departamentos_iddepartamentos=d.iddepartamentos 
  WHERE e.status='baja';";
  }
  $consulta=$bd->ejecutar($sql);
  $Num_filas=mysqli_num_rows($consulta);
  

  if($Num_filas>0)
  { 
   echo" <div class='table-responsive'>
  <table class='table table-bordered table-hover table-condensed table table-striped'>
  <tr>
  <th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>Edad</th><th>Fecha de nacimiento</th><th>RFC</th>
  <th>Nivel de estudio</th><th>Puesto</th><th>Departamento</th><th>Curp</th><th>Numero del seguro social</th><th>Estado</th>
  <th>Actualizar</th>
  </tr>";
    $cont=0;
    $cont1=0;

    while($fila=mysqli_fetch_array($consulta))
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
      $campo9 = $fila['tipo'];
      $campo10 = $fila['nombre_departamento'];
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
      echo"</tr>";

      $cont++;
      $cont1=$cont1+15;
    } 

  }
  else
  {
    echo'<div class="alert alert-danger">Cero resultados</div>';
  }
}

function mostrar_empleados(){ 
  $bd=new Database();
 $sql="select e.id_empleado,e.nombre,e.apellidos,e.direccion,e.telefono,e.edad,e.fechanacimiento,e.rfc,e.escolaridad,t.tipo,d.nombre_departamento,e.curp,
  e.nsocial,e.status FROM empleados e INNER JOIN tipo_empleo t ON e.Tipo_empleo_idTipo_empleo=t.idTipo_empleo INNER JOIN departamentos d ON e.departamentos_iddepartamentos=d.iddepartamentos 
  WHERE e.status='Alta';";
  $resultado=$bd->ejecutar($sql);
  $cont=0;
  $cont1=0;
  echo" <div class='table-responsive'>
  <table class='table table-bordered table-hover table-condensed table table-striped'>
  <tr>
  <th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th><th>RFC</th>
  <th>Nivel de estudio</th><th>Puesto</th><th>Curp</th><th>Numero del seguro social</th><th>Estado</th>
  <th>Actualizar</th><th>Eliminar</th>
  </tr>";
  while($fila=mysqli_fetch_array($resultado))
  {
    $idd = $fila['id_empleado'];
    $campo1 = $fila['nombre'];
    $campo2 = $fila['apellidos'];
  //  $campo3 = $fila['direccion'];
//    $campo4 = $fila['telefono'];
//    $campo5 = $fila['edad'];
    $campo6 = $fila['fechanacimiento'];
    $campo7 = $fila['rfc'];
    $campo8 = $fila['escolaridad'];
    $campo9 = $fila['tipo'];
 //   $campo10 = $fila['nombre_departamento'];
    $campo11 = $fila['curp'];
    $campo12 = $fila['nsocial'];
    $campo13 = $fila['status'];

    echo"<tr>";
    echo"<td contenteditable>$campo1</td>";
    echo"<td contenteditable>$campo2</td>";
 //   echo"<td contenteditable>$campo3</td>";
 //   echo"<td contenteditable>$campo4</td>";
//    echo"<td contenteditable>$campo5</td>";
    echo"<td contenteditable>$campo6</td>";
    echo"<td contenteditable>$campo7</td>";
    echo"<td contenteditable>$campo8</td>";
    echo"<td >$campo9</td>";
  //  echo"<td >$campo10</td>";
    echo"<td contenteditable>$campo11</td>";
    echo"<td contenteditable>$campo12</td>";
    echo"<td >$campo13</td>";
    echo"<td><button type='button' class='btn btn-primary' value='actualizar-empleado' onclick='actualizarEmpleado($idd,$cont1)'>Actualizar</button></td>";
    echo"<td><button type='button' class='btn btn-primary' value='eliminar-empleado' onclick='eliminarEmpleado($idd,$cont)'>Eliminar</button></td>";
    echo"</tr>";

    $cont++;
    $cont1=$cont1+15;
  } 



}
function sesion_login($usuario,$contrasena)
{
  $bd=new Database();
  $encriptar = $_REQUEST['contrasena'];
  $hashed= hash('sha512',$encriptar); 

  $sql= "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and contrasena='".$hashed."';";
  $bd->ejecutar($sql);
 
 
  $resultado=$bd->ejecutar($sql);
  $count = mysqli_num_rows($resultado);
  if($count >= 1)
  {
    session_start();
    $_SESSION['usuario'] = $usuario;  
 //echo "<br> Bienvenido! " . $_SESSION['usuario'];
    $this->validartipo($usuario);
  }
  else
  {
    echo("Usuario Incorrecto");
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


  //----Metodos para  Registrar Entradas de un empleado  ------//
function registrar_entrada($numero_empleado,$hora_entrada){
  $bd=new Database();
  $sql="select * from empleados where id_empleado = '".$numero_empleado."';";
  $resultado=$bd->ejecutar($sql);
  $count = mysqli_num_rows($resultado);
  if($count >= 1){
    $this->Fecharegistro_entrada($numero_empleado,$hora_entrada);
  }else{
         // echo "El numero de usuario ".$numero_empleado." no existe en la base de datos";
   echo '<div class="alert alert-danger">El numero de empleado no esta registrado en la base de datos</div>';

 }
}

function Fecharegistro_entrada($numero_empleado,$hora_entrada){
 $dia=date("d")-1;
 $fecha=date("Y")."-".date("m")."-".$dia;
 $bd=new Database();
 $sql="select * from reloj_checador where Fecha = '".$fecha."' and empleados_id_empleado='".$numero_empleado."';";
 $resultado=$bd->ejecutar($sql);
 $count = mysqli_num_rows($resultado);
 if($count >= 1){
   echo '<div class="alert alert-danger">Solo te puedes registrar una vez al dia!</div>';
 }else{
  $this->registrandoDB($numero_empleado,$fecha,$hora_entrada);
}  

}
function registrandoDB($numero_empleado,$fecha,$hora_entrada){
  $bd=new Database();
  $hora=date("H").":".date("i").":".date("s");
  $salida="00:00";
  $sql="insert into reloj_checador values(null,'$fecha','$hora_entrada','$salida',$numero_empleado)";
     //   $sql="insert into reloj_checador values('2016-08-07','05:40:00','00:00:00',1301);";
  $bd->ejecutar($sql);
  echo '<div class="alert alert-success">Su entrada a sido registrada exitosamente!</div>';  

}
  // Registrar SAlida del empleado
function registrar_salida($numero_empleado,$hora_entrada){ // en este revisamos si el empleado ha registro entrada
  $dia=date("d")-1;
  $fecha=date("Y")."-".date("m")."-".$dia;
  $bd=new Database();
  $sql="select * from reloj_checador where Fecha = '".$fecha."' and empleados_id_empleado='".$numero_empleado."';";
  $resultado=$bd->ejecutar($sql);
  $count = mysqli_num_rows($resultado);
  if($count >= 1){
    $this->revisando_entrada($sql,$hora_entrada);
  }else{
    echo '<div class="alert alert-danger">No haz registrado entrada</div>';
  }
} 
function revisando_entrada($sql,$hora_entrada){
$bd=new Database();
$resultado=$bd->ejecutar($sql);
while($fila=mysqli_fetch_array($resultado))
  {
     $idreloj= $fila['idreloj'];
  $salida = $fila['salida'];
 
 $this->insertando_salida($salida,$hora_entrada,$idreloj);
  }
}
 function insertando_salida($horasalida,$hora_entrada,$idreloj){
 if($horasalida=="00:00"){
 $bd=new Database();
  $sql="update reloj_checador set salida='$hora_entrada' where idreloj=$idreloj;";
  $bd->ejecutar($sql);
  echo '<div class="alert alert-success">Registro salida correctamente, que le vaya bien xD</div>';  
 }else{
   echo '<div class="alert alert-danger">Ya Registraste salida anteriormente</div>';
 }  
 }


function agregar_capacitaciones($nombrec,$fechac,$horac,$lugarc,$descripcionc)
  {
    $bd=new Database();
    $sql="insert into capacitaciones (nombre,fecha,hora,lugar,descripcion) values ('$nombrec','$fechac','$horac','$lugarc','$descripcionc');";
    $resultado=$bd->ejecutar($sql);
    
  }
function mostrar_capacitaciones()
 {
      $bd=new Database();
      $sql="select * from capacitacioness"; 
      $resultado=$bd->ejecutar($sql);
      $cont=0;
      $cont1=0;
      echo "<div class='table-responsive'>
                <table class='table table-bordered table-hover table-condensed table table-striped'>
                <tr>
                  <th>Nombre</th><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Descripcion</th><th>Actualizar</th><th>Eliminar</th>
                </tr>";
            
            while($fila=mysqli_fetch_array($resultado))
            {
  
            $idd = $fila['idcapacitacion'];
            $nombre = $fila['nombre'];
            $fecha = $fila['fecha']; 
            $hora = $fila['hora'];
            $lugar = $fila['lugar']; 
            $descripcion = $fila['descripcion']; 
            echo "<tr>";
            echo "<td contenteditable> $nombre</td>";
            echo "<td contenteditable> <input type='date' id='fecha$cont1' value='$fecha'></td>";
            echo "<td contenteditable> <input type='time' id='hora$cont1' value='$hora'></td>";  
            echo "<td contenteditable> $lugar</td>";
            echo "<td contenteditable> $descripcion</td>";
            echo "<td><button type='button' class='btn btn-primary' value='actualizar-capacitacion' onclick='actualizarCapacitaciones($idd,$cont1)'>Actualizar</button></td>";
            echo "<td><button type='button' class='btn btn-primary' value='eliminar-capacitacion' onclick='eliminarCapacitaciones($idd,$cont)'>Eliminar</button></td>";
            echo "</tr>";  
            $cont++;
            $cont1=$cont1+7;
  
            } 
        echo "</table>
              </div>";                  
 }          

function buscar_capacitaciones($buscarCapacitacion)
{
 $bd=new Database();
 $sql="select * from capacitaciones where nombre like '$buscarCapacitacion%';";
 $consulta=$bd->ejecutar($sql);
 $Num_filas=mysqli_num_rows($consulta);   
  
  if($Num_filas>0)
    { 
          echo "<div class='table-responsive'>
                <table class='table table-bordered table-hover table-condensed table table-striped'>
                <tr>
                  <th>Nombre</th><th>Fecha</th><th>Hora</th><th>Lugar</th><th>Descripcion</th><th>Actualizar</th><th>Eliminar</th>
                </tr>";
            $cont=0;
            $cont1=0;
            while($fila=mysqli_fetch_array($consulta))
            {
  
            $idd = $fila['idcapacitacion'];
            $nombre = $fila['nombre'];
            $fecha = $fila['fecha']; 
            $hora = $fila['hora'];
            $lugar = $fila['lugar']; 
            $descripcion = $fila['descripcion']; 
            echo "<tr>";
            echo "<td contenteditable> $nombre</td>";
            echo "<td contenteditable> <input type='date' id='fecha$cont1' value='$fecha'></td>";
            echo "<td contenteditable> <input type='time' id='hora$cont1' value='$hora'></td>";  
            echo "<td contenteditable> $lugar</td>";
            echo "<td contenteditable> $descripcion</td>";
            echo "<td><button type='button' class='btn btn-primary' value='actualizar-capacitacion' onclick='actualizarCapacitaciones($idd,$cont1)'>Actualizar</button></td>";
            echo "<td><button type='button' class='btn btn-primary' value='eliminar-capacitacion' onclick='eliminarCapacitaciones($idd,$cont)'>Eliminar</button></td>";
            echo "</tr>";  
            $cont++;
            $cont1=$cont1+7;
            } 
        echo "</table>
              </div>";     
        }
          else
          {
            echo'<div class="alert alert-danger">Cero resultados</div>';
          }       
    }
    function eliminar_capacitaciones($idcapacitacion){
 
 $bd=new Database();
 $sql="delete  from capacitaciones where idcapacitacion = $idcapacitacion;";
 $resultado=$bd->ejecutar($sql);
}
  function actualizar_capacitaciones($idcapacitacion,$nombrec,$fechac,$horac,$lugarc,$descripcionc)
{
 
 $bd=new Database();
 $sql="update capacitaciones set nombre='$nombrec',fecha='$fechac',hora='$horac',lugar='$lugarc',descripcion='$descripcionc' where idcapacitacion=$idcapacitacion;";
 $resultado=$bd->ejecutar($sql);
}

function agregar_usuario($nombreU,$password,$tipoE,$idEmpleado)
{

$bd=new Database();
  $sql="call validar_password($idEmpleado);";
  $resultado=$bd->ejecutar($sql);
  $bd->cerrarConexion();
while($fila=mysqli_fetch_array($resultado))
            {
              $mensaje=$fila['@mensaje'];
            }


            if($mensaje=='1')
            {
              $bd=new Database();
              $sql="call validar_usuario('$nombreU','$password',$tipoE,$idEmpleado);";
              $resultado=$bd->ejecutar($sql);
              while($fila=mysqli_fetch_array($resultado))
            {
              $mens=$fila['@mensaje'];
            }
            echo $mens;
            }
            else
            {
              echo $mensaje;
            }
  /*$bd=new Database();
  $sql="insert into usuarios (usuario,contrasena,tipo,empleados_id_empleado) values ('$nombreU','$password',$tipoE,$idEmpleado);";
  $resultado=$bd->ejecutar($sql);
  echo $sql;*/
}

function eliminar_usuario($idUsuario)
{
  $bd=new Database();
  $sql="delete from usuarios where Id_user = $idUsuario ;";
  $resultado=$bd->ejecutar($sql);
  $bd->cerrarConexion();
}
function buscar_usuario($buscarUsuario)
{
  $bd=new Database();
  $sql="select u.Id_user, u.usuario, u.contrasena,u.tipo,e.nombre from usuarios u INNER JOIN empleados e on u.empleados_id_empleado=e.id_empleado where u.usuario like '$buscarUsuario%';";
  $consulta=$bd->ejecutar($sql);
  $Num_filas=mysqli_num_rows($consulta);   
  
  if($Num_filas>0)
    { 
      $cont=0;
      //$cont1=0;
      echo "<div class='table-responsive'>
            <table class='table table-bordered table-hover table-condensed table table-striped'>
                <tr>
                  <th>Usuario</th><th>Tipo de usuario</th><th>Nombre de empleado</th><th>Eliminar</th>
                </tr>";
            while($fila=mysqli_fetch_array($consulta))
            {
  
            $idd = $fila['Id_user'];
            $usuario = $fila['usuario'];
            $contrasena = $fila['contrasena']; 
            $tipo = $fila['tipo'];
            $nombre = $fila['nombre'];  
            echo "<tr>";
            echo "<td > $usuario</td>";
            echo "<td > $tipo</td>";  
            echo "<td > $nombre</td>";
            //echo "<td><button type='button' class='btn btn-primary' value='actualizar-usuario' onclick='actualizarUsuario($idd,$cont1)'>Actualizar</button></td>";
            echo "<td><button type='button' class='btn btn-primary' value='eliminar-usuario' onclick='eliminarUsuario($idd,$cont)'>Eliminar</button></td>";
            echo "</tr>";  
            $cont++;
            //$cont1=$cont1+4;
            
            } 
        echo "</table>
              </div>";     
        }
          else
          {
            echo'<div class="alert alert-danger">Cero resultados</div>';
          }       
}
function mostrar_usuarios()
{
  $bd=new Database();
  $sql ="select u.Id_user, u.usuario, u.contrasena,u.tipo,e.nombre from usuarios u INNER JOIN empleados e on u.empleados_id_empleado=e.id_empleado;";
  $resultado=$bd->ejecutar($sql);
      $cont=0;
     //$cont1=0;
      echo "<div class='table-responsive'>
                <table class='table table-bordered table-hover table-condensed table table-striped'>
                <tr>
                  <th>Usuario</th><th>Tipo de usuario</th><th>Nombre de empleado</th><th>Eliminar</th>
                </tr>";
            
            while($fila=mysqli_fetch_array($resultado))
            {
  
            $idd = $fila['Id_user'];
            $usuario = $fila['usuario'];
            $contrasena = $fila['contrasena']; 
            $tipo = $fila['tipo'];
            $nombre = $fila['nombre'];  
            echo "<tr>";
            echo "<td > $usuario</td>";
            echo "<td > $tipo</td>";  
            echo "<td > $nombre</td>";
            //echo "<td><button type='button' class='btn btn-primary' value='actualizar-usuario' onclick='actualizarUsuario($idd,$cont1)'>Actualizar</button></td>";
            echo "<td><button type='button' class='btn btn-primary' value='eliminar-usuario' onclick='eliminarUsuario($idd,$cont)'>Eliminar</button></td>";
            echo "</tr>";  
            $cont++;
            //$cont1=$cont1+4;
  
            } 
        echo "</table>
              </div>";      
}

function cerrar_login() 
{
  session_start();
  session_unset();
  session_destroy();
}

}
?>
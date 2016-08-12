<?php
require_once('../../programacion/clases/Administrador.php');

if($_REQUEST['valor']=='agregar-usuario')
{
	$nombreU = $_REQUEST['nombreU'];
  $encriptar = $_REQUEST['password'];
  $password= hash('sha512',$encriptar); 
  $tipoE = $_REQUEST['tipoE'];
  $idEmpleado = $_REQUEST['idEmpleado'];

	$admin=new Administrador();
  $admin-> agregar_usuario($nombreU,$password,$tipoE,$idEmpleado);
  //$admin-> mostrar_usuarios();
 // echo "Datos ingresados correctamente";
    
}

if($_REQUEST['valor']=='eliminar-usuario')
  {
    $idUsuario=$_REQUEST['idUsuario'];

      $admin=new Administrador();
      $admin->eliminar_usuario($idUsuario);
      $admin->mostrar_usuarios();
      echo "Datos eliminados correctamente"; 
  } 

if ($_REQUEST['valor']=='buscar-usuario') 
  {
    $buscarUsuario = $_REQUEST['buscarUsuario'];

    $admin=new Administrador();
    $admin->buscar_usuario($buscarUsuario);
  }

if($_REQUEST['valor']=='refrescarU')
  {
      $admin=new Administrador();
      $admin-> mostrar_usuarios();
  }

 ?>
<?php
require_once ('../../programacion/clases/Administrador.php');

if($_REQUEST['valor']=='iniciar-sesion')
{
    $usuario = htmlspecialchars( $_POST['usuario']);
    $contrasena =  htmlspecialchars($_REQUEST['contrasena']);
    
    $admin=new Administrador();	
    $admin->sesion_login($usuario,$contrasena);
}

if($_REQUEST['valor']=='logout')
{
    
    $admin=new Administrador();	
    $admin->cerrar_login();
    echo' cerrar sesion';
}
?>
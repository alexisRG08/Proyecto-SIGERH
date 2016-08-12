<?php 
require_once('../../programacion/conexion/DataBase.php');
require_once('../../programacion/clases/Administrador.php');
$bd=new DataBase();
session_start();
/*if(isset($_SESSION['usuario'])) 
{ 
  echo $_SESSION['usuario'];
} 
else 
{   
       echo "Usuario no registrado"; 
       header ("Location:../../index.php");
       exit(); 
}*/
?>

<!DOCTYPE html>
<html lang="en">
       <head>
	        <meta charset="UTF-8">
	        <title>usuarios</title>
          <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
          <!--<link rel="stylesheet" href="../../css/bootstrap.min.css"/>
          <link rel="stylesheet" href="../../css/estilos.css"/>-->
          <script src="../../programacion/JavaScript/JsUsuarios.js"></script>
      </head>
   <body>
          <div class="container">
	           <button class="btn btn-primary" data-toggle="modal" data-target="#ventana_01">Nuevo usuario</button>	
             <button class="btn btn-primary" data-toggle="modal" data-target="#ventana_02">Lista de usuarios</button>

 <!--**************************************************************Alta usuario******************************************************************** -->              
             <div class="modal fade" id="ventana_01" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
							         <div class="modal-header">
                            <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="exampleModalLabel">Nuevo usuario</h4>
         			              <form>
                            <div class="form-group">
                              <label for="usuario-name" class="control-label">Usuario:</label>
                              <input type="text" class="form-control" id="name-usuario" placeholder="Nombre del usuario" required="required">
                           </div>
                           <div class="form-group">
                             <label for="password-name" class="control-label">Password:</label>
                             <input type="password" class="form-control" id="password" placeholder="Password del empleado" required="required">
                           </div>
                           <div class="form-group">
                             <label for="area-name" class="control-label">Empleado:</label>
                             <input type="number" class="form-control" id="num-empleado" placeholder="Id del empleado" required="required">
                          </div>
                          <div class="form-group">
                               <label for="area-name" class="control-label">Nivel usuario:</label>
                               <select  id="tipo-usuario" class="form-control" required="required">
                                 <option selected="selected">Seleccionar opción</option>
                                 <option value="1">Administrador</option>
                                 <option value="2">Empleado</option>          
                               </select>
		                      </div>
                         
                         <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button class="btn btn-primary"  value="agregar-usuario"onclick="agregarUsuario()"> Agregar usuario</button>
                          </div>
                          </form>
         		           	 <div id="mensaje_usuario"></div> 
                         </div>
                      </div><!-- cierra modal-header-->
                    </div><!-- cierra modal-content-->
                </div><!-- cierra modal-dialog-->
           </div><!-- cierra modal-fade-->
             
<!--**************************************************************Actualizar / Eliminar Usuario***************************************** -->           
<div class="modal fade" id="ventana_02" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Lista de usuarios</h4>
                <div class="modal-body">
                  <form>
                      <div class="form-group">
                        <label for="bus-us" class="control-label">Buscar Usuarios</label>
                        <input type="text" class="form-control" id="buscar-usuarios" placeholder="Buscar usuario">
                      </div>
                      <div class="form-group">
                      <button type="button" class="btn btn-primary" onClick="buscarUsuario()" value="buscar-usuario">Buscar Usuarios</button>
                      </div>
                      <div class="form-group" id="tabla_usuarios">
                      <?php
                        $admin=new Administrador();
                        $admin->mostrar_usuarios();
                      ?> 
                      </div>
                  </form>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                  <div id="resultadoUsuario">
                    
                  </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container-->    
	
  </body>
</html>
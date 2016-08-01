<?php 
require_once('../../programacion/conexion/DataBase.php');
$bd=new DataBase();
?>

<!DOCTYPE html>
<html lang="en">
       <head>
	        <meta charset="UTF-8">
	        <title>usuarios</title>
          <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
          <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
          <link rel="stylesheet" href="../../css/estilos.css"/>
      </head>
   <body>
          <div class="container">
	           <button class="btn btn-primary" data-toggle="modal" data-target="#ventana_01">Nuevo usuario</button>	
             <button class="btn btn-primary" data-toggle="modal" data-target="#ventana_02">Actualizar / Eliminar usuario</button>

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
                              <input type="text" class="form-control" id="usuario" placeholder="Usuario del empleado">
                           </div>
                           <div class="form-group">
                             <label for="password-name" class="control-label">Password:</label>
                             <input type="password" class="form-control" id="password" placeholder="Password del empleado">
                           </div>
         			          	 <div class="form-group">
         			               <label for="area-name" class="control-label">Area:</label>
                             <select  id="area_usu" class="form-control" value="mostrar_departamento" onchange="mostrar_departamento();" autocomplete="on">
                                <option  selected="true">Selecciona el area</option>
                                 <?php
                                    
                                    $sql="select * from area";
                                    $resultados=$bd->ejecutar($sql); 
                                    while($row=mysqli_fetch_array($resultados))
                                        {
                                           echo "<option value='".$row['id_area']."'>".$row['nombre_area']."</option>";
                                       //   echo "<option value='".$row['id_area']."'>";
                                       //   echo $row['nombre_area'];
                                       //   echo "</option>";
                                         
                                        } 

                                                                   ?>

                              </select>
                           </div>
                           <label for="departamento-name" class="control-label">Departamento:</label>
                           <div class="form-group" id="depto_r">
                              <select   id="empleado3" class="form-control"  value="mostrar_empleado" onchange="mostrar_empleado();">
                              <option value=""  selected="selected">mostrar</option>
                              </select>
                           </div>
                             <div class="form-group">
                               <label for="area-name" class="control-label">Empleado:</label>
                               <select  id="tipo_usuario" class="form-control">
                                  <option value=""  selected="selected"></option>
                               </select>
                          </div>

                          <div class="form-group">
                               <label for="area-name" class="control-label">Nivel usuario:</label>
                               <select  id="tipo_usuario" class="form-control">
                                  <option value=""  selected="selected">Seleccionar opción</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 
                               </select>
		                      </div>
                         </form>
                               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                         <button class="btn btn-success"  value="agregar_usuario"onclick="agregar_usuario()"> Agregar usuario</button>
         		           	 <div id="mensaje_usuario"></div>
                         </div>
                      </div><!-- cierra modal-header-->
                    </div><!-- cierra modal-content-->
                </div><!-- cierra modal-dialog-->
           </div><!-- cierra modal-fade-->
      
                       <div id="buscar">
                       
                       </div>         
<!--**************************************************************Generar reporte de capacitacion***************************************** -->           
<div class="modal fade" id="ventana_02" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Actualizar / Eliminar usuario</h4>
                <div class="modal-body">
                  <form>
                      
                  </form>

                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
                    <div id="resultadoDia">
                    
                    </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container-->    
	
  </body>
</html>
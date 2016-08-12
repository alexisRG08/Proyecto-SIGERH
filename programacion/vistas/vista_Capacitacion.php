<?php 
require_once('../../programacion/conexion/DataBase.php');
require_once('../../programacion/clases/Administrador.php');
$bd=new Database();
session_start();
if(isset($_SESSION['usuario'])) 
{ 
 // echo $_SESSION['usuario'];
} 
else 
{   
       echo "Necesita loguearse"; 
       exit();   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Capacitacion</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
  <!--<link rel="stylesheet" href="../../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../../css/estilos.css"/>-->
  <script src="../../programacion/JavaScript/JsCapacitaciones.js"></script>
</head>
<body>                             
	<div class="container">

    <?php
    if(isset($_SESSION['usuario'])) 
{ 
 echo "<button class='btn btn-primary' data-toggle='modal' data-target='#ventana1'>Nueva capacitacion</button>  ";
 echo "<button class='btn btn-primary' data-toggle='modal' data-target='#ventana2'>Ver Capacitaciones</button>  ";
  echo "<button class='btn btn-primary' data-toggle='modal' data-target='#ventana3'>Reporte de capacitaciones</button>  ";

} 
else 
{   
   //    echo "Usuario no registrado"; 
         
}
    ?>
   <!-- 	<button class="btn btn-primary" data-toggle="modal" data-target="#ventana1">Nueva capacitacion</button>  
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventana2" >Ver capacitaciones</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventana3">Reporte de capacitaciones</button>  -->
    </div>    
<!--**************************************************************Nueva capacitacion***************************************** -->           
<div class="modal fade" id="ventana1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Nueva capacitacion</h4>
                <div class="modal-body">
                  <form>
                      <div class="form-group">
                          <label for="nombre-cap" class="control-label">Nombre de la capacitacion:</label>
                          <input type="text" class="form-control" id="cap-nombre" name="capnombre" placeholder="Nombre de la capacitacion" required="required">
                      </div>
                      <div class="form-group">
                          <label for="fecha-cap" class="control-label">Fecha de la capacitacion:</label>
                          <input type="date" class="form-control" id="cap-fecha" name="capfecha" required="required">
                      </div>
                      <div class="form-group">
                          <label for="hora-cap" class="control-label">Hora de la capacitacion:</label>
                          <input type="time" class="form-control" id="cap-hora" name="caphora" required="required">
                      </div>
                      <div class="form-group">
                      <label for="lugar-cap" class="control-label">Lugar de la capacitacion:</label>
                        <select  id="cap-lugar" name="caplugar" class="form-control" >
                          <option value="Area de entrevistas">Area de entrevistas</option>
                          <option value="Area de capacitacion">Area de capacitacion</option>
                          <option value="Area de RH">Area de RH</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="desc-cap" class="control-label">Descripcion</label>
                        <input type="text" class="form-control" id="cap-desc" name="capdesc" placeholder="Agrega una descripcion" required="required">
                      </div>
              
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" onClick="agregarCapacitaciones()" value="agregar-capacitaciones">Agregar empleado</button>
                  </div>
                   </form>
                  <div id="resultadoCap">
                    
                  </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!--*************************************************************Tabla de capacitaciones***************************************** -->           
<div class="modal fade" id="ventana2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel"><center>Control de Capacitaciones</center></h4>
                <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="bus-cap" class="control-label">Buscar Capacitaciones</label>
                    <input type="text" class="form-control" id="buscar-capacitaciones" placeholder="Buscar capacitaciones">
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" onClick="buscarCapacitacion()" value="buscar-capacitacion">Buscar capacitacion</button>
                  </div>
                  <div class="form-group" id="tabla_capacitaciones">
                    <?php
                      $admin=new Administrador();
                      $admin-> mostrar_capacitaciones();
                    ?> 
                  </div>
                </form>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                  <div id="">
                    
                  </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container-->
<!--**************************************************************Generar reporte de capacitacion***************************************** -->           
<div class="modal fade" id="ventana3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Reporte de capacitacion</h4>
                <div class="modal-body">
                  <form>
                      
                  </form>

                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                 <button type="button" class="btn btn-success" data-dismiss="modal">Generar reporte</button>
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
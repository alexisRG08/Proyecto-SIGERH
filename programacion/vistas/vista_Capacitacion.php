<?php 
require_once('../../programacion/conexion/DataBase.php');
$bd=new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Capacitacion</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
  <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../../css/estilos.css"/>
</head>
<body>                             
	<div class="container">
    	<button class="btn btn-primary" data-toggle="modal" data-target="#ventana1">Nueva capacitacion</button>  
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventana2" >Ver capacitaciones</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventana3">Reporte de capacitaciones</button>
<!--**************************************************************Nueva capacitacion***************************************** -->           
<div class="modal fade" id="ventana1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Nueva capacitacion</h4>
                <div class="modal-body">
                  <form class="miform"  name="form" action="programacion/controlador/ControllerCapacitaciones.php" method="post">
                      <div class="form-group">
                          <label for="nombre-cap" class="control-label">Nombre de la capacitacion:</label>
                          <input type="text" class="form-control" id="capnombre" name="capnombre" placeholder="Nombre de la capacitacion" required="required"  onpaste="return false" autocomplete="off">
                      </div>
                      <div class="form-group">
                          <label for="fecha-cap" class="control-label">Fecha de la capacitacion:</label>
                          <input type="date" class="form-control" id="capfecha" name="capfecha">
                      </div>
                      <div class="form-group">
                          <label for="hora-cap" class="control-label">Hora de la capacitacion:</label>
                          <input type="time" class="form-control" id="caphora" name="caphora">
                      </div>
                      <div class="form-group">
                      <label for="area-name" class="control-label">Lugar de la capacitacion:</label>
                        <select  id="caplugar" name="caplugar" class="form-control" >
                          <option >Area de entrevistas</option>
                          <option >Area de capacitacion</option>
                          <option >Area de RH</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="area-name" class="control-label">empleado</label>
                        <select  id="capempleado" name="capempleado" class="form-control" >
                          <option >1</option>
                          <option >2</option>
                          <option >3</option>
                        </select>
                      </div>
                  
                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="submit"  name="submit" class="btn btn-success"  value="Agregar Capacitaciones">
                </form>

              <!--  <button type="button" class="btn btn-success" data-dismiss="modal">Agregar capacitacion</button>  -->
              </div>
                    <div id="resultadoDia">
                    
                    </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!--**************************************************************Ver capacitacion***************************************** -->           
<div class="modal fade" id="ventana2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel"><center>Control de Capacitaciones</center></h4>
                <div class="modal-body">
                       <div class="form-group">
                            <label for="curp-empleado" class="control-label">Buscar Capacitación</label>
                         <a href="#" data-toggle="tooltip" title="Busca un evento"><input type="text" class="form-control" id="buscar" placeholder="Buscar capacitación"></a> <br>
                            <button   class="btn btn-primary btn-lg" type="submit"   value="agregar-empleado">Buscar</button>
                          </div>

                  <table class="table table-bordered" >
                            <thead >
                         <tr>
                         <th>Nombre</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Lugar</th>
                          <th>Empleado</th>
                        </tr>
                        </thead>
                        <?php 
                    $query = "SELECT * FROM  capacitaciones;";
                    $conectar=mysqli_connect("localhost","root","root","mydb");
                    $tildes = $conectar->query("SET NAMES 'utf8'"); 
                    $result = mysqli_query($conectar, $query);
                    while ($fila = mysqli_fetch_array($result)){
                    $nombre = $fila['tipo_capacitacion'];
                    $fecha = $fila['fecha']; 
                    $hora = $fila['hora'];
                    $lugar = $fila['lugar']; 
                    $idempleado = $fila['empleados_id_empleado']; 
                   echo "<tr>";
                    echo "<td><center> $nombre</center></td>";
                    echo "<td> <center>$fecha</center></td>";
                   echo "<td><center> $hora</center></td>";
                   echo "<td><center> $lugar</center></td>";
                   echo "<td><center> $idempleado</center></td>";
                    echo "</tr>";    
     }
                    mysqli_free_result($result);
                   mysqli_close($conectar);
?>     
                      </table>

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
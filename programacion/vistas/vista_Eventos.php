<?php
require_once('../../programacion/conexion/DataBase.php');
require_once('../../programacion/clases/Administrador.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Eventos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
<!--	<link rel="stylesheet" href="../../css/bootstrap.min.css"/> -->
<link rel="stylesheet" href="../../css/tablas.css"/>  
   <script src="../ProyectoRH/programacion/JavaScript/EventosJS.js"></script>
   <script src="../ProyectoRH/programacion/vistas/paginador.js"></script>
    <style type="text/css">
   a{
  text-decoration:underline;
  cursor:pointer;
}
    </style>
</head>
<body>
	<!-------------------------Inicio de botones para el modal-------------------------------------->                           
	<div class="container">
    	<button class="btn btn-primary" data-toggle="modal" data-target="#informacion">Nuevo evento</button>  
      <button class="btn btn-primary" data-toggle="modal" data-target="#informacion2">Ver eventos</button>
      <button class="btn btn-primary" data-toggle="modal" data-target="#informacion3">Reporte de eventos</button>

<!-- ------------------------------ Formulario de Nuevo evento--------------------- -->            
<div class="modal fade" id="informacion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" >
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="exampleModalLabel">Nuevo Evento</h4>
                <div class="modal-body">
                       <form>
                          <div class="form-group">
                            <label for="evtnombre" class="control-label">Nombre del evento:</label>
                            <input type="text" class="form-control" id="evtnombre"  placeholder="Nombre del evento" required="required"  onpaste="return false" autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label for="fecha-evento" class="control-label">Fecha:</label>
                            <input type="date" class="form-control" id="evtfecha" >
                          </div>
                          <div class="form-group">
                            <label for="hora-evento" class="control-label">Hora:</label>
                            <input type="time" class="form-control" id="evthora">
                          </div>
                          <div class="form-group">
                            <label for="depart-name" class="control-label">Descripción:</label>
                           <textarea class="form-control" id="evtdescripcion"  placeholder="Descripción del evento" required="required" ></textarea>
                          </div>
                         
                    </form>
                     <div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
             <!--  <input type="submit"  class="btn btn-success"    value="Agregar Evento"> -->
                <button type="submit" class="btn btn-success" onClick="agregareventos()" value="Agregar-Evento">Agregar Evento</button>

                <div id="resultadoevento">

                    </div>
      				</div>
                   
                </div><!-- cierra modal-body-->
			</div><!-- cierra modal-header-->
		</div><!-- cierra modal-content-->
	</div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!-- ------------------------------ Formulario de Ver eventos--------------------- -->            
<div class="modal fade" id="informacion2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel"><center>Ver Eventos</center></h4>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="curp-empleado" class="control-label">Buscar eventos</label>
                         <a href="#" data-toggle="tooltip" title="Busca un evento"><input type="text" class="form-control" id="buscar" placeholder="Busca un evento"></a> <br>
                          
                          </div>
                          <div class="form-group">
                          <table id="tablaeventos" class="table table-bordered" >
                            <thead >
                         <tr>
                         <th>Nombre</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Descripción</th>
                          <th>Empleado</th>
                          <th>Eliminar</th>
                        </tr>
                        </thead>
                      
                        <?php   

                       
                   $query = "SELECT * FROM  eventoss;";
                    $conectar=mysqli_connect("localhost","root","root","mydb");
                    $tildes = $conectar->query("SET NAMES 'utf8'"); 
                    $result = mysqli_query($conectar, $query);
                    while ($fila = mysqli_fetch_array($result)){
                    $nombre = $fila['nombre'];
                    $fecha = $fila['fecha']; 
                    $hora = $fila['hora'];
                    $descripcion = $fila['descripcion']; 
                    $idempleado = $fila['empleados_id_empleado']; 
                   echo "<tr>";
                    echo "<td><center> $nombre</center></td>";
                    echo "<td> <center>$fecha</center></td>";
                   echo "<td><center> $hora</center></td>";
                   echo "<td><center> $descripcion</center></td>";
                   echo "<td><center> $idempleado</center></td>";
                   echo "<td><button   class='btn btn-primary  type='submit'   value='agregar-empleado'>Eliminar</button></td>"; 
                    echo "</tr>";   
     }
                   mysqli_free_result($result);
                   mysqli_close($conectar);

                    ?>     
                      
                         </table>
                          </div>
                        
                    
                     <div class="modal-footer">
                <button type="button" class="btn btn-default" class="btn btn-success">Cerrar</button>
              </div>
                    <div id="resultadoDia">
                    
                    </div>
                </div><!--cierra modal-body--> 
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!-- ------------------------------ Formulario de Reportes de eventos--------------------- -->            
<div class="modal fade" id="informacion3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Reporte de Eventos</h4>
                <div class="modal-body">
                  <form>
                          <div class="form-group">
                            <label for="info-dia" class="control-label">Consultar eventos:</label>
                             <select name="" id="" class="form-control" onchange="mostrar();">
                                <option value="">Sistemas</option>
                                <option value="">Adminstracion</option>
                                <option value="">Recursos Humanos</option>
                            </select>
                          </div>
                          
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
<!------------------------------------------Javascript----------------------------------------------------------------- -->

</body>
</html>
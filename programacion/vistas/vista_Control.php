<?php 
require_once('../../programacion/conexion/DataBase.php');
$bd=new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control de empleados</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
	<!--<link rel="stylesheet" href="../../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../../css/estilos.css"/>-->
  <link rel="stylesheet" type="text/css" href="../../css/tablas.css">
  <script src="../ProyectoRH/programacion/JavaScript/JsEmpleados.js"></script>
  
</head>
<body>
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Nuevo Empleado</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap">Ver Empleados</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="@getbootstrap">Bajas / Altas de Empleados</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4" data-whatever="@getbootstrap">Reporte de Empleados</button>
    		</div>
    	</div>
    </div>
<!-- ------------------------------ Formulario de Nuevo empleado--------------------- -->  
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Nuevo Empleado</h4>
                <div class="modal-body">
                  <form>
                          <div class="form-group">
                            <label for="nombre-empleado" class="control-label">Nombre del empleado:</label>
                            <input type="text" class="form-control" id="name-empleado" placeholder="Nombre del empleado" required/>
                          </div>
                          <div class="form-group">
                            <label for="apellido-empleado" class="control-label">Apellido del empleado:</label>
                            <input type="text" class="form-control" id="apellido-empleado" placeholder="Apellido del empleado">
                          </div>
                          <div class="form-group">
                            <label for="dir-empleado" class="control-label">Dirección del empleado:</label>
                            <input type="text" class="form-control" id="dir-empleado" placeholder="Dirección del empleado">
                          </div>
                          <div class="form-group">
                            <label for="tel-empleado" class="control-label">Telefono del empleado:</label>
                            <input type="number" class="form-control" id="tel-empleado" placeholder="Telefono del empleado">
                          </div>
                          <div class="form-group">
                            <label for="edad-empleado" class="control-label">Edad del empleado:</label>
                            <input type="number" class="form-control" id="edad-empleado" placeholder="Edad del empleado">
                          </div>
                          <div class="form-group">
                            <label for="fecha-nac" class="control-label">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="fecha-nac">
                          </div>
                           <div class="form-group">
                            <label for="rfc-empleado" class="control-label">RFC del empleado:</label>
                            <input type="text" class="form-control" id="rfc-empleado" placeholder="RFC del empleado">
                          </div>
                          <div class="form-group">
                            <label for="estudio-empleado" class="control-label">Nivel de estudio del empleado:</label>
                            <input type="text" class="form-control" id="estudio-empleado" placeholder="Nivel de estudio del empleado">
                          </div>
                          <div class="form-group">
                            <label for="num-empleado" class="control-label">Numero de empleado:</label>
                            <input type="number" class="form-control" id="num-empleado" placeholder="Numero del empleado">
                          </div>
                          <div class="form-group">
                            <label for="puesto-empleado" class="control-label">Puesto del empleado:</label>
                            <select id="puesto-empleado" class="form-control">
                            <option selected="selected" value="">Selecciona puestos</option>
                              <?php
                               $sql = "select distinct idTipo_empleo,Tipo from tipo_empleo;";
                             	$resultado=$bd->ejecutar($sql);
                               while($row=mysqli_fetch_array($resultado))
                                {
                                  echo"<option value='".$row['idTipo_empleo']."'>";
                                  echo $row['Tipo'];
                                  echo "</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="departamento-empleado" class="control-label">Departamento:</label>
                            <select id="departamento-empleado" class="form-control">
                            <option selected="selected" value="">Selecciona departamento</option>
                              <?php
                                  	$sql="select  iddepartamentos,nombre_departamento from departamentos;";
                                  	$resultado=$bd->ejecutar($sql);
                                    while($row=mysqli_fetch_array($resultado))
                                	{
                                  		echo"<option value='".$row['iddepartamentos']."'>";
                                  		echo $row['nombre_departamento'];
                                  		echo "</option>";
                                   	}
                                
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="curp-empleado" class="control-label">Curp del empleado:</label>
                            <input type="text" class="form-control" id="curp-empleado" placeholder="Curp del empleado">
                          </div>
                          <div class="form-group">
                            <label for="numsocial-empleado" class="control-label">Numero del seguro social del empleado:</label>
                            <input type="number" class="form-control" id="numsocial-empleado" placeholder="Numero del seguro social del empleado">
                          </div>
                     </form>
                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" onClick="agregarEmpleado()" value="agregar-empleado">Agregar empleado</button>
              </div>
                    <div id="resultadoEmpleado">
                    
                    </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!-- ------------------------------ Formulario de Ver empleados--------------------- -->            
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel"><center>CONTROL DE EMPLEADOS</center></h4>
                <div class="modal-body">
                  <form>
                      <div class="form-group">
                            <label for="curp-empleado" class="control-label">Buscar</label>
                         <a href="#" data-toggle="tooltip" title="Hooray!"><input type="text" class="form-control" id="buscar" placeholder="Buscar-empleado"></a> <br>
                            <button   class="btn btn-primary btn-lg" type="submit"   value="agregar-empleado">Buscar</button>
                          </div>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover table-condensed table table-striped">
                          <tr>
                            <th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>Edad</th><th>Fecha de nacimiento</th><th>RFC</th>
                            <th>Nivel de estudio</th><th>Numero de empleado</th><th>Puesto</th><th>Departamento</th><th>Curp</th><th>Numero del seguro social</th>
                          </tr>
                          <?php
                          $mostrar=new Administrador();
                          $mostrar->mostrar_empleados();
                     
                           ?>       
                          </table>
                        </div>  
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
<!-- ------------------------------ Formulario de bajas / altas de empleados--------------------- -->            
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Altas / Bajas de empleados</h4>
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
<!-- ------------------------------ Formulario de reporte de empleados--------------------- -->            
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Reporte de empleados</h4>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                    <label for="area-name" class="control-label">Consulta de empleados:</label>
                      <select name="" id="" class="form-control" onchange="mostrar();">
                        <option value="">Todos</option>
                        <option value="">Bajas de empleados</option>
                        <option value="">Altas de empleados</option>
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
    </div>
  </div>
</div>
<!------------------------------------------Javascript----------------------------------------------------------------- -->
<!--<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>-->
</body>
</html>
<?php
 require_once('../../programacion/conexion/DataBase.php');
require_once ('../../programacion/clases/Administrador.php');

 $bd=new DataBase();
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <title>Reloj checador</title>
		  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
      <script src="../ProyectoRH/programacion/JavaScript/JSrchecador.js"></script>
      <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
      <link rel="stylesheet" href="../../css/estilos.css"/>
 <style type="text/css">
#numberemployee{
  width: 330px;
  height: 50px;
  border-radius: 2px;
  margin-left: 10px;
   font-size: 20px;
}
#control-reloj{
font-weight: bold;
font-size: 20px;
color: black;
}
.seleccionaropcion select{
width: 200px;
}
 </style>
</head>
<body> 
	    <div class="container" >
        <div id="botones">
   <button class="btn btn-primary" data-toggle="modal" data-target="#ventana_3" id="entradas" >Ver Entradas/Salidas</button> 
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventana_4" >Reporte Entradas/Salidas</button> 
         </div>
<!--**************************************************************Registro de entrada***************************************** -->  
<!-- <div style="text-align:center;width:400px;padding:1em 0;"> <h2><a style="text-decoration:none;" href="http://www.zeitverschiebung.net/es/city/3531673"><span style="color:gray;">Hora actual en</span><br />Cancún, México</a></h2> <iframe src="http://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&timezone=America%2FCancun" width="100%" height="150" frameborder="0" seamless></iframe> <small style="color:gray;">
   </div>  -->


                    <form><br>
                      <br>
                    <div class="form-group col-md-4" >
                      <label for="entrada-empleado" id="control-reloj">Elija una opción:</label>
                      <select class="form-control" id="select_opcion">
                      <option>Entrada</option>
                      <option>Salida</option>
                      </select>
                      <br>
                      <div class="form-group">
                            <label for="num-empleado" class="control" id="control-reloj">Numero del empleado:</label>
                            <input type="number" class="form-control" id="numero_empleado" placeholder="Numero del empleado">
                      </div>
                       <button type="button" class="btn btn-primary"  onClick="registrar()" value="registrar_entsal">Registrar Hora</button>
                      <br><br>
                      <div class="form-group " id="msjregistrar">
                  </div>
                    </div>
                  </form>
                 

<div class="modal fade" id="ventana_1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Registro de entrada</h4>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="entrada-empleado" class="control-label">Numero de empleado:</label>
                      <input type="number" class="form-control" id="entrada-empleado" placeholder="Numero del empleado">
                    </div>
                  </form>
                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Registrar Entrada</button>
              </div>
                    <div id="resultadoDia">
                    
                    </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!--**************************************************************Ver entradas / salidas***************************************** -->           
<div class="modal fade" id="ventana_3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Ver Entradas / Salidas</h4>
                <div class="modal-body">
                  <form>
                     <label for="area-name" class="control-label">Consulta de entradas / salidas:</label>
                      <select name="" id="elegir_opcion" class="form-control" onchange="mostrar();">
                        <option value="">Todos</option>
                        <option value="">Entradas</option>
                        <option value="">Salidas</option>
                      </select> <br>
                   <div class="form-group" id="tabla_reloj">
                    
                    
                    </div> 
                  </form>
                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
                    <div id="msjreloj">
              
                    </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!--**************************************************************Ver entradas / salidas***************************************** -->           
<div class="modal fade" id="ventana_4" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" >
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="exampleModalLabel">Reporte de Entradas / Salidas</h4>
                <div class="modal-body">
                  <form>
                   <div class="form-group">
                    <label for="area-name" class="control-label">Consulta de entradas / salidas:</label>
                      <select name="" id="" class="form-control" onchange="mostrar();">
                        <option value="">Todos</option>
                        <option value="">Entradas de empleados</option>
                        <option value="">Salidas de empleados</option>
                      </select>
                    </div>
                  </form>
                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Generar reporte</button>
              </div>
                    <div id="msjreloj">
                    
                    </div>
                </div><!-- cierra modal-body-->
      </div><!-- cierra modal-header-->
    </div><!-- cierra modal-content-->
  </div><!-- cierra modal-dialog-->
</div>  <!-- cierra modal-fade-->
</div><!--cierra container--> 
<!--*********************************************************Javascript******************************************************* -->
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
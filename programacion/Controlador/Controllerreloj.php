<?php
require_once('../../programacion/clases/Administrador.php');

if($_REQUEST['valor']=='registrar_entsal'){
	$numero_empleado=$_POST['numero_empleado'];
	$datocombo=$_POST['datocombo'];
	$hora_entrada=$_POST['hora_entrada'];
	
	if ($datocombo==null) {
		echo '<div class="alert alert-danger">Seleccione una opción</div>';
	}else{
		if($numero_empleado==null){
			echo '<div class="alert alert-danger">Ingresa tu numero de empleado</div>';
		}else{
			if ($datocombo=="Entrada") {
				$registrar=new Administrador();
				$registrar->registrar_entrada($numero_empleado,$hora_entrada);
			}else{
				$registrar=new Administrador();
				$registrar->registrar_salida($numero_empleado,$hora_entrada);
				
			}

		}
	}
}
if($_REQUEST['valor']=='mostrar_tablareloj'){
 $opcion=$_POST['opcion'];
 $mostrartabla=new Administrador();
$mostrartabla->mostrar_opciones($opcion);
}

?>
     
<?php
require_once('../../programacion/clases/Administrador.php');
	
if($_REQUEST['valor']=='Agregar')
{
	$colaborador=$_REQUEST['colaborador'];
	$area=$_REQUEST['area'];
	$reporte=$_REQUEST['reporte'];
	$prioridad=$_REQUEST['tipoReporte'];

	 $Administrador=new Administrador();
     $Administrador->agregar_reporte($colaborador,$area,$reporte,$prioridad);
     echo '<div class=modal-body>';
     echo '<div class=alert-success>';
     echo '<br>REPORTE ENVIADO EXITOSAMENTE <br> <br>';
     echo  '</div>';
     echo  '</div>';

}
 
if($_REQUEST['valor']=='Buscar')
{
	
    
    $fecha=$_REQUEST['fecha'];
    $Administrador=new Administrador();
	
    $resultado=$Administrador->buscar_reporte($fecha);
    $cont=0;

        
       echo '<table class="table table-bordered table-hover table-condensed table table-striped">
       <tr> <th>Colaborador</th> <th>Reporte</th><th>Prioridad</th><th>Area</th><th>Fecha</th><th>Hora</th><th>Usuario</th><th>Realizado</th></tr>';
       while($fila=mysqli_fetch_array($resultado))
	              {

                 $cont++;
	               $campo1=$fila['id_mensaje'];
	               $campo2=$fila['nombre_c'];
				         $campo3=$fila['mensaje']; 
	               $campo4=$fila['tipo_mensaje'];
                 $campo5=$fila['nombre_area'];
                 $campo6=$fila['fecha_reporte'];
                 $campo7=$fila['hora_reporte'];
                  $campo8=$fila['nickname'];
	               echo "<tr>
	                              <td>".$campo2."</td>
	                              <td>".$campo3."</td>
	                              <td>".$campo4."</td>
                                <td>".$campo5."</td>
                                <td>".$campo6."</td>
                                <td>".$campo7."</td>
                                <td>".$campo8."</td>
	                              <td><button class='btn btn-success' id='btn$cont'  value='Realizado' onclick='eliminar_reporte($campo1,this)'>Realizado</button></td>
                         
                          </tr>";
	

	}
	echo '</table>';


}

if($_REQUEST['valor']=='Realizado')
{

$colaborador=$_REQUEST['col'];
echo $colaborador;
$Administrador=new Administrador();
$Administrador->eliminar_reporte($colaborador);
echo '<div>hola</div>';
}

if($_REQUEST['valor']=='BuscarPorFecha')
{

/*date_default_timezone_set("Mexico/General");
$rox=date("d-m-Y");*/
$fecha1=$_REQUEST['fecha1'];
$fecha2=$_REQUEST['fecha2'];


$Administrador=new Administrador();
$Administrador->generar_reporte($fecha1,$fecha2);
      

       /*echo '<table class="table table-bordered table-hover table-condensed table table-striped">
       <tr> <th>Colaborador</th> <th>Reporte</th><th>Tipo mensaje</th><th>Area</th><th>Fecha/Hora</th><th>Estatus</th></tr>';
        require('../../programacion/pdf/fpdf.php');
       
	   $pdf=new FPDF();
	   $pdf->AddPage('L');
       $pdf->SetFont('Arial','B',12);
       $pdf->Ln(10);
       $pdf->Cell(0,0,'REPORTES',0,0,'C');
       $pdf->Ln(5);
       $pdf->SetXY(130,25);
       $pdf->Cell(0,0,'Fecha:',0,1);
       $pdf->SetXY(145,25);
       $pdf->Cell(0,0,$rox,0,1);
       $pdf->image('../../logo2.png',10,10,30,20);
       $pdf->Ln(15);
       $pdf->cell(45,12,'Colaborador',1,0);
       $pdf->cell(85,12,'Reporte',1,0,'C');
       $pdf->cell(30,12,'Tipo',1,0,'C');
       $pdf->cell(40,12,'area',1,0,'C');
       $pdf->cell(45,12,'Hora/Fecha',1,0,'C');
       $pdf->cell(30,12,'Estatus',1,0,'C');
       $pdf->Ln();

       while($fila=mysqli_fetch_array($resultado))
	              {
                   $campo2=$fila['nombre'];
				   $campo3=$fila['mensaje']; 
	               $campo4=$fila['tipo_mensaje'];
	               $campo5=$fila['area'];
	               $campo6=$fila['hora_fecha'];
	               $campo7=$fila['estatus_reporte'];
	               echo "<tr>
	                              <td>".$campo2."</td>
	                              <td>".$campo3."</td>
	                              <td>".$campo4."</td>
	                              <td>".$campo5."</td>
	                              <td>".$campo6."</td>
	                              <td>".$campo7."</td>
	                              
                         
                          </tr>";
 	
   $pdf->cell(45,12,$campo2,1,0);
   $pdf->cell(85,12,$campo3,1,0);
   $pdf->cell(30,12,$campo4,1,0);
   $pdf->cell(40,12,$campo5,1,0);
   $pdf->cell(45,12,$campo6,1,0);
   $pdf->cell(30,12,$campo7,1,0);

 $pdf->Ln();
}
	
	echo '</table>';
    

				$pdf->Output('../../programacion/archivo.pdf','F');*/
			 
}

?>

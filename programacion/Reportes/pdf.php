<?php
require_once('class.ezpdf.php');
 
 $bd_host = "localhost:3306"; 
	$bd_usuario = "root"; 
	$bd_password = "root"; 
	$bd_base = "rhumanos"; 
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error con la conexión"); 
	mysql_select_db($bd_base, $con) or die("Error al seleccionar db");
	$sql="select*from eventos;";
	
	$resSql=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());
	
$pdf = new Cezpdf('A4');
$pdf->selectFont('fonts/Helvetica.afm');
	
	while($row=mysql_fetch_row($resSql)){
		$data[]=array('Nombre'=>$row[0], 'Fecha'=>$row[1],'Hora'=>$row[2],'Descripcion'=>$row[3]);
	}
	$titles=array('Depto'=>'Depto', 'num_tickets'=>'Tickets','abiertos'=>'abiertos','cerrados'=>'cerrados');
	
$pdf->ezText('<b>Eventos</b>',14,array('justification'=>'center'));

$pdf->ezSetY(780);
$pdf->ezTable($data);
$pdf->ezStream();
?>
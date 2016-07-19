
<?php
require_once('jpgraph/jpgraph.php');
require_once('jpgraph/jpgraph_bar.php');
require_once('../../programacion/conexion/DataBase.php');

$data= new Database();
$query="select * from software";
$result=$data->ejecutar($query);

while($fila=mysqli_fetch_array($result))
{
    $dato[]=$fila['id_software'];
	$label[]=$fila['nombre_sw'];	
}
$grafico=new Graph(800,400,'auto');
$grafico->setScale("textint");
$grafico->title->set("Graficas alumnos");
$grafico->xaxis->title->set("carrera");
$grafico->xaxis->setTicKLabels($label);
$grafico->yaxis->title->set("alumnos");

$barplot1 = new BarPlot($dato);
$barplot1->setfillGradient("#BE81F7","#E3CEF6",GRAD_HOR);
$barplot1->setwidth(30);
$grafico->add($barplot1);
$grafico->stroke();
?>
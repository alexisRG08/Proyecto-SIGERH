<?php
require_once('../../programacion/conexion/DataBase.php');
$bd=new DataBase();

$q=$_POST['q'];

$sql="select * from departamentos where idarea=".$q."";
$resultados=$bd->ejecutar($sql);
$res=mysql_query("select * from pais where cod_cont=".$q."",$con);

?>

<select>

<?php while($fila=mysql_fetch_array($res)){ ?>
 <option><?php echo $fila[nombre]; ?></option>
<?php } ?>

</select>
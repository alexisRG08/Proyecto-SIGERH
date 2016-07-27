<?php
require_once('../../programacion/clases/Administrador.php');
$id_evento=$_GET['id_evento'];
$eliminar=new Administrador();
$eliminar->eliminar_evento($id_evento);
$actualizar=new Administrador();
$actualizar-> mostrareventos();


?>
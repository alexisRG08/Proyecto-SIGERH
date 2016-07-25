<?php
                    $RegistrosAMostrar=4;
                      if(isset($_GET['pag'])){
                      $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
                      $PagAct=$_GET['pag'];
                    }else{
                      $RegistrosAEmpezar=0;
                      $PagAct=1;
                    }
                 // $query="SELECT * FROM eventoss ORDER BY nombre LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
                  //  $query = "SELECT * FROM  eventoss;";
                    $conectar=mysqli_connect("localhost","root","root","mydb");
                    $tildes = $conectar->query("SET NAMES 'utf8'"); 
                    $result = mysqli_query($conectar, "SELECT * FROM eventoss ORDER BY nombre LIMIT $RegistrosAEmpezar, $RegistrosAMostrar");
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
     echo "</table>";
             //   $conectar2=mysqli_connect("localhost","root","root","mydb");
                 $consulta=mysqli_query($conectar,"SELECT * FROM eventoss;");
                  $NroRegistros=mysqli_num_rows($consulta);
                  $PagAnt=$PagAct-1;
                  $PagSig=$PagAct+1;
                  $PagUlt=$NroRegistros/$RegistrosAMostrar;
                  $Res=$NroRegistros%$RegistrosAMostrar;
                  if($Res>0) $PagUlt=floor($PagUlt)+1;
                  echo "<a onclick=\"Pagina('1')\">Primero</a> ";
                  if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
                  echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
                  if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
                  echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";   
?>
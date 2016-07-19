<?php
require_once ('../../programacion/conexion/conexion.php');
class Database{ 
  
  public $conexion;
  
  public function __construct()
  {
    $this->conexionDB();
  }
  
  private function conexionDB()
  {
    if(!($this->conexion = mysqli_connect(host,usuario,contrasenia)))
    {
      printf('Error al conectar con la base de datos %s\n', mysqli_connect_errno());
      exit();
    }
    
    if(!(mysqli_select_db($this->conexion,nombre_basedatos)))
    {
      printf("Error seleccionando la base de datos");
      exit();
    }
    return $this->conexion;
  }
  
  public function cerrarConexion()
  {
    mysqli_close($this->conexion);
  }
  
    
  public function ejecutar($consulta)
  {
     mysqli_query($this->conexion,$consulta);
  }

 }

 ?>

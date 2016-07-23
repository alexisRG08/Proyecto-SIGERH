<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>SIGERH</title>
<!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">-->
<script language="javascript" src="programacion/JavaScript/JsMenu.js" type="text/javascript"> </script>
<link rel="stylesheet" href="../ProyectoRH/css/bootstrap.min.css"/>
<link rel="stylesheet" href="../ProyectoRH/css/estilos.css"/>
<script src="../ProyectoRH/programacion/JavaScript/JsEmpleados.js"></script>
 <script src="../ProyectoRH/programacion/JavaScript/EventosJS.js"></script>
<link rel="stylesheet" href="../ProyectoRH/css/tablas.css"/>

<script type="text/javascript">
function cerrar(){
 document.getElementById("slides").style.display="none"; 
 document.getElementById("list-group").style.display="none"; 
 
}
function ver(){
 document.getElementById("slides").style.display=""; 
 document.getElementById("list-group").style.display=""; 
}
</script>
</head>

<body>
	<header>
    	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    		<div class="container-fluid">
            	<div class="navbar-header">
                	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                    	<span class="sr-only">Desplegar/ocultar</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" target="_blank" class="navbar-brand" id="tam">
                    <img id="im" class="img-responsive img-thumbnail" src="../ProyectoRH/img/logo3.jpg">
                    </a>
                </div>
                <!--Aqui Inicia Menu -->
                <div class="collapse navbar-collapse" id="navegacion-fm"><!--navbar-->
                	<ul class="nav navbar-nav">
                       <li><a href="../programacion/Controlador/referencias?" id="referencia1"  value="Informacion">
                        <span value="Eventos" class="glyphicon glyphicon-list-alt"  onclick="ver()"> Eventos</span></a></li>
                        <li><a  href="../programacion/Controlador/referencias?" id="referencia2"  value="Archivos">
                          <span value="Control" class="glyphicon glyphicon-file"  onclick="ver()"> Control de Empleados</span></a></li>
                       
                        <li><a href="../../programacion/Controlador/referencias?" id="referencia3"  value="Reporteador">
                          <span class="glyphicon glyphicon-exclamation-sign"  onclick="cerrar()" value="Reloj">Reloj Checador </span></a></li>
                         <li>
                        	<a href="../../programacion/Controlador/referencias?" id="referencia4"  value="InventarioEquipo">
                            <span class="glyphicon glyphicon-folder-open"  onclick="ver()" value="Capacitacion"> Capacitacion</span>
                            </a>
                           
                        </li>
                        
                        <li><a  href="../../programacion/Controlador/referencias?"  id="referencia5" value="Usuarios"><span value="Usuarios" class="glyphicon glyphicon-user"> Usuarios</span></a></li>
                    </ul>
                </div>
            </div>
    	</nav>
    </header> 
  
    <section class="main container" >
    	<div class="row">
        	<section class="posts col-md-9">

			   <div id="referencias">
           </div>
         <div class="menu">
    			 <div class="slides" id="slides">
    				  <img src="../ProyectoRH/img/1.jpg">
        			<img src="../ProyectoRH/img/2.jpg">
        			<img src="../ProyectoRH/img/3.jpg">
			     </div>
            
            </section>
                      
             <aside class="col-md-3">
              </br>
              </br>
              </br>
              <div class="form-group">
               <label class="sr-only" for="exampleInputEmail3">Usuario</label>
                <input type="text" class="form-control" id="usuario" placeholder="Usuario">
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Contraseña</label>
                <input type="password" class="form-control" id="password">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" onclick="sesion()">Iniciar Sesion</button>
                
              </div>
        
     					
     		</aside>
        <aside class="col-md-3">
          <h4 style="color:#06C;">Siguenos en:</h4>
              <div class="list-group" id="list-group">
                <a href="http://www.facebook.com" target="_blank" class="list-group-item primero">
                        <img src="fonts/glyphicons_social/png/social-31-facebook.png"> Facebook</a>
            <a href="http://www.twitter.com" target="_blank" class="list-group-item segundo">
                        <img src="fonts/glyphicons_social/png/social-32-twitter.png">Twitter</a>
            <a href="http://www.youtube.com" target="_blank"  class="list-group-item tercero">
                        <img src="fonts/glyphicons_social/png/social-23-youtube.png"> Youtube</a>
            <a href="http://www.pinterest.com" target="_blank" class="list-group-item cuarto">
                        <img src="fonts/glyphicons_social/png/social-1-pinterest.png"> Pinterest</a>
            <a href="http://www.instagram.com" target="_blank" class="list-group-item quinto">
                        <img src="fonts/glyphicons_social/png/social-33-instagram.png"> Instagram</a>
              </div>
        </aside>      
    
         </div>
	
     </section>
     <br>
     <footer>
     	<div class="container">
        <div class="row">
                <div class="col-xs-12">
                	<!-- <a href="#" target="_blank"><img class="img-responsive center-block" src="../ProyectoRH/img/logo2.png"></a>-->
                </div>  
            </div>
             <div class="row">
            	<div class="col-xs-6">
                	
                </div>
                <div class="col-xs-6">
                	<ul class="list-inline text-right">
                    	<li><a href="">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
           </div> 
         
    </footer>
    <script src="../ProyectoRH/js/jquery.js"></script>
    <script src="../ProyectoRH/js/bootstrap.min.js"></script>
    <script src="../ProyectoRH/js/jquery.slides.js"></script>
    <script>
    $(function(){
  $(".slides").slidesjs({
    play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "fade",
        // [string] Can be either "slide" or "fade".
      interval: 3000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2500
        // [number] restart delay on inactive slideshow
    }
  });
});
  </script>
</body>
</html>

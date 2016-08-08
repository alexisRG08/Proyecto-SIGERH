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
  <script src="../ProyectoRH/programacion/JavaScript/JsCapacitaciones.js"></script>
  <script src="../ProyectoRH/programacion/JavaScript/JsUsuarios.js"></script>
  <script src="../ProyectoRH/programacion/JavaScript/Jslogin.js"></script>
  <script src="../ProyectoRH/programacion/JavaScript/JSrchecador.js"></script>
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

 window.onload = function() {
<<<<<<< HEAD
  //document.getElementById("ocultarempleados").style.display="none";  
  document.getElementById("ocultarcapcitacion").style.display="none"; 
=======
  document.getElementById("ocultarempleados").style.display="none";  
  //document.getElementById("ocultarcapcitacion").style.display="none"; 
>>>>>>> origin/master
  document.getElementById("ocultarusuarios").style.display="none";
  document.getElementById("ocultarlogout").style.display="none";  
  document.getElementById("redessociales").style.display="none"; 
  //document.getElementById("ocultareventos").style.display="none"; 


};
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
       <!--<a href="" target="" class="navbar-brand" id="tam">
        <img id="im" class="img-responsive img-thumbnail" src="../ProyectoRH/img/logoa.png"> 
      </a>-->
      <a target="" class="navbar-brand" id="tam">SIGERH</a>
    </div>
    <!--Aqui Inicia Menu -->
    <div class="collapse navbar-collapse" id="navegacion-fm"><!--navbar-->
     <ul class="nav navbar-nav">
       <li><a href="../programacion/Controlador/referencias?" id="referencia1"  value="Informacion">
        <span id="ocultareventos" value="Eventos" class="glyphicon glyphicon-list-alt"  onclick="ver()"> Eventos</span></a></li>
        <li><a  href="../programacion/Controlador/referencias?" id="referencia2"  value="Archivos">
          <span  id="ocultarempleados" value="Control" class="glyphicon glyphicon-file"  onclick="ver()"> Control de Empleados</span></a></li>
          
          <li><a href="../../programacion/Controlador/referencias?" id="referencia3"  value="Reporteador">
            <span  id="" class="glyphicon glyphicon-exclamation-sign"  onclick="cerrar()" value="Reloj">Reloj Checador </span></a></li>
            <li>
             <a href="../../programacion/Controlador/referencias?" id="referencia4"  value="InventarioEquipo">
              <span  id="ocultarcapcitacion" class="glyphicon glyphicon-folder-open"  onclick="ver()" value="Capacitacion"> Capacitacion</span>
            </a>
            
          </li>
          
          <li><a  href="../../programacion/Controlador/referencias?"  id="referencia5" value="Usuarios"><span  id="ocultarusuarios" value="Usuarios" class="glyphicon glyphicon-user"> Usuarios</span></a></li>
          <li>
            <a href="#" id="referencia4"  value="InventarioEquipo">
              <span  id="ocultarlogout"   value="Capacitacion"> Cerrar Sesión</span>
            </a>
            
          </li>




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
    
    <aside class="col-md-3" id="loginform">
     <h4 class="text-center">INICIO DE SESIÓN</h4>
   </br>
   <img class="img-circle img-responsive center-block" id="img_logo" src="img/user.png">
   <form id="forminicio">

    
    <div class="form-group">  
      <div id="div-login-msg">
        <div id="icon-login-msg" class="glyphicon glyphicon-home"></div>
        <span id="text-login-msg">Escribe tu usuario y contraseña</span>
      </div>
    </div>

    <div class="form-group">
     <label class="sr-only" for="exampleInputEmail3">Usuario</label>
     <input type="text" class="form-control" id="usuario" placeholder="Usuario" autocomplete="off">
   </div>
   <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Contraseña</label>
    <input type="password" class="form-control" id="contrasena" placeholder="Contraseña">
  </div>
  <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox"> Remember me
      </label>
    </div>
  </div>
</form>
<div class="form-group">
  <button type="submit" id="btnsesion"class="btn btn-primary" onclick="sesion()" value="iniciar-sesion">Iniciar Sesion</button>
  
</div>

<div id="mostrarmsj">
</div>


</aside>
<aside class="col-md-3" id="redessociales"><br><br>
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
          <div class="col-xs-12"><br> <br>
            <h6 class="list-inline text-center">Desarrollado por Alexis Ramírez Guzmán & Henry Morales Canche    ITIC91   </h6>
          </div>  
         <!--    </div>
             <div class="row">
            	<div class="col-xs-6">
                	
                </div>
                <div class="col-xs-6">
                	<ul class="list-inline text-left">
                    	<li><a href="">Cerrar Sesion</a></li>
                    </ul>
                </div> -->
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

var conexion3;

function sesion()
{
 // window.location="../ProyectoRH/programacion/Controlador/ControllerEmpleados.php";
 var usuario=document.getElementById('usuario').value;
  var contrasena=document.getElementById('contrasena').value;
  var valor= window.event.srcElement.getAttribute('value');
  conexion3=crearXMLHttpRequest2();
if(usuario==0){
 
 document.getElementById('usuario').style.borderColor = "red";
 document.getElementById("usuario").placeholder= "Escribir su usuario";
  document.getElementById("usuario").placeholder.color="red";

}else{
  if(contrasena==0){
    document.getElementById('usuario').style.borderColor = "black";
    document.getElementById('contrasena').style.borderColor = "red";
    document.getElementById("usuario").placeholder= "Escribir contraseña";
  }else{
    conexion3.onreadystatechange =procesariniciosesion;  
   var variables="valor="+valor+"&usuario="+usuario+"&contrasena="+contrasena;
  conexion3.open("POST", "../ProyectoRH/programacion/Controlador/login.php", true);
  conexion3.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion3.send(variables);     
  }
}
       
}
function formulario(){
 document.getElementById("ocultarempleados").style.display="";  
document.getElementById("ocultarcapcitacion").style.display=""; 
document.getElementById("ocultarusuarios").style.display="";   
document.getElementById("forminicio").style.display="none";  
document.getElementById("mostrarmsj").style.display="none"; 
document.getElementById("btnsesion").style.display="none";
document.getElementById("btncontinuar").style.display="none";
}
function procesariniciosesion()

{
  var resultad = document.getElementById('mostrarmsj'); 

  if(conexion3.readyState == 4)
  {
    resultad.innerHTML = conexion3.responseText;

  } 
  else 
  {
   
    resultad.innerHTML = 'Cargando......';
  }
}




//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent2(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else if (elemento.addEventListener)
    {
    elemento.addEventListener(nomevento,funcion,captura);
    return true;
    }
    else
    return false;
}

function crearXMLHttpRequest2() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else if (window.XMLHttpRequest) 
    xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}
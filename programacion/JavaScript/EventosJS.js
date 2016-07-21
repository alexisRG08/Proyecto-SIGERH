var conexion1;

function agregareventos()
{
  var nom_evento=document.getElementById('evtnombre').value;
  var nom_fecha=document.getElementById('evtfecha').value;
  var nom_hora=document.getElementById('evthora').value;
  var nom_descripcion=document.getElementById('evtdescripcion').value;

  var valor= window.event.srcElement.getAttribute('value');
  conexion1=crearXMLHttpRequest2();

  conexion1.onreadystatechange =procesarAgregarEvento;  
   var variables="lugar="+nomb_evento+"&fecha="+nom_fecha+"&hora="+nom_hora+"&descripcion="+nom_descripcion;
  conexion1.open("POST", "../ProyectoRH/programacion/Controlador/ControllerEmpleados.php", true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion1.send(variables);   
  limpiar_textito();
}

function limpiar_textito()
{
  alert("lalala");
}

function procesarAgregarEvento()

{
  var resultad = document.getElementById('resultadoevento'); 

  if(conexion1.readyState == 4)
  {
    resultad.innerHTML = conexion1.responseText;

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
var conexion2;

function agregareventos()
{
  var nom_evento=document.getElementById('evtnombre').value;
 var nom_fecha=document.getElementById('evtfecha').value;
  /*var nom_hora=document.getElementById('evthora').value;
  var nom_descripcion=document.getElementById('evtdescripcion').value;
  var valor= window.event.srcElement.getAttribute('value');
  conexion2=crearXMLHttpRequest2();

  conexion2.onreadystatechange =procesarAgregarEvento;  
   var datoseventos="lugar="+nomb_evento+"&fecha="+nom_fecha+"&hora="+nom_hora+"&descripcion="+nom_descripcion;
  conexion2.open("POST", "../ProyectoRH/programacion/Controlador/ControllerEmpleados.php", true);
  conexion2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion2.send(datoseventos);       */
   limpiar_textito(nom_evento);
}

function limpiar_textito(datonombre, nomfecha)
{
  alert("nombre:"+datonombre+"y la fecha de hoy es "+nomfecha);
}

function procesarAgregarEvento()

{
  var resultad = document.getElementById('resultadoevento'); 

  if(conexion2.readyState == 4)
  {
    resultad.innerHTML = conexion2.responseText;

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
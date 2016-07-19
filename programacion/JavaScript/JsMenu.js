addEvent(window,'load',inicializarMenu,false);

function inicializarMenu()
{
  var ob;
  for(f=1;f<=9;f++)
  {

    ob=document.getElementById('referencia'+f);
    addEvent(ob,'click',presionEnlaceMenu,false);
  }
}

function presionEnlaceMenu(e)
{
  if (window.event)
  {
    window.event.returnValue=false;
    var url=window.event.srcElement.getAttribute('href');
 
     cargarProtocolo(url);  	
  }
  else
   
   if (e)
    {
      e.preventDefault();
      var url=e.target.getAttribute('href');
      
      cargarProtocolo(url); 	  
    }
     
}
var conexionMenu;

function cargarProtocolo(url) 
{

  if(url=='')
  {
    return;
  }

  var ope= window.event.srcElement.getAttribute('value');
 conexionMenu=crearXMLHttpRequest();
  conexionMenu.onreadystatechange = procesarEventos;
  var urle="referen="+ope;
  conexionMenu.open("POST", "../ProyectoRH/programacion/Controlador/referencias.php", true);
  conexionMenu.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionMenu.send(urle);
}

function procesarEventos()
{
  var resultad = document.getElementById("referencias");
  if(conexionMenu.readyState == 4)
  {
    resultad.innerHTML = conexionMenu.responseText;
  } 
  else 
  {
    resultad.innerHTML = 'Cargando...';
  }
}

//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else  
    if (elemento.addEventListener)
    {
      elemento.addEventListener(nomevento,funcion,captura);
      return true;
    }
    else
      return false;
}

function crearXMLHttpRequest() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else 
    if (window.XMLHttpRequest) 
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}


var conexionC;
function agregarCapacitaciones()
{
	var nombrec = document.getElementById('cap-nombre').value;
	var fechac =document.getElementById('cap-fecha').value;
	var horac = document.getElementById('cap-hora').value;
	var lugarc = document.getElementById('cap-lugar').value;
	var descripcionc = document.getElementById('cap-desc').value;
	var valor= window.event.srcElement.getAttribute('value');
  	conexionC=crearXMLHttpRequest2();

  	conexionC.onreadystatechange =procesarAgregarCapacitaciones;
  	var variables="valor="+valor+"&nombrec="+nombrec+"&fechac="+fechac+"&horac="+horac+"&lugarc="+lugarc+"&descripcionc="+descripcionc;
  	conexionC.open("POST", "../ProyectoRH/programacion/Controlador/capacitaciones.php", true);
  	conexionC.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	conexionC.send(variables);
  	limpiar_capacitaciones();
}


function procesarAgregarCapacitaciones()
{
  var resultad = document.getElementById('tabla_capacitaciones');

  if(conexionC.readyState == 4)
  {
    resultad.innerHTML = conexionC.responseText;
    refrescar_tablaC();

  } 
  else 
  {
   
    resultad.innerHTML = 'Cargando......';
  }
}

function limpiar_capacitaciones()
{
	var nombrec = document.getElementById('cap-nombre').value="";
	var fechac =document.getElementById('cap-fecha').value="";
	var horac = document.getElementById('cap-hora').value="";
	var lugarc = document.getElementById('cap-lugar').value="";
	var descripcionc = document.getElementById('cap-desc').value="";
}

function refrescar_tablaC()
{
 
  alert('entre al metodo refrescar');
  var valor="refrescar";
  var valor= window.event.srcElement.getAttribute('value');
  var variables="valor="+valor;
  conexionC.open("POST", "../../programacion/Controlador/capacitaciones.php", true);
  conexionC.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionC.send(variables);
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
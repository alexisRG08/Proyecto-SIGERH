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

function actualizarCapacitaciones(id,cont) 
{
  alert(cont); 
  alert('id:'+id); 
  var fecha=document.getElementById('fecha'+cont).value;
  var hora=document.getElementById('hora'+cont).value;
  alert(hora);
  var celdas= document.getElementsByTagName('td'); 
  for (var i = cont; i < celdas.length; i++) 
  {
    var x=0;
    while(x<5)  
    {
     alert(celdas[i+x].innerHTML);
     x++;
    }
    conexion1=crearXMLHttpRequest2();
    conexion1.onreadystatechange=procesarActualizarCapacitacion;
    var btn=window.event.srcElement.getAttribute('value');
    alert('bton'+btn);
    var variables="&idcapacitacion="+id+'&valor='+btn+'&nombrec='+celdas[i].innerHTML+'&fechac='+fecha+'&horac='+hora+'&lugarc='+celdas[i+3].innerHTML+
    '&descripcionc='+celdas[i+4].innerHTML;
    conexion1.open("POST", "../ProyectoRH/programacion/Controlador/capacitaciones.php", true);
    conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexion1.send(variables);
    break;
  }
}

function procesarActualizarCapacitacion()
{

  var t=document.getElementById('tabla_capacitaciones');

  if(conexion1.readyState == 4)
  {
    t.innerHTML = conexion1.responseText;
    refrescar_tabla();
  } 
  else 
  { 
   t.innerHTML = 'Cargando......';
  }
}

function eliminar_fila(fila)
{
  var td=fila.parentNode;
  var tr=td.parentNode;
  var tabla=tr.parentNode;
  tabla.removeChild(tr);
}

function eliminarCapacitaciones(id,t)
{
	var mensaje=confirm("¿Desea marcar este dato como realizado?");
   	if(mensaje==true)
   	{
    alert(id);
    conexionC=crearXMLHttpRequest2();
    var valu= window.event.srcElement.getAttribute('value');
    var variables="valor="+valu+"&idcapacitacion="+id;
    conexionC.onreadystatechange=procesarEliminarCapacitacion;
    conexionC.open("POST", "../ProyectoRH/programacion/Controlador/capacitaciones.php", true);
    conexionC.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexionC.send(variables);
   }
    else
   {
    return;
   }
}

function procesarEliminarCapacitacion()
{
  
  var resultad=document.getElementById('tabla_capacitaciones');

  if(conexionC.readyState == 4)
  {
    resultad.innerHTML=conexionC.responseText;
    refrescar_tabla();

  } 
  else 
  {
    resultad.innerHTML = 'Cargando......';
  }
}

function buscarCapacitacion()
{
	var buscarCapacitacion = document.getElementById('buscar-capacitaciones').value;
	var valor= window.event.srcElement.getAttribute('value');
  	conexionC=crearXMLHttpRequest2();
  	conexionC.onreadystatechange =procesarBuscarCapacitacion;
  	var variables="valor="+valor+"&buscarCapacitacion="+buscarCapacitacion;
    conexionC.open("POST", "../ProyectoRH/programacion/Controlador/capacitaciones.php", true);
    conexionC.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	conexionC.send(variables);

	
}

function procesarBuscarCapacitacion()
{
	var resultad = document.getElementById('tabla_capacitaciones');

  	if(conexionC.readyState == 4)
  	{
    	resultad.innerHTML = conexionC.responseText;
    
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
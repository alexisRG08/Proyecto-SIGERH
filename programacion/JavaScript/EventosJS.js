var conexion2;
var conexion3;
var conexionU;
var conexion1;
var ajax;
var refrescar;
var buscando;

function agregareventos()
{
 // window.location="../ProyectoRH/programacion/Controlador/ControllerEmpleados.php";
 var nom_evento=document.getElementById('evtnombre').value;
 var nom_fecha=document.getElementById('evtfecha').value;
 var nom_hora=document.getElementById('evthora').value;
 var nom_descripcion=document.getElementById('evtdescripcion').value;
 var valor= window.event.srcElement.getAttribute('value');
 conexion2=crearXMLHttpRequest2();

 conexion2.onreadystatechange =procesarAgregarEvento;  
 var variables="valor="+valor+"&nom_evento="+nom_evento+"&nom_fecha="+nom_fecha+"&nom_hora="+nom_hora+"&nom_descripcion="+nom_descripcion;
 conexion2.open("POST", "../ProyectoRH/programacion/Controlador/ControllerEmpleados.php", true);
 conexion2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 conexion2.send(variables);        
 limpiar_variables();
}
function limpiar_variables(){
  var nom_evento=document.getElementById('evtnombre').value="";
  var nom_fecha=document.getElementById('evtfecha').value="";
  var nom_hora=document.getElementById('evthora').value="";
  var nom_descripcion=document.getElementById('evtdescripcion').value="";
}
function deletevento(id_evento){
  var eliminar = confirm("¿Esta Seguro de  eliminar este usuario?")
  if ( eliminar ) {
    ajax=crearXMLHttpRequest2();
    ajax.onreadystatechange =procesarEliminarEvento;  
    ajax.open("GET", "../ProyectoRH/programacion/Controlador/deleteevento.php?id_evento="+id_evento);
    ajax.send(null);
  }

}
function updatevento(id_evento,cont){

  var celdas=document.getElementsByTagName('td');
  for(var i=cont;i<celdas.length;i++)   // desde contador es menor al numero de celdas 
  { 
    var x=0;
    while(x<5)
    {
        //    alert(celdas[i+x].innerHTML);
        x++;
      }


      conexionU=crearXMLHttpRequest2();
       conexionU.onreadystatechange= procesar;
      var btn=window.event.srcElement.getAttribute('value');
     var variables='&valor='+btn+'&nombre='+celdas[i].innerHTML+'&fecha='+celdas[i+1].innerHTML+'&hora='+celdas[i+2].innerHTML+'&descripcion='+celdas[i+3].innerHTML+'&id_evento='+id_evento;
      conexionU.open("POST", "../ProyectoRH/programacion/Controlador/ControllerEmpleados.php", true);
      conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      conexionU.send(variables);
      break;
      
      
    }  
  }
   function procesar()
  {
    var mensaje = document.getElementById('msjeventos'); 

    if(conexionU.readyState == 4)
    {
      mensaje.innerHTML = conexionU.responseText;

    } 
    else 
    {

      mensaje.innerHTML = 'Cargando......';
    }
  }
  function refrescareventos(){
 //   alert("lal");
   // var valor="refrescar_tabla";
   buscando=crearXMLHttpRequest2();
    buscando.onreadystatechange= procesarbusqueda;
    var valor= window.event.srcElement.getAttribute('value');
    var variables="valor="+valor;
    buscando.open("POST", "../ProyectoRH/programacion/Controlador/ControllerEmpleados.php", true);
    buscando.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    buscando.send(variables);
  }
  function buscar_evento(){
  var buscarevt=document.getElementById('buscarevt').value;
  var valor= window.event.srcElement.getAttribute('value');
  buscando=crearXMLHttpRequest2();
  buscando.onreadystatechange= procesarbusqueda;
  var variables="valor="+valor+"&buscarevt="+buscarevt;
  buscando.open("POST", "../ProyectoRH/programacion/Controlador/ControllerEmpleados.php", true);
  buscando.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  buscando.send(variables);

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
   function procesarbusqueda()

  {
    var resultad = document.getElementById('tabla_eventos'); 

    if(buscando.readyState == 4)
    {
      resultad.innerHTML = buscando.responseText;

    } 
    else 
    {

      resultad.innerHTML = 'Cargando......';
    }
  }
 
  function procesarEliminarEvento()

  {
    var resultad = document.getElementById('tabla_eventos'); 

    if(ajax.readyState == 4)
    {
      resultad.innerHTML = ajax.responseText;
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
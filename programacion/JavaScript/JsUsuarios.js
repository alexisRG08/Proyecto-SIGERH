var conexionU;
/******************************FUNCION PARA MOSTRAR EL DEPARTAMENTO***************************************************************/
function mostrar_departamento()
{
   var area=document.getElementById('area_usu').value;
  alert("lal"+area);

 
  var n=document.getElementById('depto_r').style.disabled='false';
  var valu= window.event.srcElement.getAttribute('value');
  conexionU=crearXMLHttpRequest3();
  conexionU.onreadystatechange =procesarMostrarDepto;
  var variables="valor="+valu+"&area="+area;
 
  conexionU.open("POST", "../ProyectoRH/programacion/Controlador/usuarios.php", true);
  conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionU.send(variables);

}
function mostrar_empleado()
{

   var empleado=document.getElementById('empleado3').options.selectedIndex;
   alert("no es mi id  "+empleado);
 alert(empleado+"estoy llegando");
  var valu= window.event.srcElement.getAttribute('value');
   var n=document.getElementById('depto').style.disabled='false';
   conexionU=crearXMLHttpRequest3();
   conexionU.onreadystatechange =procesarMostrarDepto;
   var variables="valor="+valu+"&area="+area;
   conexionU.open("POST", "../ProyectoRH/programacion/Controlador/usuarios.php", true);
   conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   conexionU.send(variables);  
}

function procesarMostrarDepto()
{
  var resultad = document.getElementById('depto_r');
//  var resultad = document.getElementById('depto_r');

  if(conexionU.readyState == 4)
  {
    resultad.innerHTML = conexionU.responseText;

  } 
  else 
  {
    resultad.innerHTML = '';
  }
}

//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent3(elemento,nomevento,funcion,captura)
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

function crearXMLHttpRequest3() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else if (window.XMLHttpRequest) 
    xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}

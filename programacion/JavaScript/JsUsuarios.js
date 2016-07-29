var conexionU;
/******************************FUNCION PARA MOSTRAR EL DEPARTAMENTO***************************************************************/
function mostrar_departamento()
{
  var area_r=document.getElementById("area_usuario").value;
  var n=document.getElementById('depto_r').style.disabled='false';
  var valu= window.event.srcElement.getAttribute('value');
  conexionU=crearXMLHttpRequest3();
  conexionU.onreadystatechange =procesarMostrarDepto_r;
  var variables="valor="+valu+"&area="+area_r;
  conexionU.open("POST", "../ProyectoRH/programacion/Controlador/usuarios.php", true);
  conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionU.send(variables);

}
function procesarMostrarDepto_r()
{

  var areaa=document.getElementById("area").value;
  var valu= window.event.srcElement.getAttribute('value');
  alert(areaa);
  alert("mostrar");
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
  var resultad = document.getElementById('depto');
  var resultad = document.getElementById('depto_r');

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

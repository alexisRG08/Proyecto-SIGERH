addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  var ob=document.getElementById('btnagregar');
  addEvent(ob,'click',presionBoton,false);
}

function presionBoton(e)
{
  var ob1=document.getElementById('evtnombre');
  var ob2=document.getElementById('evtfecha');
  var elem3=document.getElementById('evthora');
  var elem4=document.getElementById('evtdescripción');
  var elem5=document.getElementById('evtidempleado');
  
   prueba();
  guardarevento(ob1.value,ob2.value,elem3.value,elem4.value,elem5.value);
 
}


var conexion1;
function  guardarevento(nomb,apep,amm,corr,userr,) 
{
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open("POST", "../Controlador/ControllerEmpleados.php",true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion1.send("nombre="+nomb+"&apellidop="+apep+"&apellidomater="+amm+"&email="+corr+"&user_name="+userr);
}
 function prueba(){
  alert("llegando al js");
 }
function procesarEventos()
{
  var resultados = document.getElementById("resultadoDia");
  if(conexion1.readyState == 4)
  {
    resultados.innerHTML = conexion1.responseText;
  } 
  else 
  {
    resultados.innerHTML = 'Cargando...';
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
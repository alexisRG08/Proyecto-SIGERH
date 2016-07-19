var conexion1;

function agregarEmpleado()
{
  var nombre=document.getElementById('name-empleado').value;
  var apellido=document.getElementById('apellido-empleado').value;
  var direccion=document.getElementById('dir-empleado').value;
  var telefono=document.getElementById('tel-empleado').value;
  var edad=document.getElementById('edad-empleado').value;
  var fechaNacimiento=document.getElementById('fecha-nac').value;
  var rfcEmpleado=document.getElementById('rfc-empleado').value;
  var estudio=document.getElementById('estudio-empleado').value;
  var numeroEmpleado=document.getElementById('num-empleado').value;
  var puesto=document.getElementById('puesto-empleado').value;
  var departamento=document.getElementById('departamento-empleado').value;
  var curp=document.getElementById('curp-empleado').value;
  var numsocial=document.getElementById('numsocial-empleado').value;
  var valor= window.event.srcElement.getAttribute('value');
  conexion1=crearXMLHttpRequest2();

  conexion1.onreadystatechange =procesarAgregarEmpleado;
  var variables="valor="+valor+"&nombre="+nombre+"&apellido="+apellido+"&direccion="+direccion+"&telefono="+telefono+"&edad="+edad+"&fechaNacimiento="+fechaNacimiento+"&rfcEmpleado="+rfcEmpleado+"&estudio="+estudio+"&numeroEmpleado="+numeroEmpleado+
  "&puesto="+puesto+"&departamento="+departamento+"&curp="+curp+"&numsocial="+numsocial;
  conexion1.open("POST", "../ProyectoRH/programacion/Controlador/empleados.php", true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion1.send(variables);
  limpiar_texto();
}

function limpiar_texto()
{
  var nombre=document.getElementById('name-empleado').value="";
  var apellido=document.getElementById('apellido-empleado').value="";
  var direccion=document.getElementById('dir-empleado').value="";
  var telefono=document.getElementById('tel-empleado').value="";
  var edad=document.getElementById('edad-empleado').value="";
  var fechaNacimiento=document.getElementById('fecha-nac').value="";
  var rfcEmpleado=document.getElementById('rfc-empleado').value="";
  var estudio=document.getElementById('estudio-empleado').value="";
  var numeroEmpleado=document.getElementById('num-empleado').value="";
  var puesto=document.getElementById('puesto-empleado').value="";
  var departamento=document.getElementById('departamento-empleado').value="";
  var curp=document.getElementById('curp-empleado').value="";
  var numsocial=document.getElementById('numsocial-empleado').value="";
}

function procesarAgregarEmpleado()

{
  var resultad = document.getElementById('resultadoEmpleado');

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
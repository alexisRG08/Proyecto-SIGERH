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
  var puesto=document.getElementById('puesto-empleado').value;
  var departamento=document.getElementById('departamento-empleado').value;
  var curp=document.getElementById('curp-empleado').value;
  var numsocial=document.getElementById('numsocial-empleado').value
  var estado=document.getElementById('estado-empleado').value;
  var valor= window.event.srcElement.getAttribute('value');
  conexion1=crearXMLHttpRequest2();

  conexion1.onreadystatechange =procesarAgregarEmpleado;
  var variables="valor="+valor+"&nombre="+nombre+"&apellido="+apellido+"&direccion="+direccion+"&telefono="+telefono+"&edad="+edad+"&fechaNacimiento="+fechaNacimiento+"&rfcEmpleado="+rfcEmpleado+"&estudio="+estudio+
  "&puesto="+puesto+"&departamento="+departamento+"&curp="+curp+"&numsocial="+numsocial+"&estado="+estado;
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
  var puesto=document.getElementById('puesto-empleado').value="";
  var departamento=document.getElementById('departamento-empleado').value="";
  var curp=document.getElementById('curp-empleado').value="";
  var numsocial=document.getElementById('numsocial-empleado').value="";
  var estado=document.getElementById('estado-empleado').value="";
}

function refrescar_tabla()
{
 
  alert('entre al metodo refrescar');
  var valor="Refrescar";
  var valor= window.event.srcElement.getAttribute('value');
  var variables="valor="+valor;
  conexion1.open("POST", "../ProyectoRH/programacion/Controlador/empleados.php", true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion1.send(variables);
}

function procesar1()

{

  var t=document.getElementById('tabla_empleados');

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

function procesarAgregarEmpleado()

{
  var resultad = document.getElementById('resultadoEmpleado');

  if(conexion1.readyState == 4)
  {
    resultad.innerHTML = conexion1.responseText;
    refrescar_tabla();

  } 
  else 
  {
   
    resultad.innerHTML = 'Cargando......';
  }
}

function actualizarEmpleado(id,cont) 
{
  alert(cont); 
  alert('id:'+id); 
  var celdas= document.getElementsByTagName('td'); 
  for (var i = cont; i < celdas.length; i++) 
  {
    var x=0;
    while(x<13) 
    {
     alert(celdas[i+x].innerHTML);
     x++;
    }
    conexion1=crearXMLHttpRequest2();
    conexion1.onreadystatechange=procesar1;
    var btn=window.event.srcElement.getAttribute('value');
    alert('bton'+btn);
    var variables="&id_empleado="+id+'&valor='+btn+'&nombre='+celdas[i].innerHTML+'&apellido='+celdas[i+1].innerHTML+'&direccion='+celdas[i+2].innerHTML+'&telefono='+celdas[i+3].innerHTML+
    '&edad='+celdas[i+4].innerHTML+'&fechaNacimiento='+celdas[i+5].innerHTML+'&rfcEmpleado='+celdas[i+6].innerHTML+'&estudio='+celdas[i+7].innerHTML+'&curp='+celdas[i+10].innerHTML+
    '&numsocial='+celdas[i+11].innerHTML;
    conexion1.open("POST", "../ProyectoRH/programacion/Controlador/empleados.php", true);
    conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexion1.send(variables);
    break;
  }
}


function eliminar_fila(fila)
{
  var td=fila.parentNode;
  var tr=td.parentNode;
  var tabla=tr.parentNode;
  tabla.removeChild(tr);
}


function eliminarEmpleado(id,t)
{
   var mensaje=confirm("¿Desea marcar este dato como realizado?");
   if(mensaje==true)
   {
    conexion1=crearXMLHttpRequest2();
    var valu= window.event.srcElement.getAttribute('value');
    var variables="valor="+valu+"&id_empleado="+id;
    conexion1.onreadystatechange=procesareliminar;
    conexion1.open("POST", "../ProyectoRH/programacion/Controlador/empleados.php", true);
    conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexion1.send(variables);
    refrescar_tabla();
   
   }
    else
   {
    return;
   }
}

function procesareliminar()
{
  
  var contenedor=document.getElementById('tabla_empleados');

  if(conexion1.readyState == 4)
  {
    contenedor.innerHTML=conexion1.responseText;
    refrescar_tabla();

  } 
  else 
  {
    resultad.innerHTML = 'Cargando......';
  }
}

function buscarEmpleado()
{ 
  var buscaEmpleado = document.getElementById('buscar-empleado').value;
  alert(buscaEmpleado);

  var valor= window.event.srcElement.getAttribute('value');
  conexion1=crearXMLHttpRequest2();
  conexion1.onreadystatechange =procesarBuscarEmpleado;
  var variables="valor="+valor+"&buscaEmpleado="+buscaEmpleado;
    conexion1.open("POST", "../ProyectoRH/programacion/Controlador/empleados.php", true);
    conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexion1.send(variables);


}
function procesarBuscarEmpleado()
{
  var resultad = document.getElementById('tabla_empleados');

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
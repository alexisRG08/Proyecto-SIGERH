var conexionU;

function agregarUsuario()
{
  var nombreU = document.getElementById('name-usuario').value;
  var password = document.getElementById('password').value;
  var idEmpleado = document.getElementById('num-empleado').value;
  var tipoE = document. getElementById('tipo-usuario').value;
  var valor= window.event.srcElement.getAttribute('value');
  conexionU=crearXMLHttpRequest2();

  conexionU.onreadystatechange =procesarAgregarUsuario;
  var variables="valor="+valor+"&nombreU="+nombreU+"&password="+password+"&idEmpleado="+idEmpleado+"&tipoE="+tipoE;
  conexionU.open("POST", "../ProyectoRH/programacion/Controlador/usuarios.php", true);
  conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionU.send(variables);
  limpiar_usuarios(); 
}

function procesarAgregarUsuario()
{
  var resultad = document.getElementById('mensaje_usuario');

  if(conexionU.readyState == 4)
  {
  resultad.innerHTML = conexionU.responseText;

  refrescar_tablaU();
  // alert(conexionU.responseText);

  } 
  else
  {
    resultad.innerHTML = 'Cargando......'; 
  }
}

function eliminar_fila(fila)
{
  var td=fila.parentNode;
  var tr=td.parentNode;
  var tabla=tr.parentNode;
  tabla.removeChild(tr);
}

function eliminarUsuario(id,t)
{
  var mensaje=confirm("¿Desea eliminar al usuario?");
    if(mensaje==true)
    {
    alert(id);
    conexionU=crearXMLHttpRequest2();
    var valu= window.event.srcElement.getAttribute('value');
    var variables="valor="+valu+"&idUsuario="+id;
    conexionU.onreadystatechange=procesarEliminarUsuario;
    conexionU.open("POST", "../ProyectoRH/programacion/Controlador/usuarios.php", true);
    conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexionU.send(variables);
   }
    else
   {
    return;
   }
}

function procesarEliminarUsuario()
{
  
  var resultad=document.getElementById('tabla_usuarios');

  if(conexionU.readyState == 4)
  {
    resultad.innerHTML=conexionU.responseText;
    refrescar_tablaU();

  } 
  else 
  {
    resultad.innerHTML = 'Cargando......';
  }
}


function buscarUsuario()
{
  var buscarUsuario = document.getElementById('buscar-usuarios').value;
  var valor= window.event.srcElement.getAttribute('value');
    conexionU=crearXMLHttpRequest2();
    conexionU.onreadystatechange =procesarBuscarUsuario;
    var variables="valor="+valor+"&buscarUsuario="+buscarUsuario;
    conexionU.open("POST", "../ProyectoRH/programacion/Controlador/usuarios.php", true);
    conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexionU.send(variables);

  
}

function procesarBuscarUsuario()
{
  var resultad = document.getElementById('tabla_usuarios');

    if(conexionU.readyState == 4)
    {
      resultad.innerHTML = conexionU.responseText;
    
    } 
    else 
    {
   
      resultad.innerHTML = 'Cargando......';
    }
}

function limpiar_usuarios()
{
  var nombreU = document.getElementById('name-usuario').value="";
  var password = document.getElementById('password').value="";
  var idEmpleado = document.getElementById('num-empleado').value="";
  var tipoE = document.getElementById('tipo-usuario').value="";
}

function refrescar_tablaU()
{

  var valor="refrescarU";
  var valor= window.event.srcElement.getAttribute('value');
  var variables="valor="+valor;
  conexionC.open("POST", "../../programacion/Controlador/usuarios.php", true);
  conexionC.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionC.send(variables);
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

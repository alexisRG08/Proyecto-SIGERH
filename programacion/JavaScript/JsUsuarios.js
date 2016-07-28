var conexionU;
function buscador()
{
  conexionU=crearXMLHttpRequest3();
  conexionU.onreadystatechange=procesarVerUsuarios;             
  conexionU.open("POST", "../SecretsTheVine/programacion/vistas/buscar_Usuarios.php", true);
  conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionU.send(null);
}

function procesarVerUsuarios()
{
  var resultad = document.getElementById('buscar');

  if(conexionU.readyState == 4)
  {
    resultad.innerHTML = conexionU.responseText;
borrar_datos();
  } 
  else 
  {
   
    resultad.innerHTML = 'Cargando......';
  }
}
function agregar_usuario()
{
  var usuario=document.getElementById('usuario').value;
  var password=document.getElementById('password').value; 
  var depto=document.getElementById('departamento').value;
  var tipo_usuario=document.getElementById('tipo_usuario').value;
  var valu= window.event.srcElement.getAttribute('value');
  conexionU=crearXMLHttpRequest3();

     if((usuario==null || password==null || depto==null ||tipo_usuario==null ) 
       || (usuario.length == 0 || password.length == 0 ||  depto.length == 0 || tipo_usuario.length == 0)
       ||(/^\s+$/.test(usuario) || /^\s+$/.test(password) || /^\s+$/.test( depto) || /^\s+$/.test(tipo_usuario)))
     {
        alert("Falto llenar algun dato");
         return;
     }
     else
     {
  conexionU.onreadystatechange =procesarAgregarUusario;
  var variables="valor="+valu+"&usuario="+usuario+"&password="+password+"&departamento="+depto+"&tipo_usuario="+tipo_usuario;
  conexionU.open("POST", "../SecretsTheVine/programacion/Controlador/usuarios.php", true);
  conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  conexionU.send(variables);
     }
}
function procesarAgregarUusario()
{
  var resultad = document.getElementById('mensaje_usuario');

  if(conexionU.readyState == 4)
  {
    resultad.innerHTML = conexionU.responseText;
borrar_datos();
  } 
  else 
  {
   
    resultad.innerHTML = 'Cargando......';
  }
}

function borrar_datos()
{
var usuario=document.getElementById('usuario').value='';
  var password=document.getElementById('password').value='';
  var area=document.getElementById('area').value=''; 
  var depto=document.getElementById('departamento').disabled=true;
  var tipo_usuario=document.getElementById('tipo_usuario').value='';

}
function mostrar_departamento()
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

  if(conexionU.readyState == 4)
  {
    resultad.innerHTML = conexionU.responseText;

  } 
  else 
  {
   
    resultad.innerHTML = '';
  }
}

function actualizar_usuario(id,cont)
{
  alert(cont);
  alert('id:'+id);
   var celdas=document.getElementsByTagName('td'); //obtiene las etiquetas td
   for(var i=cont;i<celdas.length;i++)   // desde contador es menor al numero de celdas 
      { 
        var x=0;
        while(x<2)
          {
            alert(celdas[i+x].innerHTML);
            x++;
          }
    
      conexionU=crearXMLHttpRequest3();
     conexionU.onreadystatechange= procesar;
      var btn=window.event.srcElement.getAttribute('value');
     var variables='valor='+btn+'&usuario='+celdas[i].innerHTML+'&contrasenia='+celdas[i+1].innerHTML+'&id='+id;
     conexionU.open("POST", "../SecretsTheVine/programacion/Controlador/usuarios.php", true);
    conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
     conexionU.send(variables);
     break;
  }

}

function procesar()
{
   var resultad = document.getElementById('respuesta');
 if(xmlHttp.readyState == 4)//  podemos leer la respuesta del servidor y utilizarla. estado del la peticion 4 OK
  {
    if(xmlHttp.status==200) // estado de la pagina es correcto 
    {
      resultad.innerHTML = xmlHttp.responseText;// nos mostrara el texto en el div+  responseText retorna la respuesta del servidor
    }
  } 
 else // cuando aun no ha cambiado al estado 4 que es listo
  {
    resultad.innerHTML = 'Cargando ...';

 
  }
}


function eliminar_fila(fila)
{
var td=fila.parentNode;
var tr=td.parentNode;
var tabla=tr.parentNode;
tabla.removeChild(tr);
}


function eliminar_usuario(id,t)
{
alert (id);

   conexionU=crearXMLHttpRequest3();
   var valu= window.event.srcElement.getAttribute('value');
   var variables="valor="+valu+"&colaborador="+id;
   conexionU.open("POST", "../SecretsTheVine/programacion/Controlador/usuarios.php", true);
   conexionU.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   var mensaje=confirm("Desea marcar este reporte como realizado");

   if(mensaje==true)
   {
    conexionU.send(variables);
    eliminar_fila(t);
   conexionU.responseText;

   }
   else
   {
    return;
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

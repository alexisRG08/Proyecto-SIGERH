var conexion;
var conexion2;

function registrar(){
	var numero_empleado=document.getElementById('numero_empleado').value;
	var ahora = new Date();
	if(ahora.getMinutes()<=9){
		var hora_entrada=ahora.getHours()+":"+"0"+ahora.getMinutes();
	}else{
       var hora_entrada=ahora.getHours()+":"+ahora.getMinutes();
	var datocombo=document.getElementById('select_opcion').options[document.getElementById('select_opcion').selectedIndex].text
	var valor= window.event.srcElement.getAttribute('value');
	conexion=crearXMLHttpRequest2();
	conexion.onreadystatechange =procesaregistrar;  
	var variables="valor="+valor+"&numero_empleado="+numero_empleado+"&datocombo="+datocombo+"&hora_entrada="+hora_entrada;
	conexion.open("POST", "../ProyectoRH/programacion/Controlador/Controllerreloj.php", true);
    conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   conexion.send(variables);
   limpiar_texto();  
	}
}
function mostrar(){
	var opcion=document.getElementById('elegir_opcion').options[document.getElementById('elegir_opcion').selectedIndex].text
	var valor="mostrar_tablareloj";
	//var valor= window.event.srcElement.getAttribute('value');
	//alert(opcion);
	conexion2=crearXMLHttpRequest2();
	conexion2.onreadystatechange =procesarmostrar;  
	var variables="valor="+valor+"&opcion="+opcion;
	conexion2.open("POST", "../ProyectoRH/programacion/Controlador/Controllerreloj.php", true);
    conexion2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   conexion2.send(variables);
}
function limpiar_texto(){
	var numero_empleado=document.getElementById('numero_empleado').value="";
}
function procesaregistrar()

{
	var resultad = document.getElementById('msjregistrar'); 
	if(conexion.readyState == 4)
	{
		resultad.innerHTML = conexion.responseText;
	} 
	else 
	{
		resultad.innerHTML = 'Cargando......';
	}
}

function procesarmostrar()

{
	var resultad = document.getElementById('tabla_reloj'); 
	if(conexion2.readyState == 4)
	{
		resultad.innerHTML = conexion2.responseText;
	} 
	else 
	{
		resultad.innerHTML = 'Cargando......';
	}
}

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
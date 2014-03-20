// Esconde menus
var x;
x=$(document);
x.ready(inicializar);

function inicializar(){
	var x=$("#btnMenu");
	var y=$("#btnMenu2");
	x.click(desplegar);
	y.click(desplegar2);
}
//menu superior
function desplegar(){
	var x=$("#encabezado");
	x.slideToggle("fast");
}
//menu izquierdo
function desplegar2(){
	var x=$("#menu");
	x.slideToggle("fast");
}

//Función para quitar saltos de linea y espacios a ambos lados de un texto.
String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g,'') }

//Cambia el signo a las etiquetas del menu


x.ready(iniciar);

function iniciar(){
	var x=$("#btnMenu");
	var y=$("#btnMenu2");
	x.click(escribir);
	y.click(escribir2);
}
//menu derecho
function escribir(){;
	var x=$("#btnMenu").html();
	var x=x.trim();
	
	if(x == "<br>&lt;"){
		$("#btnMenu").html("<br>&gt");
	}else{
		$("#btnMenu").html("<br>&lt");
	}
}

//menu izquierdo
function escribir2(){
	var x=$("#btnMenu2").html();
	var x=x.trim();
	
	if(x == "<br>&lt;"){
		$("#btnMenu2").html("<br>&gt");
	}else{
		$("#btnMenu2").html("<br>&lt");
	}
}

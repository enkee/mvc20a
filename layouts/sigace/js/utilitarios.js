// JavaScript Document

function contraer(valor){
	
	for(i=0;i<=CollapsiblePanel.length-1;i++)
	{
		if (i==valor)
		{
		}
		else
		{
			CollapsiblePanel[i].close();
		}
	}
}

function luz(valor){
	 valor.style.background="#CC3300";
	}
	
function todosombra(){
	var etiarray = document.querySelectorAll("td#eti");
	for (i=0; i<=etiarray.length-1;i++){
		etiarray[i].style.background="";
	}
	}
	
function sombra(valor){
	 valor.style.background="";	
	}
	

function printiframe() {
   
   if (window.frames['report'] == null){
    alert('document not found');}
   else {
    window.frames['report'].focus();
    window.frames['report'].print();
   }
  }

function reSize(){
	try{
		var oBody = contenido.document.body;
		var oFrame = document.all("contenido");
		
		oFrame.style.height = oBody.scrollHeight + (oBody.offsetHeight - oBody.clientHeight)+2;
		}
	catch(e)
		{
		document.getElementById("contenido").height = window.frames.contenido.document.body.offsetHeight+2;
	}
} 

function fecha()
{
var fecha=new Date();
var diames=fecha.getDate();
var diasemana=fecha.getDay();
var mes=fecha.getMonth() +1 ;
var ano=fecha.getFullYear();

var textosemana = new Array (7); 
  textosemana[0]="Domingo";
  textosemana[1]="Lunes";
  textosemana[2]="Martes";
  textosemana[3]="Miércoles";
  textosemana[4]="Jueves";
  textosemana[5]="Viernes";
  textosemana[6]="Sábado";

var textomes = new Array (12);
  textomes[1]="Enero";
  textomes[2]="Febrero";
  textomes[3]="Marzo";
  textomes[4]="Abril";
  textomes[5]="Mayo";
  textomes[6]="Junio";
  textomes[7]="Julio";
  textomes[8]="Agosto";
  textomes[9]="Septiembre";
  textomes[10]="Octubre";
  textomes[11]="Noviembre";
  textomes[12]="Diciembre";

document.write(textosemana[diasemana] + ", " + diames + " de " + textomes[mes] + " de " + ano + "<br>");
}


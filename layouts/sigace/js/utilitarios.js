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
//Ajustar contenido a ventana.
$(function(){
  //$('#contenido').css({ height: $(window).innerHeight()});
  //$('#izquierda, #principal, #derecha').css({ height: $('#contenido').innerHeight() });
  
  $(window).resize(function(){
    //$('#contenido').css({ height: $(window).innerHeight() });
    //$('#izquierda, #principal, #derecha').css({ height: $('#contenido').innerHeight() });
  });
});

//cloning a principal menu from a page
$(function(){
    $('#menu_show').html($('#menu_hide').html());
});


//menu usuario hover
$(function(){
    $(".menucito li").hover(function(){
        //$(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    }, function(){
        //$(this).removeClass("hover");
        $('ul:first',this).css('visibility', 'hidden');
    });
    
    $("ul#datos li ul li:has(ul)").find("a:first").append(" &raquo; ");
});

//menu usuario click
jQuery(window).load(function() {
   $("#datos > li > a").click(function (e) { // binding onclick
        if ($(this).parent().hasClass('selected')) {
            $("#datos .selected .menucito").css('visibility', 'hidden'); // hiding popups
            $("#datos .selected").removeClass("selected");
        } else {
            
            if ($(this).next("ul").length) {
                $(this).parent().addClass("selected"); // display popup
                $(this).next("ul").css('visibility', 'visible');
            }
        }
        e.stopPropagation();
    });
    $("body").click(function () { // binding onclick to body
        $("#datos .menucito").css('visibility', 'hidden'); // hiding popups
        $("#datos .selected").removeClass("selected");
    });
    
    $("#tempo").click(function(){
        if($("#derecha").hasClass("derecha_h")){
            $("#derecha").removeClass("derecha_h").addClass("derecha_s");
        }else{
            $("#derecha").removeClass("derecha_s").addClass("derecha_h");
        }
    });
});


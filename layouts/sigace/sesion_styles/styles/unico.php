<?
	switch($_SESSION['micss']){
		case "dexter":
        	$font_family="arial";
			$font_grueso="bold";
			$color1="red";
			$color2="blue";
			$tamano1="10px";
			$tamano2="14px";
    		break;
			
		case "didi":
        	
    		break;
			
		case "dibujo":
        	
    		break;
			
		case "grafo":
        	
    		break;
			
		case "metal":
			
    		break;
			
		case "sistema":
			
    		break;
					
		default:
			$font_family="verdana";
			$font_grueso="normal";
			$color1="green";
			$color2="orange";
			$tamano1="20px";
			$tamano2="16px";
    		break;
	}	
?>

<style type="text/css">
	* {font-family: <? echo $font_family ?>;}
	body{
		background-color:<? echo $color1 ?>;
	}
	
	p{
		font-size:<? echo $tamano1 ?>;
		font-weight:<? echo $font_grueso ?>;
	}
	
</style>
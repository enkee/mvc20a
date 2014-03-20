<?PHP
function generar_color($rgb){ 
    //extrec les 3 parts del color: 
    $vermell= substr($rgb,1,2); 
    $verd = substr($rgb,3,2); 
    $blau = substr($rgb,5,2); 
     
    //Converteixo de hexadecimal a decimal 
    $enter_vermell= hexdec($vermell); 
    $enter_verd= hexdec($verd); 
    $enter_blau= hexdec($blau); 
     
    //Valor que li sumarem o restarem a cada component rgb: 
    $valor = hexdec(22); 
     
    //Calculo l'umbral del color. 
    $umbral = 255/2; //7F en hexadecimal. 
     
    //Calculo la foscor del color entrat: 
    $foscor= ($enter_vermell + $enter_verd + $enter_blau) /3; 
     
    //El color és clar. Per tant tenim que enfosquirlo restant-li el $valor en cada component rgb. 
    if($foscor >= $umbral){ 
        $enter_vermell = ($enter_vermell-$valor<00) ? 00 : $enter_vermell-$valor; 
        $enter_verd = ($enter_verd-$valor<00) ? 00 : $enter_verd-$valor; 
        $enter_blau = ($enter_blau-$valor<00) ? 00 : $enter_blau-$valor; 
        //if($enter_vermell-$valor<00){ $nou_enter_vermell = 00; } else { $enter_vermell=$enter_vermell-$valor; } 
        //if($enter_vermell-$valor<00){ $nou_enter_vermell = 00; } else { $enter_vermell=$enter_vermell-$valor; } 
    } 
     
    //El color és fosc. Per tant tenim que aclararlo sumant-li el $valor en cada component rgb. 
    else{ 
        $enter_vermell = ($enter_vermell+$valor>255) ? 255 : $enter_vermell+$valor; 
        $enter_verd = ($enter_verd+$valor>255) ?  255 : $enter_verd+$valor; 
        $enter_blau = ($enter_blau+$valor>255) ?  255 : $enter_blau+$valor; 
    } 
    $vermell=dechex($enter_vermell); 
    $verd=dechex($enter_verd); 
    $blau=dechex($enter_blau); 
     
    $rgb="#".$vermell.$verd.$blau; 
    return $rgb; 
} 

?>
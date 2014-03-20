<?php

//Funcion que carga las clases del core de la aplicacion
function autoloadCore($class){
    if(file_exists(APP_PATH . ucfirst(strtolower($class)) . '.php')){
        include_once APP_PATH . ucfirst(strtolower($class)) . '.php';
    
    }  
}

function autoloadLibs($class){
    if(file_exists(ROOT . 'libs' . DS . 'class.' . strtolower($class) . '.php')){
        include_once ROOT . 'libs' . DS . 'class.' . strtolower($class) . '.php';
    }  
}
//Registra funciones de tipo Autoload
 spl_autoload_register('autoloadCore');
 spl_autoload_register('autoloadLibs');

?>

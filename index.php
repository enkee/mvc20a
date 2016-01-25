<?php

//ini_set('display_errors', E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors',1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);


try{
    require_once APP_PATH . 'Autoload.php';
    require_once APP_PATH . 'Config.php';
   
    Session::init();
    
    //Instancia del registro
    $registry = Registry::getInstancia();
    //Adjunta una instacia del Request en el arreglo data
    $registry->_request = new Request();
    $registry->_db = new Database();
    //$registry->_dbs = new Database('sistema');
    $registry->_dbMod = $registry->dataBases();
    $registry->_acl = new ACL();
    
    
    Bootstrap::run($registry->_request);
}
catch(Exception $e){
    echo $e->getMessage();
}

?>
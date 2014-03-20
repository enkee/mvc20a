<?php

class indexController extends cetproController
{
    private $_cetpros;
    //inicializa las variables de la aplicación 
    public function __construct() 
    {
        parent::__construct();
        $this->_cetpros = $this->loadModel('index');
    }
    //Muestra la vista index de usuario
    public function index()
    {
        $this->_acl->acceso('nuevo_post');
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //coloca el titulo de usuario
        $this->_view->assign('titulo', 'CETPROS');
        //asigna los usuarios a la variable usuarios
        $this->_view->assign('cetpros', $this->_cetpros->getCetpros());
        //renderiza la vista index con el item usuarios
        $this->_view->renderizar('index', 'cetpros');
    }
}

?>

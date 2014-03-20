<?php

class modulosController extends Controller
{
    private $_modulos;
    
    public function __construct() {
        parent::__construct();
        $this->_modulos = $this->loadModel('modulos');
    }
    
    public function index() {
        $this->_acl->acceso('modulos');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo','Modulos');
        $this->_view->renderizar('index','modulos');
    }
    
}

?>

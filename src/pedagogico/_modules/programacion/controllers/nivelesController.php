<?php

class nivelesController extends Controller
{
    private $_niveles;
    
    public function __construct() {
        parent::__construct();
        $this->_niveles = $this->loadModel('niveles');
    }
    
    public function index() {
        $this->_acl->acceso('niveles');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo','Niveles');
        $this->_view->renderizar('index','niveles');
    }
    
}

?>

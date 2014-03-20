<?php

class calendarioController extends Controller
{
    private $_calendario;
    
    public function __construct() {
        parent::__construct();
        $this->_calendario = $this->loadModel('calendario');
    }
    
    public function index() {
        $this->_acl->acceso('calendario');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo', 'Calendario');
        $this->_view->renderizar('index','calendario');
    }
    
    
}

?>

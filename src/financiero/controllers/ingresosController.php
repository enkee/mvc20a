<?php

class ingresosController extends Controller
{
    private $_ingresos;
    
    public function __construct() {
        parent::__construct();
        $this->_ingresos = $this->loadModel('ingresos');
    }
    
    public function index()
    {
        $this->_acl->acceso('ingresos');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo','Ingresos');
        $this->_view->renderizar('index','ingresos');
    }
    
    
}

?>

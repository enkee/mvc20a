<?php

class especialidadesController extends Controller
{
    private $_especialidades;
    
    public function __construct() {
        parent::__construct();
        $this->_especialidades = $this->loadModel('especialidades');
    }
    
    public function index() {
        $this->_acl->acceso('especialidades');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo','Especialidades');
        $this->_view->renderizar('index','especialidades');
    }
    
}

?>

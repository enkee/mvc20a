<?php

class matriculasController extends Controller
{
    private $_matriculas;
    
    public function __construct()
    {
        parent::__construct();
        $this->_matriculas = $this->loadModel('matriculas');
    }
    
    public function index()
    {
        $this->_acl->acceso('matriculas');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo', 'Matriculas');
        $this->_view->renderizar('index', 'matriculas');
    }
    
}

?>

<?php
class egresosController extends Controller
{
    private $_egresos;
    
    public function __construct() {
        parent::__construct();
        $this->_egresos = $this->loadModel('egresos');
    }
    
    public function index()
    {
        $this->_acl->acceso('egresos');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo','Egresos');
        $this->_view->renderizar('index','egresos');
    }
    
    
}

?>

<?php
require(dirname(__FILE__) . '/usuariosController.php');

class personalController extends usuariosController
{    
    //inicializa las variables de la aplicación
    public function __construct() 
    {
        parent::__construct();
        $this->_usuarios = $this->loadModel('personal');
    }
    //carga la vista index de usuarios.
    public function index()
    {
        $this->_acl->acceso('personal');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo','Personal');
        $this->_view->renderizar('index','personal');
    }
}

?>

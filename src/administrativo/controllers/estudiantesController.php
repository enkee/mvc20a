<?php
require(dirname(__FILE__) . '/usuariosController.php');

class estudiantesController extends usuariosController
{    
    //inicializa las variables de la aplicación
    public function __construct() 
    {
        parent::__construct();
        $this->_usuarios = $this->loadModel('estudiantes');
    }
    //carga la vista index de usuarios.
    public function index()
    {
        $this->_acl->acceso('estudiantes');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo','Estudiantes');
        $this->_view->renderizar('index','estudiantes');
    }
}

?>

<?php

class indexController extends Controller
{
    private $_usuarios;
    //inicializa las variables de la aplicación 
    public function __construct() 
    {
        parent::__construct();
        $this->_usuarios = $this->loadModel('index');
    }
    //Muestra la vista index de usuario
    public function index()
    {
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //coloca el titulo de usuario
        $this->_view->assign('titulo', 'Usuarios');
        //asigna los usuarios a la variable usuarios
        $this->_view->assign('usuarios', $this->_usuarios->getUsuarios());
        //renderiza la vista index con el item usuarios
        $this->_view->renderizar('index', 'usuarios');
    }
    
}

?>

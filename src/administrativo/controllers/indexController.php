<?php

class indexController extends Controller
{
    //inicializa las variables de aplicación
    public function __construct() {
        parent::__construct();
    }
    //contruye la vista de inicio
    public function index()
    {
        //print_r($this->_view->getLayoutPositions());
        $this->_view->assign('titulo', 'Portada');
        /* Llamada al widget 'menu', y su metodo 'menu' que renderiza la vista menu-right
        en la vista principal index como la variable widget*/
        //$this->_view->assign('widget', $this->_view->widget('menu', 'getMenu'));
        $this->_view->renderizar('index', 'inicio');
    }
}

?>
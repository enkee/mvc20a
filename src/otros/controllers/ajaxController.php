<?php

class ajaxController extends Controller
{
    private $_ajax;
    //Inicializa las varibles de la aplicación 
    public function __construct() {
        parent::__construct();
        //$this->_view->setTemplate('twb');
        $this->_view->setWidgetOptions('menu-top', array('top', 'top', true));
        $this->_ajax = $this->loadModel('ajax');
        
    }
    //LLama a la vista de ejemplo ajax
    public function index()
    {
        $this->_view->assign('titulo', 'Ejemplo de AJAX');
        //Incluye los archivos js.
        $this->_view->setJs(array('ajax'));
        //crea la variable paises.
        $this->_view->assign('paises', $this->_ajax->getPaises());
        $this->_view->renderizar('index', 'ajax');
    }
    //Devuelve las ciudades de un pais
    public function getCiudades()
    {
        if($this->getInt('pais'))
        //Devuele un objeto json que se carga en tiempo real
        echo json_encode($this->_ajax->getCiudades($this->getInt('pais')));
    }
    //Inserta una ciudad con su respectivo pais.
    public function insertarCiudad()
    {
        if($this->getInt('pais') && $this->getSql('ciudad')){
            $this->_ajax->insertarCiudad(
                    $this->getSql('ciudad'),
                    $this->getInt('pais')
                    );
        }
    }
}
?>

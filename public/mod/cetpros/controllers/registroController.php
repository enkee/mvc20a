<?php

class registroController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
    }
    
    public function index()
    {
        /*
        if(Session::get('autenticado')){
            $this->redireccionar();
        }*/
        //restringe el acceso
        $this->_acl->acceso('nuevo_cetpro');
        //carga archivos js
        $this->_view->setJs(array('prueba'));
        
        //asigna el titulo a la vista
        
        $this->_view->assign('titulo', 'Registro CETPRO');
        
        //comprueba si se ha envia el formulario.
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            
            //comprueba si ha escrito nombre de cetpro
            if(!$this->getSql('nombre')){
                $this->_view->assign('_error', 'Debe introducir un nombre de cetpro');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si ha escrito el tipo de cetpro
            if(!$this->getAlphaNum('tipo')){
                $this->_view->assign('_error', 'Debe introducir un tipo de cetpro');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //verifica si nombre de nombre de cetpro ya existe
            if($this->_registro->verificarCetpro($this->getAlphaNum('nombre'))){
                $this->_view->assign('_error', 'El CETPRO ' . $this->getAlphaNum('nombre') . ' ya existe');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si se ha generado unaclave
            if(!$this->formatPermiso('clave')){
                $this->_view->assign('_error', 'Debe generar una clave');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si la clave existe
            if($this->_registro->verificarClaveCetpro($this->getAlphaNum('clave'))){
                $this->_view->assign('_error', 'Esta clave ya existe');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            $this->_registro->registrarCetpro(
                    $this->getSql('nombre'),
                    $this->getAlphaNum('tipo'),
                    $this->getSql('clave')
                    );
            //verifica si el usuario ha sido guardado
            $cetpro = $this->_registro->verificarCetpro($this->getAlphaNum('nombre'));
            //si el cetpro no ha sido guardado entonces se produce un error y se muestra la vista index de registro
            if(!$cetpro){
                $this->_view->assign('_error', 'Error al registrar el CETPRO');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //Borra los valores de la variable datos y se muestra el mensaje de registro completado 
            $this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', 'Registro Completado!');
        }        
        //muestra la vista index de registro ( con los cuadros vacios)
        $this->_view->renderizar('index', 'registro');
    }
    
    public function verificar($uni=null)
    {
        echo 'hola verificar ' . $uni;
    }
}

?>

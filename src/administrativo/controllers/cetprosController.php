<?php

class cetprosController extends Controller
{
    private $_cetpros;
    //inicializa las variables de la aplicación 
    public function __construct() 
    {
        parent::__construct();
        $this->_cetpros = $this->loadModel('cetpros');
    }
    //Muestra la vista index de usuario
    public function index()
    {
        $this->_acl->acceso('cetpros');
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //coloca el titulo de usuario
        $this->_view->assign('titulo', 'CETPROS');
        //asigna los usuarios a la variable usuarios
        $this->_view->assign('cetpros', $this->_cetpros->getCetpros());
        //renderiza la vista index con el item usuarios
        $this->_view->renderizar('index', 'cetpro');
    }
    
    public function nuevo()
    {
        /*
        if(Session::get('autenticado')){
            $this->redireccionar();
        }*/
        //restringe el acceso
        $this->_acl->acceso('agregar_cetpro');
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
                $this->_view->renderizar('registro', 'cetpro');
                exit;
            }
            //comprueba si ha escrito el tipo de cetpro
            if(!$this->getAlphaNum('tipo')){
                $this->_view->assign('_error', 'Debe introducir un tipo de cetpro');
                $this->_view->renderizar('registro', 'cetpro');
                exit;
            }
            //verifica si nombre de nombre de cetpro ya existe
            if($this->_registro->verificarCetpro($this->getAlphaNum('nombre'))){
                $this->_view->assign('_error', 'El CETPRO ' . $this->getAlphaNum('nombre') . ' ya existe');
                $this->_view->renderizar('registro', 'cetpro');
                exit;
            }
            //comprueba si se ha generado unaclave
            if(!$this->formatPermiso('clave')){
                $this->_view->assign('_error', 'Debe generar una clave');
                $this->_view->renderizar('registro', 'cetpro');
                exit;
            }
            //comprueba si la clave existe
            if($this->_registro->verificarClaveCetpro($this->getAlphaNum('clave'))){
                $this->_view->assign('_error', 'Esta clave ya existe');
                $this->_view->renderizar('registro', 'cetpro');
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
                $this->_view->renderizar('registro', 'cetpro');
                exit;
            }
            //Borra los valores de la variable datos y se muestra el mensaje de registro completado 
            $this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', 'Registro Completado!');
        }        
        //muestra la vista index de registro ( con los cuadros vacios)
        $this->_view->renderizar('registro', 'cetpro');
    }
    
    public function verificar($uni=null)
    {
        echo 'hola verificar ' . $uni;
    }
}

?>

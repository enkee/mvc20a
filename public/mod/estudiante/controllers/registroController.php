<?php

class registroController extends estudianteController
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
        //asigna el titulo a la vista
        $this->_acl->acceso('nuevo_estudiante');
        $this->_view->assign('titulo', 'Estudiante');
        
        //comprueba si se ha envia el formulario.
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            //comprueba si ha escrito su nombre
            if(!$this->getSql('nombre')){
                $this->_view->assign('_error', 'Debe introducir su nombre');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            //comprueba si ha escrito su nombre de usuario
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre usuario');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            //verifica si nombre de usuario ya existe
            if($this->_registro->verificarEstudiante($this->getAlphaNum('usuario'))){
                $this->_view->assign('_error', 'El estudiante ' . $this->getAlphaNum('usuario') . ' ya existe');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            //comprueba si el  correo electronico esta bien escrito
            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'La direccion de email es inv&aacute;lida');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            //comprueba si ya existe el correo electronico
            if($this->_registro->verificarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'Esta direccion de correo ya esta registrada');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            //comprueba si ha escrito su password
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            //comprueba si los password coinsiden
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->assign('_error', 'Los passwords no coinciden');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            
            //Realiza el registro del estudiante
            $this->_registro->registrarEstudiante(
                    $this->getSql('nombre'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email')
                    );
            //verifica si el estudiante ha sido guardado
            $estudiante = $this->_registro->verificarEstudiante($this->getAlphaNum('usuario'));
            //si el estudiante no ha sido guardado entonces se produce un error y se muestra la vista index de registro
            if(!$estudiante){
                $this->_view->assign('_error', 'Error al registrar el estudiante');
                $this->_view->renderizar('index', 'estudiante');
                exit;
            }
            
            //se asigna al la variable datos el valor false y se muestra el mensaje de registro completado 
            $this->_view->assign('datos', true);
        }        
        //muestra la vista index de registro
        $this->_view->renderizar('index', 'estudiante');
    }
    
}

?>

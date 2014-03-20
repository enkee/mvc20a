<?php

class registroController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
        $this->_view->setTemplate('twb');
        $this->_view->setWidgetOptions('menu-top', array('top', 'top', true));
    }
    
    public function index()
    {
        /*
        if(Session::get('autenticado')){
            $this->redireccionar();
        }*/
        //asigna el titulo a la vista
        $this->_view->assign('titulo', 'Registro');
        
        //comprueba si se ha envia el formulario.
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            //comprueba si ha escrito su nombre
            if(!$this->getSql('nombre')){
                $this->_view->assign('_error', 'Debe introducir su nombre');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si ha escrito su nombre de usuario
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre usuario');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //verifica si nombre de usuario ya existe
            if($this->_registro->verificarUsuario($this->getAlphaNum('usuario'))){
                $this->_view->assign('_error', 'El usuario ' . $this->getAlphaNum('usuario') . ' ya existe');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si el  correo electronico esta bien escrito
            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'La direccion de email es inv&aacute;lida');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si ya existe el correo electronico
            if($this->_registro->verificarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'Esta direccion de correo ya esta registrada');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si ha escrito su password
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //comprueba si los password coinsiden
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->assign('_error', 'Los passwords no coinciden');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //crea un objeto nuevo de php mailer
            $mail = new PHPMailer();
            //Realiza el registro del usuario
            $this->_registro->registrarUsuario(
                    $this->getSql('nombre'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email')
                    );
            //verifica si el usuario ha sido guardado
            $usuario = $this->_registro->verificarUsuario($this->getAlphaNum('usuario'));
            //si el usuario no ha sido guardado entonces se produce un error y se muestra la vista index de registro
            if(!$usuario){
                $this->_view->assign('_error', 'Error al registrar el usuario');
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            //Define variables del objeto phpmailer y los manda al correo electronico
            $mail->From = 'www.mvc.dlancedu.com';
            $mail->FromName = 'Tutorial MVC';
            $mail->Subject = 'Activacion de cuenta de usuario';
            $mail->Body = 'Hola <strong>' . $this->getSql('nombre') . '</strong>,' .
                        '<p>Se ha registrado en www.mvc.dlancedu.com para activar ' .
                        'su cuenta haga clic sobre el siguiente enlace:<br>' .
                        '<a href="' . BASE_URL .'registro/activar/' . 
                        $usuario['id'] . '/' . $usuario['codigo'] . '">' .
                        BASE_URL .'registro/activar/' . 
                        $usuario['id'] . '/' . $usuario['codigo'] .'</a>' ;

            $mail->AltBody = 'Su servidor de correo no soporta html';
            $mail->AddAddress($this->getPostParam('email'));
            $mail->Send();
            //se asigna al la variable datos el valor false y se muestra el mensaje de registro completado 
            $this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', 'Registro Completado, revise su email para activar su cuenta');
        }        
        //muestra la vista index de registro
        $this->_view->renderizar('index', 'registro');
    }
    
    
    //activa la cuenta modificando la base de datos
    public function activar($id, $codigo)
    {
        //si no exite el id o codigo entonces muetra un error de cuenta inexistente
        //y renderiza a la vista activar registro
        if(!$this->filtrarInt($id) || !$this->filtrarInt($codigo)){
            $this->_view->assign('_error', 'Esta cuenta no existe');
            $this->_view->renderizar('activar', 'registro');
            exit;   
            }
        //guarda una fila con la consuta de conseguir usuario
        $row = $this->_registro->getUsuario(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );
        //si no existe la fila entonces se produce un error de cuenta inexistente
        if(!$row){
            $this->_view->assign('_error', 'Esta cuenta no existe');
            $this->_view->renderizar('activar', 'registro');
            exit;
        }
        //si el estado del usuario ya esta activado ser produce un error de cuenta ya activada
        //muestra la vista activar registro.
        if($row['estado'] == 1){
            $this->_view->assign('_error', 'Esta cuenta ya ha sido activada');
            $this->_view->renderizar('activar', 'registro');
            exit;
        }
        //Cambia el estado del usuario a activado
        $this->_registro->activarUsuario(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );
        //consigue nuevamente información del usuario y lo guarda en una fila
        $row = $this->_registro->getUsuario(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );
        //si el estado sigue siendo igual a 0 entonces se produce un erro de activación pendiente
        if($row['estado'] == 0){
            $this->_view->assign('_error', 'Error al activar la cuenta, por favor intente mas tarde');
            $this->_view->renderizar('activar', 'registro');
            exit;
        }
        //En otros casos se muestra activación realizada con exito y se muetra vista activar registro.
        $this->_view->assign('_mensaje', 'Su cuenta ha sido activada');
        $this->_view->renderizar('activar', 'registro');
    }
}

?>

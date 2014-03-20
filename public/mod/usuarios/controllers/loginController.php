<?php

class loginController extends Controller
{
    private $_login;
    //inicializa las variables de la aplicacion carga el modelo login
    public function __construct()
    {
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }
    
    public function index()
    {;
        //Compueba si ya ha iniciado session, lo redirecciona a index principal.
        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        //carga la vista iniciar session y coloca el titulo
        $this->_view->assign('titulo', 'Iniciar Sesion');
        //si el formulario ha sido mandado entonces 
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            //comprueba que halla escrito el nombre de usuario
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre de usuario');
                $this->_view->renderizar('index','login',true);
                exit;
            }
            //comprueba que halla escrito el password
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('index','login',true);
                exit;
            }
            //Crea un arreglo con los datos del usuario
            $row = $this->_login->getUsuario1(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            // si no existe la fila.
            if(!$row){
                $this->_view->assign('_error', 'Usuario y/o password incorrectos');
                $this->_view->renderizar('index','login',true);
                exit;
            }
            //si el estado de usuario no esta abilitado entonces muestra error y redirecciona al
            //index del login
            if($row['estado'] != 1){
                $this->_view->assign('_error', 'Este usuario no esta habilitado');
                $this->_view->renderizar('index','login',true);
                exit;
            }
            //Inicia session y define las variables de session   
            Session::set('autenticado', true);
            Session::set('usuario', $row['usuario']);
            Session::set('id_role', $row['role']);
            Session::set('nombre', $row['nombre']);
            Session::set('ape_pat', $row['ape_pat']);
            Session::set('ape_mat', $row['ape_mat']);
            Session::set('clave_cetpro', $row['cetpro']);
            Session::set('id_usuario', $row['id']);
            Session::set('tiempo', time());
            //redirecciona a index principal.
            $this->redireccionar();
        }
        //muestra la vista del index de login
        $this->_view->renderizar('index','login',true);
        
    }
    //cierra sesion
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }
}

?>

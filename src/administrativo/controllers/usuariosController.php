<?php

class usuariosController extends Controller
{
    private $_usuarios;
    //inicializa las variables de la aplicaciÃ³n 
    public function __construct() 
    {
        parent::__construct();
        $this->_usuarios = $this->loadModel('usuarios');
    }
   
// INDEX    
    //Muestra la vista index de usuario
    public function index()
    {
    }

// LOGIN
    public function login()
    {
        $this->_view->setTemplate('login');
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
                $this->_view->renderizar('login','usuarios');
                exit;
            }
            //comprueba que halla escrito el password
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('login','usuarios');
                exit;
            }
            //Crea un arreglo con los datos del usuario
            $row = $this->_usuarios->getUsuario1(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            
            // si no existe la fila.
            if(!$row){
                $this->_view->assign('_error', 'Usuario y/o password incorrectos');
                $this->_view->renderizar('login','usuarios');
                exit;
            }
            //si el estado de usuario no esta abilitado entonces muestra error y redirecciona al
            //index del login
            if($row['estado'] != 1){
                $this->_view->assign('_error', 'Este usuario no esta habilitado');
                $this->_view->renderizar('login','usuarios');
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
            Session::set('admin', $this->_usuarios->checkAdmin());
            Session::set('tiempo', time());
            
            $this->redireccionar();
        }
        //muestra la vista del index de login
        $this->_view->renderizar('login','usuarios');
        
    }
    
    public function login2(){
        
        //Crea un arreglo con los datos del usuario
        $row = $this->_usuarios->getUsuario1(
                $this->getAlphaNum('usuario2'),
                $this->getSql('pass2')
                );
        
        // si no existe la fila.
        if(!$row){
            echo "Nombre y/o contraseÃ±a incorrectos";
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
        Session::set('admin', $this->_usuarios->checkAdmin());
        Session::set('tiempo', time());
        
        echo "ok";
    }
    //cierra sesion "solo usado por logout"
    public function cerrar()
    {
        Session::destroy();
        setcookie("dcjq-accordion-1", "", -1, "/");
        $this->redireccionar();
    }
    // usado solo por el metodo javascript
    public function cerrar2()
    {
        Session::destroy();
    }
    
    //Resetea el tiempo de session
    public function resetTimeSession()
    {
        Session::set('tiempo', time());
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
        //consigue nuevamente informaciÃ³n del usuario y lo guarda en una fila
        $row = $this->_registro->getUsuario(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );
        //si el estado sigue siendo igual a 0 entonces se produce un erro de activaciÃ³n pendiente
        if($row['estado'] == 0){
            $this->_view->assign('_error', 'Error al activar la cuenta, por favor intente mas tarde');
            $this->_view->renderizar('activar', 'registro');
            exit;
        }
        //En otros casos se muestra activaciÃ³n realizada con exito y se muetra vista activar registro.
        $this->_view->assign('_mensaje', 'Su cuenta ha sido activada');
        $this->_view->renderizar('activar', 'registro');
    }
}

?>


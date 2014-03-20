<?php

class usuariosController extends Controller
{
    private $_usuarios;
    //inicializa las variables de la aplicación 
    public function __construct() 
    {
        parent::__construct();
        $this->_usuarios = $this->loadModel('usuarios');
        
    }
    
// INDEX    
    //Muestra la vista index de usuario
    public function index()
    {
        $this->_acl->acceso('usuarios');
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //coloca el titulo de usuario
        $this->_view->assign('titulo', 'Usuarios');
        //asigna los usuarios a la variable usuarios
        $this->_view->assign('usuarios', $this->_usuarios->getUsuarios());
        //renderiza la vista index con el item usuarios
        //throw new Exception(print_r($this->_usuarios->getUsuarios()));
        $this->_view->renderizar('index', 'usuarios');
        
    }
    //Esta funcion maneja los roles y permisos de usuario
    public function permisos($usuarioID)
    {
        //filtra id
        $id = $this->filtrarInt($usuarioID);
        //si no exite id entonces redireccionar a usuarios
        if(!$id){
            $this->redireccionar('usuarios');
        }
        
        //si se envia el formulario
        if($this->getInt('guardar') == 1){
            //se cargar las keys de $_POST en el arreglo $values
            $values = array_keys($_POST);
            //se defienen dos variables para hacer operaciones.
            $replace = array();
            $eliminar = array();
            //recorre el la lista buscando la propiedad permiso y lo asigna a $permiso
            for($i = 0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){
                    $permiso = (strlen($values[$i]) - 5);
                    //si la propiedad permisos es igual a "x" entonces
                    if($_POST[$values[$i]] == 'x'){
                        $eliminar[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso)
                        );
                    }
                    else{
                        //si la propiedad permiso es igual a 1, entonces $v es igual a 1 caso contrario 0
                        if($_POST[$values[$i]] == 1){
                            $v = 1;
                        }
                        else{
                            $v = 0;
                        }
                        //se llena la variable $replace con valores de usuario y permisos
                        $replace[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }
            //Elimina permiso con los valores..
            for($i = 0; $i < count($eliminar); $i++){
                $this->_usuarios->eliminarPermiso(
                        $eliminar[$i]['usuario'],
                        $eliminar[$i]['permiso']);
            }
            //Editar permiso con los valores..
            for($i = 0; $i < count($replace); $i++){
                $this->_usuarios->editarPermiso(
                        $replace[$i]['usuario'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        //Consigue los permisos de Usuario
        $permisosUsuario = $this->_usuarios->getPermisosUsuario($id);
        //Consigue los permisos de Role
        $permisosRole = $this->_usuarios->getPermisosRole($id);
        //si no hay ni permisos de usuario o permisos de role entonces volvera a Usuarios Index.
        if(!$permisosUsuario || !$permisosRole){
            $this->redireccionar('usuarios');
        }
        //Carga la vista permiso de usuario
        $this->_view->assign('titulo', 'Permisos de usuario');
        //asigna las claves de los permisos de usario a la variable permisos
        $this->_view->assign('permisos', array_keys($permisosUsuario));
        //asigna los permisos de usuario a la variable usuarios
        $this->_view->assign('usuario', $permisosUsuario);
        //asigna los permisos de los roles a la variable role
        $this->_view->assign('role', $permisosRole);
        //asigana los datos de los usuarios  a la variable info
        $this->_view->assign('info', $this->_usuarios->getUsuario($id));
        //rendiriza la vista permisos con el item usurios
        $this->_view->renderizar('permisos', 'usuarios');
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
            Session::set('tiempo', time());
            //redirecciona a index principal.
            $this->redireccionar();
        }
        //muestra la vista del index de login
        $this->_view->renderizar('login','usuarios');
        
    }
    //cierra sesion
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }
    
// REGISTRO
    
    public function registro()
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


<?php
require_once ROOT . 'src' . DS . 'administrativo' . DS . 'controllers' . DS . 'usuariosController.php';

class personalController extends usuariosController
{    
    private $_personal;
    
    //inicializa las variables de la aplicación
    public function __construct() 
    {
        parent::__construct();
        $this->_personal = $this->loadModel('personal');
    }
    //carga la vista index de personal.
    public function index()
    {
        $this->_acl->acceso('personal');
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //coloca el titulo de personal
        $this->_view->assign('titulo', 'Personal');
        //asigna el personal a la variable personal
        $this->_view->assign('personal', $this->_personal->getPersonal());
        //renderiza la vista index con el item personal
        //throw new Exception(print_r($this->_personal->getPersonal()));
        $this->_view->renderizar('index', 'personal');
    }
    
    //Esta funcion maneja los roles y permisos de personal
    public function permisos($personaID)
    {
        $this->_acl->acceso('permisos');
        //filtra id
        $id = $this->filtrarInt($personaID);
        //si no exite id entonces redireccionar a personal
        if(!$id){
            $this->redireccionar('personal');
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
                            'persona' => $id,
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
                        //se llena la variable $replace con valores de persona y permisos
                        $replace[] = array(
                            'persona' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }
            //Elimina permiso con los valores..
            for($i = 0; $i < count($eliminar); $i++){
                $this->_personal->eliminarPermiso(
                        $eliminar[$i]['persona'],
                        $eliminar[$i]['permiso']);
            }
            //Editar permiso con los valores..
            for($i = 0; $i < count($replace); $i++){
                $this->_personal->editarPermiso(
                        $replace[$i]['persona'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        //Consigue los permisos de Persona
        $permisosPersona = $this->_personal->getPermisosUsuario($id);
        //Consigue los permisos de Role
        $permisosRole = $this->_personal->getPermisosRole($id);
        //si no hay ni permisos de persona o permisos de role entonces volvera a Personal Index.
        if(!$permisosPersona || !$permisosRole){
            $this->redireccionar('personal');
        }
        //Carga la vista permiso de persona
        $this->_view->assign('titulo', 'Permisos de persona');
        //asigna las claves de los permisos de usario a la variable permisos
        $this->_view->assign('permisos', array_keys($permisosPersona));
        //asigna los permisos de persona a la variable personal
        $this->_view->assign('persona', $permisosPersona);
        //asigna los permisos de los roles a la variable role
        $this->_view->assign('role', $permisosRole);
        //asigana los datos de los personal  a la variable info
        $this->_view->assign('info', $this->_personal->getPersona($id));
        //rendiriza la vista permisos con el item usurios
        $this->_view->renderizar('permisos', 'personal');
    }
    
    // REGISTRO
    
    public function registro()
    {
        
        $this->_acl->acceso('agregar_personal');
        //asigna el titulo a la vista
        
        $this->_view->assign('titulo', 'Registro');
        
        //comprueba si se ha envia el formulario.
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            //comprueba si ha escrito su nombre
            if(!$this->getSql('nombre')){
                $this->_view->assign('_error', 'Debe introducir su nombre');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //comprueba si ha escrito su nombre de persona
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre persona');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //verifica si nombre de persona ya existe
            if($this->_personal->verificarPersona($this->getAlphaNum('usuario'))){
                $this->_view->assign('_error', 'El persona ' . $this->getAlphaNum('usuario') . ' ya existe');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //comprueba si el  correo electronico esta bien escrito
            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'La direccion de email es inv&aacute;lida');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //comprueba si ya existe el correo electronico
            if($this->_personal->verificarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'Esta direccion de correo ya esta registrada');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //comprueba si ha escrito su password
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //comprueba si los password coinsiden
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->assign('_error', 'Los passwords no coinciden');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //crea un objeto nuevo de php mailer
            $mail = new PHPMailer();
            //Realiza el registro del persona
            $this->_personal->registrarPersona(
                    $this->getSql('nombre'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email')
                    );
            //verifica si el persona ha sido guardado
            $persona = $this->_personal->verificarPersona($this->getAlphaNum('usuario'));
            //si el persona no ha sido guardado entonces se produce un error y se muestra la vista index de registro
            if(!$persona){
                $this->_view->assign('_error', 'Error al registrar el persona');
                $this->_view->renderizar('registro', 'personal');
                exit;
            }
            //Define variables del objeto phpmailer y los manda al correo electronico
            $mail->From = 'www.mvc.dlancedu.com';
            $mail->FromName = 'Tutorial MVC';
            $mail->Subject = 'Activacion de cuenta de persona';
            $mail->Body = 'Hola <strong>' . $this->getSql('nombre') . '</strong>,' .
                        '<p>Se ha registrado en www.mvc.dlancedu.com para activar ' .
                        'su cuenta haga clic sobre el siguiente enlace:<br>' .
                        '<a href="' . BASE_URL .'registro/activar/' . 
                        $persona['id'] . '/' . $persona['codigo'] . '">' .
                        BASE_URL .'registro/activar/' . 
                        $persona['id'] . '/' . $persona['codigo'] .'</a>' ;

            $mail->AltBody = 'Su servidor de correo no soporta html';
            $mail->AddAddress($this->getPostParam('email'));
            $mail->Send();
            //se asigna al la variable datos el valor false y se muestra el mensaje de registro completado 
            $this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', 'Registro Completado, revise su email para activar su cuenta');
            
        }        
        //muestra la vista index de registro
        $this->_view->renderizar('registro', 'personal');
    }
}
?>

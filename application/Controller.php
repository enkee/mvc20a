<?php

abstract class Controller
{
    private $_registry;
    protected $_view;
    protected $_acl;
    protected $_request;

    //inicializa variables del sistema.
    public function __construct() 
    {
        $this->_registry = Registry::getInstancia();
        //$this->_acl = new ACL();
        $this->_acl = $this->_registry->_acl;
        $this->_request = $this->_registry->_request;
        $this->_view = new View($this->_request, $this->_acl);
    }
    //funcion abstracta predeterminada, formalismo porque no llama a ninguana vista.
    abstract public function index();
    
    //Llama o carga modelo especifico
    protected function loadModel($modelo0, $modulo = false)
    {
        
        $modelo = $modelo0 . 'Model';
        $rutaModelo = ROOT . 'src' . DS . $this->_request->getFolder($modelo0) . DS . 'models' . DS . $modelo . '.php';
        
        if(!$modulo){
            $modulo = $this->_request->getModulo();
        }
        
        if($modulo){
           if($modulo != 'default'){
               $rutaModelo = ROOT . 'src' . DS . $this->_request->getFolder($modulo) . DS . '_modules' . DS . $modulo . DS . 'models' . DS . $modelo . '.php';
           }
        }
        
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }
    //Llama a libreria
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
    //limpia el texto que se manda por el $_POST 
    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        
        return '';
    }
    //limpia los valores numericos que se manda por el $_POST
    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        
        return 0;
    }
    //redirecciona a un controllador, metodo, parametro
    protected function redireccionar($ruta = false)
    {
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }
    //convierte a numero
    protected function filtrarInt($int)
    {
        $int = (int) $int;
        
        if(is_int($int)){
            return $int;
        }
        else{
            return 0;
        }
    }
    //valida si el post tiene parametros
    protected function getPostParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }
    //filtra las cadenas para consultas 
    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);
            
            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = mysql_real_escape_string($_POST[$clave], mysql_connect(DB_HOST, DB_USER, DB_PASS));
            }
            
            return trim($_POST[$clave]);
        }
    }
     //filtra la cadena del $_POST solo con caracteres alfanuméricos 
    protected function getAlphaNum($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
        
    }
    //valida un email
    public function validarEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        
        return true;
    }
    //filtra la cadena del $_POST solo con caracteres alfanuméricos 
    protected function formatPermiso($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
    }
}
?>
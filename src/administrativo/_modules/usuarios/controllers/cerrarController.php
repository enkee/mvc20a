<?php

class cerrarController extends Controller
{
    private $_login;
    //inicializa las variables de la aplicacion carga el modelo login
    public function __construct()
    {
        parent::__construct();
        $this->_login = $this->loadModel('cerrar');
    }
    
    public function index()
    {
        Session::destroy();
        $this->redireccionar(); 
    }
    
}

?>

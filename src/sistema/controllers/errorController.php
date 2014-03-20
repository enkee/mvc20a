<?php

class errorController extends Controller
{
    //Inicializa las variables de la aplicación
    public function __construct() {
        parent::__construct();
    }
    //Crea la vista de error
    public function index()
    {
        $this->_view->assign('titulo', 'Error');
        $this->_view->assign('mensaje', $this->_getError());
        $this->_view->renderizar('index');
    }
    //Crea la vista de error de acceso segun algun codigo que se halla mandado.
    public function access($codigo)
    {
        $this->_view->assign('titulo', 'Error');
        $this->_view->assign('mensaje', $this->_getError($codigo));
        $this->_view->renderizar('access');
    }
    
    //Devuelve un error según el codigo especificado, sino exite se manda al predeterminado.
    private function _getError($codigo = false)
    {
        if($codigo){
            $codigo = $this->filtrarInt($codigo);
            if(is_int($codigo))
                $codigo = $codigo;
        }
        else{
            $codigo = 'default';
        }        
        
        $error['default'] = 'Ha ocurrido un error y la página no puede mostrarse';
        $error['5050'] = 'Acceso restringido!';
        $error['8080'] = 'Tiempo de la sesion agotado';
        
        //comprueba y devuelve el error segun el codigo, caso contrario el predeterminado.
        if(array_key_exists($codigo, $error)){
            return $error[$codigo];
        }
        else{
            return $error['default'];
        }
    }
}

?>
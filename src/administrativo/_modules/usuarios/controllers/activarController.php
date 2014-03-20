<?php

class activarController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('activar');
        //$this->_view->setTemplate('twb');
        //$this->_view->setWidgetOptions('menu-top', array('top', 'top', true));
    }
    
    public function index()
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

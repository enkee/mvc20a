<?php

class indexController extends usuarioController
{
    private $_usuarios;
    //inicializa las variables de la aplicación 
    public function __construct() 
    {
        parent::__construct();
        $this->_usuarios = $this->loadModel('index');
    }
    //Muestra la vista index de usuario
    public function index()
    {
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //coloca el titulo de usuario
        $this->_view->assign('titulo', 'Usuarios');
        //asigna los usuarios a la variable usuarios
        $this->_view->assign('usuarios', $this->_usuarios->getUsuarios());
        //renderiza la vista index con el item usuarios
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
}

?>

<?php

class indexController extends estudianteController
{
    private $_estudiantes;
    //inicializa las variables de la aplicación 
    public function __construct() 
    {
        parent::__construct();
        $this->_estudiantes = $this->loadModel('index');
    }
    //Muestra la vista index de estudiante
    public function index()
    {
        $this->_acl->acceso('ver_estudiante');
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //coloca el titulo de estudiante
        $this->_view->assign('titulo', 'Estudiantes');
        //asigna los estudiantes a la variable 'estudiantes'
        $this->_view->assign('estudiantes', $this->_estudiantes->getEstudiantes());
        //renderiza la vista index con el item estudiante
        $this->_view->renderizar('index', 'estudiantes');
    }
    /*
    //Esta funcion maneja los roles y permisos de estudiante
    public function permisos($estudianteID)
    {
        //filtra id
        $id = $this->filtrarInt($estudianteID);
        //si no exite id entonces redireccionar a estudiantes
        if(!$id){
            $this->redireccionar('estudiantes');
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
                            'estudiante' => $id,
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
                        //se llena la variable $replace con valores de estudiante y permisos
                        $replace[] = array(
                            'estudiante' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }
            //Elimina permiso con los valores..
            for($i = 0; $i < count($eliminar); $i++){
                $this->_estudiantes->eliminarPermiso(
                        $eliminar[$i]['estudiante'],
                        $eliminar[$i]['permiso']);
            }
            //Editar permiso con los valores..
            for($i = 0; $i < count($replace); $i++){
                $this->_estudiantes->editarPermiso(
                        $replace[$i]['estudiante'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        //Consigue los permisos de Estudiante
        $permisosEstudiante = $this->_estudiantes->getPermisosEstudiante($id);
        //Consigue los permisos de Role
        $permisosRole = $this->_estudiantes->getPermisosRole($id);
        //si no hay ni permisos de estudiante o permisos de role entonces volvera a Estudiantes Index.
        if(!$permisosEstudiante || !$permisosRole){
            $this->redireccionar('estudiantes');
        }
        //Carga la vista permiso de estudiante
        $this->_view->assign('titulo', 'Permisos de estudiante');
        //asigna las claves de los permisos de usario a la variable permisos
        $this->_view->assign('permisos', array_keys($permisosEstudiante));
        //asigna los permisos de estudiante a la variable estudiantes
        $this->_view->assign('estudiante', $permisosEstudiante);
        //asigna los permisos de los roles a la variable role
        $this->_view->assign('role', $permisosRole);
        //asigana los datos de los estudiantes  a la variable info
        $this->_view->assign('info', $this->_estudiantes->getEstudiante($id));
        //rendiriza la vista permisos con el item usurios
        $this->_view->renderizar('permisos', 'estudiantes');
    }
    */
}

?>

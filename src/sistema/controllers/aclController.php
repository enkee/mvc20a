<?php

class aclController extends Controller
{
    private $_aclm;
    
    //contruye el ALC, Requests y views ademas de cargar el modelo.
    public function __construct() 
    {
        parent::__construct();
        $this->_aclm = $this->loadModel('acl');
    }
    //Define la vista al index de ACL "Lista de acceso".
    public function index()
    {
        $this->_acl->acceso('admin_access');
        $this->_view->assign('titulo', 'Listas de acceso');
        $this->_view->renderizar('index', 'acl');
    }
    //Establece el el titulo de la vista, y asigna los roles y la renderiza
    public function roles()
    {
        $this->_acl->acceso('admin_access');
        $this->_view->assign('titulo', 'Administracion de roles');
        $this->_view->assign('roles', $this->_aclm->getRoles());
        $this->_view->renderizar('roles', 'acl');
    }
    //Establece los permisos del rol, los asigna y/o elimina segun los valores mandados
    public function permisos_role($roleID)
    {
        $this->_acl->acceso('admin_access');
        //filtra Id
        $id = $this->filtrarInt($roleID);
        //redirecciona a roles, no pasa nada.
        if(!$id){
            $this->redireccionar('acl/roles');
        }
        //Consigue los roles del Id
        $row = $this->_aclm->getRole($id);
        //Si no tiene roles.. redirecciona, no pasa nada.
        if(!$row){
            $this->redireccionar('acl/roles');
        }
        //Camibia el titulo de la vista.
        $this->_view->assign('titulo', 'Administracion de permisos role');
        
        //si se pulsado el boton de guaradar del formulario, se definen la variables
        //valores, remplazo y eliminar.
        if($this->getInt('guardar') == 1){
            $values = array_keys($_POST);
            $replace = array();
            $eliminar = array();
            //Este bucle recorre el post en busca de la clave permiso
            //si el valor es x entonces llenara el array eliminar
            //caso contrario entonces comprobara si es uno o cero y segun eso creara el array de remplazo.
            for($i = 0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){
                    $permiso = (strlen($values[$i]) - 5);
                    
                    if($_POST[$values[$i]] == 'x'){
                        $eliminar[] = array(
                            'role' => $id,
                            'permiso' => substr($values[$i], -$permiso)
                        );
                    }
                    else{
                        if($_POST[$values[$i]] == 1){
                            $v = 1;
                        }
                        else{
                            $v = 0;
                        }
                        
                        $replace[] = array(
                            'role' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }
            
            for($i = 0; $i < count($eliminar); $i++){
                $this->_aclm->eliminarPermisoRole(
                        $eliminar[$i]['role'],
                        $eliminar[$i]['permiso']);
            }
            
            for($i = 0; $i < count($replace); $i++){
                $this->_aclm->editarPermisoRole(
                        $replace[$i]['role'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        //Asigna el rol, los permisos y renderiza la vista.
        $this->_view->assign('role', $row);
        $this->_view->assign('permisos', $this->_aclm->getPermisosRole($id));
        $this->_view->renderizar('permisos_role');
    }
    //crea un nuevo role
    public function nuevo_role()
    {
        $this->_acl->acceso('admin_access');
        $this->_view->assign('titulo', 'Nuevo Role');
        //si se ha mandado el formulario entonces se asigna los valores del $_POST  a la variable datos.
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            //se comprueba si no exite nombre de rol debe introducirlo.. regresa..
            if(!$this->getSql('role')){
                $this->_view->assign('_error', 'Debe introducir el nombre del role');
                $this->_view->renderizar('nuevo_role', 'acl');
                exit;
            }
            //Se guarda el rol y se redirecciona
            $this->_aclm->insertarRole($this->getSql('role'));
            $this->redireccionar('acl/roles');
        }
        //se vuelve a cargar la vista nuevo rol
        $this->_view->renderizar('nuevo_role', 'acl');
    }
    //Llama a la vista permisos
    public function permisos()
    {
        $this->_acl->acceso('admin_access');
        $this->_view->assign('titulo', 'Administracion de permisos');
        $this->_view->assign('permisos', $this->_aclm->getPermisos());
        $this->_view->renderizar('permisos', 'acl');
    }
    //Crea un nuevo permiso
    public function nuevo_permiso()
    {
        $this->_acl->acceso('admin_access');
        $this->_view->assign('titulo', 'Nuevo Permiso');
        //si el formulariio se mando
        if($this->getInt('guardar') == 1){
            //se guardan los valores del $_POST en la variable datos
            $this->_view->assign('datos', $_POST);
            //comprueba si no tiene nombre el permiso debe introducir uno.
            if(!$this->getSql('permiso')){
                $this->_view->assign('_error', 'Debe introducir el nombre del permiso');
                $this->_view->renderizar('nuevo_permiso', 'acl');
                exit;
            }
            //comprueba si existe el key de permiso, debe introducir uno.
            if(!$this->getAlphaNum('key')){
                $this->_view->assign('_error', 'Debe introducir el key del permiso');
                $this->_view->renderizar('nuevo_permiso', 'acl');
                exit;
            }
            //Inserta el el permiso
            $this->_aclm->insertarPermiso(
                    $this->getSql('permiso'), 
                    $this->getAlphaNum('key')
                    );
            //regresa a la vista permisos
            $this->redireccionar('acl/permisos');
        }
        //se renderiza denuevo la vista nuevo permiso.
        $this->_view->renderizar('nuevo_permiso', 'acl');
    }
    
    public function editar_permiso($id_permiso)
    {
        //comprueba el acceso para editar post
        $this->_acl->acceso('admin_access');
        
        //si no es un numero, se redirige al index de Permisos
        if(!$this->filtrarInt($id_permiso)){
            $this->redireccionar('acl/permisos');
        }
        //si no existe el permiso se redirecciona al index del permiso
        if(!$this->_aclm->getPermisoKey($this->filtrarInt($id_permiso))){
            $this->redireccionar('acl/permisos');
        }
        //Asigna el titulo a la vista y coloca el archivo nuevo.js.
        $this->_view->assign('titulo', 'Editar Permisos');
        $this->_view->setJs(array('prueba'));
        
        //Si el formulario fue mandado
        if($this->getInt('guardar') == 1){
            //se cargan los valores de $_POST a la variable datos.
            $this->_view->assign('datos', $_POST);
            //comprueba que el Permiso tenga titulo
            if(!$this->getTexto('permiso')){
                $this->_view->assign('_error', 'Debe introducir el nombre del permiso');
                $this->_view->renderizar('editar_permiso', 'acl');
                exit;
            }
            //comprueba que el Permiso tenga key
            if(!$this->getTexto('key')){
                $this->_view->assign('_error', 'Debe introducir la key del permiso');
                $this->_view->renderizar('editar_permiso', 'acl');
                exit;
            }
            /*Comprobar Variables
            throw new Exception('si se manda la variable key = ' . 
                    $this->filtrarInt($id_permiso) . ' | ' . 
                    $this->getPostParam('permiso') . ' | ' . 
                    $this->getPostParam('key')
                    );
            */
            //Edita el Permiso, guarda los cambios.
            $this->_aclm->editarPermiso(
                    $this->filtrarInt($id_permiso),
                    $this->getPostParam('permiso'),
                    $this->getPostParam('key')
                    //$this->filtrarInt('menu')
                    );
            //vuelve al index del Permisos.
            $this->redireccionar('acl/permisos');
        }
        //asigna el Permiso a la variable datos y carga la vista editar
        $this->_view->assign('datos', $this->_aclm->getPermiso($this->filtrarInt($id_permiso)));
        $this->_view->renderizar('editar_permiso', 'acl');
    }
    
    //CATEGORIAS
    public function categorias()
    {
        $this->_acl->acceso('categorias');
        $this->_view->assign('titulo', 'Categorias');
        $this->_view->renderizar('categorias', 'acl');
    }


    //MENUS
    public function menus()
    {
        $this->_acl->acceso('menus');
        $this->_view->assign('titulo', 'Menús');
        $this->_view->renderizar('menus', 'acl');
    }
    
}
?>
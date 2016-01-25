<?php

class ACL
{
    //inicializa las variables de la clase
    private $_registry;
    private $_db;
    private $_id;
    private $_role;
    private $_permisos;
    //Inicia session, consigue los roles y permisos
    public function __construct($id = false)
    {
        if($id){
            $this->_id = (int) $id;
        }
        else{
            if(Session::get('id_usuario')){
                $this->_id = Session::get('id_usuario');
            }
            else{
                $this->_id = 0;
            }
        }
        $this->_registry = Registry::getInstancia();
        $this->_db = $this->_registry->_db;
        $this->_role = $this->getRole();
        $this->_permisos = $this->getPermisosRole();
        $this->compilarAcl();
    }
    //consigue los permisos de usuario
    public function compilarAcl()
    {
        $this->_permisos = array_merge(
                $this->_permisos,
                $this->getPermisosUsuario()
                );
        //throw new Exception("<pre>" . print_r($this->_permisos,true) . "</pre>");
    }
    
    
    //consigue el rol de usuario
    public function getRole()
    {
        $role = $this->_db->query(
                "select role from personal " .
                "where id = {$this->_id}"
                );
                
        $role = $role->fetch();
        
        return $role['role'];
    }
    //consigue los ids de permisos segun un rol_permiso
    public function getPermisosRoleId()
    {
        //consigue los permisos segun el rol
        $ids = $this->_db->query(
                "select permiso from permisos_role " .
                "where role = '{$this->_role}'"
                );
        //lo coloca en filas numeradas    
        $ids = $ids->fetchAll(PDO::FETCH_ASSOC);
        //crea una variable array
        $id = array();
        //recorre las filas de ids de permiso, y asigna a la variable id los permisos.
        for($i = 0; $i < count($ids); $i++){
            $id[] = $ids[$i]['permiso'];
        }
        //Retorna los id de permiso
        return $id;
    }
    //Consigue los permisos_rol de un rol.
    public function getPermisosRole()
    {
        //consigue todo sobre los permisos de un rol.
        $permisos = $this->_db->query(
                "select * from permisos_role " .
                "where role = '{$this->_role}'"
                );
        //crea una tabla de permisos del rol.        
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        //crea una variable de array
        $data = array();
        //recorre la tabla, y consigue llenar la variable $data.
        for($i = 0; $i < count($permisos); $i++){
            //consigue la key del permiso
            $key = $this->getPermisoKey($permisos[$i]['permiso']);
            if($key == ''){continue;}
            //si el valor del permiso es igual a 1 entonces "true" caso contrario "false"
            if($permisos[$i]['valor'] == 1){
                $v = true;
            }
            else{
                $v = false;
            }
            //LLena la variable $data con la key, el nombre del permiso, el valor del permiso, si heredado
            //y el id del permiso.
            $data[$key] = array(
                'key' => $key,
                'permiso' => $this->getPermisoNombre($permisos[$i]['permiso']),
                'valor' => $v,
                'heredado' => true,
                'id' => $permisos[$i]['permiso']
            );
        }
        //retorna la variable data
        return $data;
    }
    private function getParametros(){
        $parametros = array();
        
        if($this->_permisos['post']){
            $parametros = array(
                0 => array(
                    'key_permiso'=> 'post',
                    'key_parametro'=> 'hola',
                    'titulo_parametro'=>'Hola Amigos',
                    'enlace'=>'post/prueba'
                ),
                1 => array(
                    'key_permiso'=> 'post',
                    'key_parametro'=> 'Mora',
                    'titulo_parametro'=>'Hola Cuniau',
                    'enlace'=>'post'
                )
            );
        }
        return $parametros;
    }

    public function getMenusRole(){
        //consigue todos las categorias de un role
        $categorias = $this->_db->query(
                "select distinct c.* from permisos_role pr " .
                "inner join sistema.permisos p " .
                      "on p.id_permiso = pr.permiso " .
                "inner join sistema.menus m " .
                      "on m.id_menu = p.id_menu " .
                "inner join sistema.categorias c " .
                      "on c.id_categoria = m.id_categoria " .
                "where pr.role = '{$this->_role}' and p.visible = 1 " . 
                "order by c.num_orden"       
                );
        //consigue todos los menus de un role
        $menus = $this->_db->query(
                "select distinct m.* from permisos_role pr " . 
                "inner join sistema.permisos p " .
                      "on p.id_permiso = pr.permiso " . 
                "inner join sistema.menus m " .
                      "on m.id_menu = p.id_menu " . 
                "where pr.role = '{$this->_role}' and p.visible = 1 " . 
                "order by m.num_orden"
                );
        //consigue todos los permisos de un role
        $permisos = $this->_db->query(
                "select distinct p.* from permisos_role pr " .
                "inner join sistema.permisos p " .
                      "on p.id_permiso = pr.permiso " .
                "where pr.role = '{$this->_role}' and p.visible = 1 " . 
                "order by p.num_orden"
                );    
                
        //crea una tabla de menus del rol. 
        $categorias = $categorias->fetchAll(PDO::FETCH_ASSOC);
        $menus = $menus->fetchAll(PDO::FETCH_ASSOC);
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        //crea una variable de array lipia
            
        //recorre Categorias
        $data_categorias = array();
        for($i = 0; $i < count($categorias); $i++){
            //recorre Menus
            $data_menus = array();
            for($j = 0; $j < count($menus); $j++){
                if($menus[$j]['id_categoria'] == $categorias[$i]['id_categoria']){
                    //recorre Permisos
                    $data_permisos = array();
                    for($k = 0; $k < count($permisos); $k++){
                        if($permisos[$k]['id_menu'] == $menus[$j]['id_menu']){
                            //recorre Parametros
                            $data_parametros = array();
                            $parametros = $this->getParametros();
                            
                            for($l = 0; $l < count($parametros); $l++){
                                if($parametros[$l]['key_permiso'] == $permisos[$k]['key_permiso']){
                                    $key_parametro = $parametros[$l]['key_parametro'];
                                    if($key_parametro == ''){continue;}
                                    $data_parametros[$key_parametro] = array(
                                        'titulo_parametro' => $parametros[$l]['titulo_parametro'],
                                        'enlace' => BASE_URL . $parametros[$l]['enlace'],
                                    );
                                }
                            }
                            $key_permiso = $permisos[$k]['key_permiso'];
                            if($key_permiso == ''){continue;}
                            $data_permisos[$key_permiso] = array(
                                'key_permiso' => $key_permiso,
                                'titulo_permiso' => $permisos[$k]['permiso'],
                                'enlace' => BASE_URL . $permisos[$k]['enlace'],
                                'id_permiso' => $permisos[$k]['id_permiso'],
                                'parametros'=> $data_parametros
                            );
                        }
                    }
                    $key_menu = $menus[$j]['key_menu'];
                    if($key_menu == ''){continue;}
                    $data_menus[$key_menu] = array(
                        'key_menu' => $key_menu,
                        'titulo_menu' => $menus[$j]['titulo_menu'],
                        'imagen' => $menus[$j]['imagen_menu'],
                        'id_menu' => $menus[$j]['id_menu'],
                        'permisos' => $data_permisos
                    );
                }
            }
            $key_categoria = $categorias[$i]['key_categoria'];
            if($key_categoria == ''){continue;}
            $data_categorias[$key_categoria] = array(
                'key_categoria' => $key_categoria,
                'titulo_categoria' => $categorias[$i]['categoria'],
                'id_categoria' => $categorias[$i]['id_categoria'],
                'menus'=> $data_menus
            );
        }
        
        //retorna la variable data
       //throw new Exception("<pre>" . print_r($data_categorias,true) . "</pre>");
       return $data_categorias;
        
    }
    //consigue la la key del permiso.
    public function getPermisoKey($permisoID)
    {
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "select `key_permiso` from sistema.permisos " .
                "where id_permiso = {$permisoID}"
                );
                
        $key = $key->fetch();
        return $key['key_permiso'];
    }
    //consigue el nombre del permiso.
    public function getPermisoNombre($permisoID)
    {
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "select `permiso` from sistema.permisos " .
                "where id_permiso = {$permisoID}"
                );
        $key = $key->fetch();
        return $key['permiso'];
    }
    //consigue los permisos de usuario
    public function getPermisosUsuario()
    {
        //consigue los id de permiso de un rol
        $ids = $this->getPermisosRoleId();
        //si existe algun permiso para ese rol entonces coseguir los permisos para ese usuario
        if(count($ids)){
            $permisos = $this->_db->query(
                    "select * from permisos_usuario " .
                    "where usuario = {$this->_id} " .
                    "and permiso in (" . implode(",", $ids) . ")"
                    );
            //se crea una tabla de permisos de usuario.
            $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        }
        //caso contrario permisos es un array vacio.
        else{
            $permisos = array();
        }
        
        //Se crea un variable array
        $data = array();
        
        //Se recorre la tabla de permisos
        for($i = 0; $i < count($permisos); $i++){
            //se consigue la llave del permiso
            $key = $this->getPermisoKey($permisos[$i]['permiso']);
            if($key == ''){continue;}
            //si el valor del permiso es uno entonces "true", caso contrario "false".
            if($permisos[$i]['valor'] == 1){
                $v = true;
            }
            else{
                $v = false;
            }
            //se llena la variable data con informaciÃ³n de permiso de usuario.
            $data[$key] = array(
                'key' => $key,
                'permiso' => $this->getPermisoNombre($permisos[$i]['permiso']),
                'valor' => $v,
                'heredado' => false,
                'id' => $permisos[$i]['permiso']
            );
        }
        //retorna la variable data con inormaciÃ³n de permisos de usuario.
        return $data;
    }
    
    
    //regresa los permisos si es que existe la variable y tiene almenos un permiso.
    public function getPermisos()
    {
        if(isset($this->_permisos) && count($this->_permisos))
            return $this->_permisos;
    }
    //verifica si el key del permiso existe y si el valor es verdadero o 1.
    public function permiso($key)
    {
        if(array_key_exists($key, $this->_permisos)){
            if($this->_permisos[$key]['valor'] == true || $this->_permisos[$key]['valor'] == 1){
                return true;
            }
        }
        
        return false;
    }
    //Si el permiso existe inicia session, caso contrario se muestra mensaje de error de permiso.
    public function acceso($key)
    {   
        if($this->permiso($key)){
            Session::tiempo();
            return;
        }
        header("location:" . BASE_URL . "error/access/5050");
        exit;
    }
}

?>

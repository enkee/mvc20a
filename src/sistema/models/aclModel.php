<?php

class aclModel extends Model
{
    //inicializa las varibles de conexion de base de datos
    public function __construct()
    {
        parent::__construct();
    }
    //consigue el rol de un $roleID
    public function getRole($roleID)
    {
        $roleID = (int) $roleID;
        
        $role = $this->_db->query("SELECT * FROM roles WHERE id_role = {$roleID}");
        return $role->fetch();
    }
    //consigue todos los roles
    public function getRoles()
    {
        $roles = $this->_db->query("SELECT * FROM roles");
        
        return $roles->fetchAll(PDO::FETCH_ASSOC);
    }
    //consigue los permisos de un role
    public function getPermisosRole($roleID)
    {
        $data = array();
        
        $permisos = $this->_db->query(
                "SELECT * FROM permisos_role WHERE role = {$roleID}"
                );
        //Obtiene los permisos de un rol en filas      
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        
        //recorre los permisos y asigna un key para cada permiso
        for($i = 0; $i < count($permisos); $i++){
            $key = $this->getPermisoKey($permisos[$i]['permiso']);
            //si el permiso es igual a vacio, continua, caso contrario
            if($key == ''){continue;}
            //si el permiso es igual a 1 entonces el valor carga a verdadero sino es falso
            if($permisos[$i]['valor'] == 1){
                $v = true;
            }
            else{
                $v = false;
            }
            //se crea un arreglo $data con los valores de los permisos
            $data[$key] = array(
                'key' => $key,
                'valor' => $v,
                'nombre' => $this->getPermisoNombre($permisos[$i]['permiso']),
                'id' => $permisos[$i]['permiso']
            );
        }
        //se crea un arreglo con todos los permisos y se adjunta a $data
        $todos = $this->getPermisosAll();
        $data = array_merge($todos, $data);
        //regresa la data
        return $data;
    }
    //devuelve el key de un permiso segun su Id
    public function getPermisoKey($permisoID)
    {
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "SELECT `key_permiso` FROM sistema.permisos WHERE id_permiso = $permisoID"
                );
        
        $key = $key->fetch();
        return $key['key_permiso'];
    }
    //Consigue el nombre de un permiso teniendo en cuenta su id
    public function getPermisoNombre($permisoID)
    {
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "SELECT permiso FROM sistema.permisos WHERE id_permiso = $permisoID"
                );
        
        $key = $key->fetch();
        return $key['permiso'];
    }
    //Consigue un permiso
    public function getPermiso($permisoID)
    {
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "SELECT * FROM sistema.permisos WHERE id_permiso = $permisoID"
                );
        
        $key = $key->fetch();
        return $key;
    }
    
    //consigue todos los permisos de la tabla permisos y crea una nueva variable $data.
    public function getPermisosAll()
    {
        $permisos = $this->_db->query(
                "SELECT * FROM sistema.permisos"
                );
                
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        //recorre los permisos y asigna a la variable $data los keys de los permisos, ademas asigna 
        //valores a valor, nombre y id.
        for($i = 0; $i < count($permisos); $i++){
            $data[$permisos[$i]['key_permiso']] = array(
                'key' => $permisos[$i]['key_permiso'],
                'valor' => 'x',
                'nombre' => $permisos[$i]['permiso'],
                'id' => $permisos[$i]['id_permiso']
            );
        }
        //regresa la variable $data
        return $data;
    }
    //inserta un nuevo rol a la tabla roles
    public function insertarRole($role)
    {
        $this->_db->query("INSERT INTO roles VALUES(null, '{$role}')");
    }
    //consigue todos los permisos de la tabla permisos
    public function getPermisos()
    {
        $permisos = $this->_db->query("SELECT * FROM sistema.permisos");
        
        return $permisos->fetchAll(PDO::FETCH_ASSOC);
    }
    //elimina un permiso-role segun los criterios $roleID y $permisoID
    public function eliminarPermisoRole($roleID, $permisoID)
    {
        $this->_db->query(
                "DELETE FROM permisos_role " . 
                "WHERE permiso = {$permisoID} " .
                "AND role = {$roleID}"
                );
    }
    //Edita los todos los permisos de un rol, eliminandolos todos primero y volviendolos a insertar, esto
    //asegura que las claves unicas permiso-role no se vallan a duplicar en algun momento de la actualizaciÃ³n.
    public function editarPermisoRole($roleID, $permisoID, $valor)
    {
        $this->_db->query(
                "replace into permisos_role set role = {$roleID}, permiso = {$permisoID}, valor = '{$valor}'"
                );
    }
    //Edita un permiso
    public function editarPermiso($id, $permiso, $key)
    {
       $id = (int) $id;
       
       $this->_db->query(
               "UPDATE permisos SET permiso = '{$permiso}', `key` = '{$key}' " . 
               "WHERE id_permiso = '{$id}'"
                );
    }
    
    //inserta un permiso en la tabla permisos
    public function insertarPermiso($permiso, $llave)
    {
        $this->_db->query(
                "INSERT INTO permisos VALUES" .
                "(null, '{$permiso}', null , '{$llave}')"
                );
    }
    /* Consigue todos los menus de un role
    public function getmenus($roleID){
        $roleID = (int) $roleID;
        
        $menu = $this->_db->query("SELECT * FROM menus WHERE id_role = {$roleID}");
        return $role->fetch();
    }
    */
}

?>

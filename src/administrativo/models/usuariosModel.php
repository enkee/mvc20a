<?php

class usuariosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
//INDEX: consigue los usuarios con sus roles
    public function getUsuarios()
    {
        $usuarios = $this->_db->query(
                "select u.*,r.role from usuarios u, roles r ".
                "where u.role = r.id_role"
                );
        
        return $usuarios->fetchAll(PDO::FETCH_ASSOC);
    }
    //consigue un unico usuario con su rol con su Id.
    public function getUsuario($usuarioID)
    {
         $usuarios = $this->_db->query(
                "select u.usuario,r.role from usuarios u, roles r ".
                "where u.role = r.id_role and u.id = $usuarioID"
                );
        return $usuarios->fetch();
    }
    //Consigue los permisos de un unico usuario
    public function getPermisosUsuario($usuarioID)
    {
        $acl = new ACL($usuarioID);
        return $acl->getPermisos();
    }
    //Consigue los permisos de un rol que le pertenescan a un usuario especifico.
    public function getPermisosRole($usuarioID)
    {
        $acl = new ACL($usuarioID);
        return $acl->getPermisosRole();
    }
    //Elimina un unico permiso de un unico usuario 
    public function eliminarPermiso($usuarioID, $permisoID)
    {
        $this->_db->query(
                "delete from permisos_usuario where ".
                "usuario = $usuarioID and permiso = $permisoID"
                );
    }
    //Cambia un permiso de un usuario con el valor mandado.
    public function editarPermiso($usuarioID, $permisoID, $valor)
    {
        $this->_db->query(
                "replace into permisos_usuario set ".
                "usuario = $usuarioID , permiso = $permisoID, valor ='$valor'"
                );
    }
    
//LOGIN
    // consigue usuario con Usuario y Password
    public function getUsuario1($usuario, $password)
    {
            $datos = $this->_db->query("call sp_get_usuario('$usuario', '" 
                                        . Hash::getHash('sha1', $password, HASH_KEY) ."')");
                   /* 
                    query(
                    "select * from usuarios " .
                    "where usuario = '$usuario' " .
                    "and pass = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'"
                    );
                   */
            return $datos->fetch();    

    }
    
//REGISTRO
    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
                "select id, codigo from usuarios where usuario = '$usuario'"
                );
        
        return $id->fetch();
    }
    //Verifica la existencia de email
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select id from usuarios where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    //Registra usuario y produce un codigo de activación
    public function registrarUsuario($nombre, $usuario, $password, $email)
    {
    	$random = rand(1782598471, 9999999999);
		
        $this->_db->prepare(
                "insert into usuarios values" .
                "(null, :nombre, :usuario, :password, :email, 4, 0, now(), :codigo)"
                )
                ->execute(array(
                    ':nombre' => $nombre,
                    ':usuario' => $usuario,
                    ':password' => Hash::getHash('sha1', $password, HASH_KEY),
                    ':email' => $email,
                    ':codigo' => $random
                ));
    }
    //consigue los datos de usuario con Id and Codigo.
    public function getUsuario2($id, $codigo)
    {
        $usuario = $this->_db->query(
                                "select * from usuarios where id = $id and codigo = '$codigo'"
                                );

        return $usuario->fetch();
    }
    //cambia el estado de usuario de 0 a 1 (activación)
    public function activarUsuario($id, $codigo)
    {
        $this->_db->query(
                                "update usuarios set estado = 1 " .
                                "where id = $id and codigo = '$codigo'"
                                );
    }
    
}

?>

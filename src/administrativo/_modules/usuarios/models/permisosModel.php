<?php

class permisosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //consigue los usuarios con sus roles
    public function getUsuarios()
    {
        $usuarios = $this->_db->query(
                "select u.*,r.role from usuarios u, roles r ".
                "where u.role = r.id_role"
                );
        
        return $usuarios->fetchAll(PDO::FETCH_ASSOC);
    }
    //consigue un unico usuario con su rol.
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
}

?>

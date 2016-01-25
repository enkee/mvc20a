<?php

class usuariosModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function checkAdmin()
    {
        $permisos = array_merge(
                $this->getPermisosRole(Session::get('id_usuario')),
                $this->getPermisosUsuario(Session::get('id_usuario'))
                );
        
        foreach($permisos as $permiso){
            if($permiso['key'] == 'admin_access' && $permiso['valor'] == 1 ){
                //throw new Exception("<pre>" . $permiso['key'] . "</pre>");
                return 1;
            }
        }
    }
    //LOGIN
    // consigue usuario con Usuario y Password
    public function getUsuario1($usuario, $password)
    {
            $datos = $this->_db->query("call sp_get_usuario('$usuario', '" 
                                        . Hash::getHash('sha1', $password, HASH_KEY) ."')");
                   
            return $datos->fetch();    
    }
    
    //Consigue los permisos de un unico persona
    public function getPermisosUsuario($personaID)
    {
        $acl = new ACL($personaID);
        //throw new Exception("<pre>" . print_r($acl->getPermisosUsuario(),true) . "</pre>"); 
        return $acl->getPermisosUsuario();
        
    }
    //Consigue los permisos de un rol que le pertenescan a un persona especifico.
    public function getPermisosRole($personaID)
    {
        $acl = new ACL($personaID);
        return $acl->getPermisosRole();
    }
    
}
?>

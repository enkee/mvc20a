<?php

class loginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    //consigue los datos de usuario con usuario y password
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
       
}
?>

<?php

class activarModel extends Model
{
    //establece la coneccion
    public function __construct() {
        parent::__construct();
    }
    //verifica la existencia de usuario
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
    //consigue los datos de usuario
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

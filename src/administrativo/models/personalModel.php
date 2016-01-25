<?php

require_once ROOT . 'src' . DS . 'administrativo' . DS . 'models' . DS . 'usuariosModel.php';

class personalModel extends usuariosModel
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function getPersonal()
    {
        $personal = array();
        //throw new Exception(Session::get('admin'));
        /*Si es admin_access*/
        if(session::get('admin') == 1){
            $personal = $this->_db->query(
                "select p.*,r.role from personal p, roles r ".
                "where p.role = r.id_role"
                )->fetchall(PDO::FETCH_ASSOC);
        }
        
        foreach($this->_dbMod as $valor){
           $person = $valor->query(
                "select p.*,r.role from personal p, lima_ugel04_redcetpros.roles r ".
                "where p.role = r.id_role"
                );
           $personal = array_merge($personal,$person->fetchall(PDO::FETCH_ASSOC));
        }
        //throw new Exception("<pre>" . print_r($personal,true) . "</pre>");
        return $personal;
    }
    
    //consigue un unico persona con su rol por su Id.
    public function getPersona($personaID)
    {
         $persona = $this->_db->query(
                "select p.usuario, r.role from personal p, lima_ugel04_redcetpros.roles r ".
                "where p.role = r.id_role and p.id = $personaID"
                );
        //throw new Exception("<pre>" . print_r($persona,true) . "</pre>"); 
        return $persona->fetch();
    }
    
    
    //Elimina un unico permiso de un unico persona 
    public function eliminarPermiso($personaID, $permisoID)
    {
        $this->_db->query(
                "delete from permisos_usuario where ".
                "usuario = $personaID and permiso = $permisoID"
                );
    }
    //Cambia un permiso de un persona con el valor mandado.
    public function editarPermiso($personaID, $permisoID, $valor)
    {
        $this->_db->query(
                "replace into permisos_usuario set ".
                "usuario = $personaID , permiso = $permisoID, valor ='$valor'"
                );
    }

    //REGISTRO
    public function verificarPersona($usuario)
    {
        $id = $this->_db->query(
                "select id, codigo from personal where usuario = '$usuario'"
                );

        return $id->fetch();
    }
    //Verifica la existencia de email
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select id from personal where email = '$email'"
                );

        if($id->fetch()){
            return true;
        }

        return false;
    }
    //Registra persona y produce un codigo de activación
    public function registrarPersona($nombre, $persona, $password, $email)
    {
        $random = rand(1782598471, 9999999999);
        $password = Hash::getHash('sha1', $password, HASH_KEY);
        
        $this->_db->query(
                "insert into personal " . 
                "(nombre, usuario, pass, email, role, estado, fecha, codigo) " . 
                "values('$nombre', '$persona', '$password', '$email', 4, 0, NOW(), '$random')"
                );
    }
    //consigue los datos de persona con Id and Codigo.
    public function getPersona2($id, $codigo)
    {
        $persona = $this->_db->query(
                                "select * from personal where id = $id and codigo = '$codigo'"
                                );

        return $persona->fetch();
    }

}

?>

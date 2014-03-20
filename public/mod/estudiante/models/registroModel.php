<?php

class registroModel extends Model
{
    
    //establece la coneccion
    public function __construct() {
        parent::__construct();       
    }
    
    
    //verifica la existencia de estudiante
    public function verificarEstudiante($estudiante)
    {
        
        $id = $this->_dbMod[i]->query(
                "select id, usuario from estudiantes where usuario = '$estudiante'"
                );
        
        
         if($id->fetch()){
            return true;
        }
        
        return false;
    }
    //Verifica la existencia de email
    public function verificarEmail($email)
    {
        $id = $this->_dbMod[0]->query(
                "select id from estudiantes where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    //Registra estudiante y produce un codigo de activaciÃ³n
    public function registrarEstudiante($nombre, $usuario, $password, $email)
    {
    	$random = rand(1782598471, 9999999999);
        $password = Hash::getHash('sha1', $password, HASH_KEY);
		
        $this-> _dbMod[0]->query(
                "insert into estudiantes (nombre, usuario, pass, email, role, estado, fecha, codigo) " .
                "values ('$nombre','$usuario','$password','$email', 2, 1, now(), '$random')"
                );
    }
    //consigue los datos de estudiante
    public function getEstudiante($id, $codigo)
	{
                $estudiante = $this->_dbMod[0]->query(
					"select * from estudiantes where id = $id and codigo = '$codigo'"
					);
					
		return $estudiante->fetch();
	}
        
    public function getEstudiantes(){
                
                //for($i; $i<count($this->_dbMod);$i++){
                    
                    $estudiante = $this->_dbMod[0]->query(
                                            "select * from estudiantes"
                                            );

                    return $estudiante->fetchall(PDO::FETCH_ASSOC);
                    //$estudiantes = array_merge($estudiantes, $estudiante);
                //}
                
    }
    //cambia el estado de estudiante de 0 a 1 (activaciÃ³n)
    public function activarEstudiante($id, $codigo)
    {
           
            $this->_dbMod[0]->query(
                                    "update estudiantes set estado = 1 " .
                                    "where id = $id and codigo = '$codigo'"
                                    );
    }
    //desactiva al estudiante
    public function desactivarEstudiante($id, $codigo)
    {
            
            $this->_dbMod[0]->query(
                                    "update estudiantes set estado = 0 " .
                                    "where id = $id and codigo = '$codigo'"
                                    );
    }
    
}

?>

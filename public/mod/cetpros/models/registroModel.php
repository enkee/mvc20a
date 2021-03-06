<?php

require_once ROOT . 'libs' . DS . 'sqlejecution.php';

class registroModel extends cetproModel
{
    //establece la coneccion
    public function __construct() {
        parent::__construct();
    }
    public function verificarCetpro($cetpro)
    {
        $id = $this->_db->query(
                "select id_cetpro, nombre_cetpro from cetpros where nombre_cetpro = '$cetpro'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    //Verifica la existencia de email
    public function verificarClaveCetpro($clave)
    {
        $id = $this->_db->query(
                "select id_cetpro, clave_cetpro from cetpros where clave_cetpro = '$clave'"
                );
   
        if($id->fetch()){
            return true;
        }
       
        return false;
    }
    //Registra usuario y produce un codigo de activación
    public function registrarCetpro($nombre, $tipo, $clave)
    {
        //Ruta del archivo sql.
        $archivo = ROOT . 'public' . DS . 'files'. DS . 'modelo_tablas.sql' ;
        
        //Crea una nueva base de Datos.
        $this->_db->query("call sp_crear_cetpro('$clave')");
        
        //Conecta a la base de datos.
        $this->_dbMod[$clave] = new Database($clave);
          
        //print_r($this->_dbMod);
        
        //Ejecuta el script para crear las tablas de la base de datos
        executeSqlScript($this->_dbMod[$clave], $archivo);
        
        //Registra el CETPRO en la tabla cetpros.  
        $this->_db->query(
                "insert into cetpros " .
                "(nombre_cetpro, tipo_cetpro, clave_cetpro) " .
                "values('$nombre', '$tipo', '$clave')"
                );
    }
}

?>

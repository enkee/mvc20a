<?php

class indexModel extends cetproModel
{
    public function __construct()
    {
        parent::__construct();
    }
   
    
    //consigue los usuarios con sus roles
   public function getCetpros()
    {
        $cetpros = $this->_db->query(
                "select * from cetpros " .
                "where clave_cetpro <> 'redcetpros'"
                );
        
        return $cetpros->fetchAll(PDO::FETCH_ASSOC);
        
    }

}

?>

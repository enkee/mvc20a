<?php


class Model
{
    private $_registry;
    protected $_db;
    protected $_dbMod;
    
    public function __construct() {
        $this->_registry = Registry::getInstancia();
        //instancia la base de datos del sistema y la red
        $this->_db = $this->_registry->_db;
        //$this->_dbs = $this->_registry->_dbs;
        //instancia la base de datos de los cetpros
        $this->_dbMod = $this->_registry->_dbMod;
    }
}

?>

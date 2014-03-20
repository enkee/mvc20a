<?php

class ajaxModel extends Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    //Devuelve todos los paises
    public function getPaises()
    {
        $paises = $this->_db->query(
                "select * from paises"
                );
        return $paises->fetchAll();
    }
    //Devuelve todas las ciudades que sean de un pais.
    public function getCiudades($pais)
    {
        $ciudades = $this->_db->query(
                "select * from ciudades where pais={$pais}"
                );
                
        //declar el modo de Fetch.. consultar referencia para ver los modos..
        $ciudades->setFetchMode(PDO::FETCH_ASSOC);
        return $ciudades->fetchAll();
    }
    //Inserta una ciudad con su respectivo pais.
    public function insertarCiudad($ciudad, $pais)
    {
        $this->_db->query(
                "insert into ciudades values(null, '{$ciudad}','{$pais}')"
                );
    }
}

?>

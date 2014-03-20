<?php

/*Esta clase extiende a la clase OBJETOS DE DATOS DE PHP, la cual es una capa de abstracción
para trabajar con varias bases de datos, tiene varias funciones
para manejar base de datos, como para MySQL. */
class Database extends PDO
{
    //conecceion a la base de datos
    public function __construct($dbName=false) {
        if(!$dbName){
            parent::__construct(
                'mysql:host=' . DB_HOST .
                ';dbname=' . DB_NAME,
                DB_USER, 
                DB_PASS, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHAR
                    ));
        }else{
                parent::__construct(
                'mysql:host=' . DB_HOST .
                ';dbname=lima_ugel04_' . $dbName,
                DB_USER, 
                DB_PASS, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHAR
                    ));
        }
    }
}

?>

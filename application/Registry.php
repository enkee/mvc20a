<?php
require_once ROOT . 'src' . DS . 'administrativo' . DS .'models' . DS . 'cetprosModel.php';


//uso del singleton para asegurarse que solo exita una instacia de los objetos llamados.
class Registry
{
    //Intancia del registro 
    private static $_instancia;
    //Clases que van ha ser almacenadas en el registro
    private $_data;
    //public $_modelo;
    
    //no se pueda crear una instancia de la clase
    private function __construct() {
        //$this->_modelo = new cetproModel();
    }
    
    //singleton
    public static function getInstancia(){
        /*si instancia no contiene una instancia del registro entonces
        la crea*/ 
        if(!self::$_instancia instanceof self){
            self::$_instancia = new Registry();
        }
        //retorna la instancia del registro.
        return self::$_instancia;
    }
    //Guarda los objetos en el registro
    public function __set($name, $value) {
        //nombre del objeto y su valor
        $this->_data[$name] = $value;
    }
    
    //sobreescribe el metodo magico get
    public function __get($name) {
        //Si existe el objeto en el arreglo lo retorna
        if(isset($this->_data[$name])){
            return $this->_data[$name];
        }
        //Sino retorna falso
        return false;
    }
    public function dataBases(){
        $modelo = new cetprosModel();
        if(Session::get('id_role')){
            $id_role = Session::get('id_role');
            $clave_cetpro = Session::get('clave_cetpro');
            //verifica si el usuario pertenece a la red    
            if($id_role == 3 || $id_role == 5 || $id_role == 6 || $id_role == 7 || $id_role == 8 ){
                //consigue todos los cetpros de la red
                $cetpros = $modelo->getClaveCetpros();
                //recorre todos los cetpros
                for($i=0; $i<count($cetpros);$i++){
                    $clave_cetpro = $cetpros[$i]['clave_cetpro'];
                    $dataBases[$clave_cetpro] = new Database($clave_cetpro);
                }
                return $dataBases;
            }else{
                $dataBases[$clave_cetpro] = new Database($clave_cetpro);
                return $dataBases;
            }
        }
    }
}

?>
<?php

class Request
{
    private $_modulo;
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    private $_modules;
    private $_folders;
    
    //crea ruta: modulo/controlador/metodo/argumentos
    public function __construct() 
    {
        /* modulos de la app */
            $this->_modules = array('programacion');
            
            /* modulos y/o controladores por carpeta*/
            $this->_folders = array(
                                    'administrativo'=>array('cetpros','estudiantes','index','personal','usuarios','matriculas','calendario',
                                                            'horarios','aulas','inventarios'
                                                            ),
                                    'financiero'=>array('ingresos','egresos','caja'),
                                    'otros'=>array('ajax','post'),
                                    'pedagogico'=>array('programacion','informes'),
                                    'sistema'=>array('acl','error','security')
                                   );
            
        if(isset($_GET['url'])){
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);
            
            //en caso de que el modulo sea "login"
            
            //aqui iva los modules y controladores
            
            $this->_modulo = strtolower(array_shift($url));
            
            
            //si no exite modulo
            if(!$this->_modulo){
                $this->_modulo = false;
            }
            //si el modulo existe en el arreglo
            else{
                if(count($this->_modules)){
                    if(!in_array($this->_modulo, $this->_modules)){
                        $this->_controlador = $this->_modulo;
                        $this->_modulo = false;
                    }
                    //en caso el modulo no existiesa en el arreglo
                    else{
                        $this->_controlador = strtolower(array_shift($url));
                        //en caso no ubiera controlador
                        if(!$this->_controlador){
                            $this->_controlador = 'index';
                        }
                    }
                }
                //en caso no existieran modulos en el arreglo
                else{
                     $this->_controlador = $this->_modulo;
                     $this->_modulo = false;
                }
            }
            //se define el metodo con el elemento siguiente del arreglo
            $this->_metodo = strtolower(array_shift($url));
            //se define los agumentos con los elementos restantes
            $this->_argumentos = $url;           
        }       
        //En caso de no existir controlador
        if(!$this->_controlador){
            $this->_controlador = DEFAULT_CONTROLLER;
        }
        //En caso de no existir metodo
        if(!$this->_metodo){
            $this->_metodo = 'index';
        }
        //En caso de no existir argumentos
        if(!isset($this->_argumentos)){
            $this->_argumentos = array();
        }
    }
    
    //llama modulo
    public function getModulo()
    {
        return $this->_modulo;
    }
    //llama controlador
    public function getControlador()
    {
        return $this->_controlador;
    }
    //llama metodo
    public function getMetodo()
    {
        return $this->_metodo;
    }
    //llama argumentos
    public function getArgs()
    {
        return $this->_argumentos;
    }
    
    //consigue el folder
    public function getFolder($param)
    {
        //echo $param;
        //throw new Exception(print_r($this->_folders));
        
        $keys = array_keys($this->_folders);
        
        foreach ($keys as $key){
            if(in_array($param, $this->_folders[$key])){
               return $key;
            }
        }
        return 'el folder no exite';
    }
}

?>
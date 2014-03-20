<?php
/* Esta clase maneja las peticiones
 */
class Bootstrap
{
    public static function run(Request $peticion)
    {
        $modulo = $peticion->getModulo();
        $controller0 = $peticion->getControlador();
        $controller = $controller0 . 'Controller';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        //throw new Exception($modulo.' '.$controller0.' '.$metodo);
        if($modulo == false){
            /*
            if($controller0 == false){
                $folder = 'index';
            }*/
            $folder = $peticion->getFolder($controller0);
        }else{
            $folder = $peticion->getFolder($modulo);
        }
        
        //throw new Exception($folder);
        //si existe modulo entonces cargar el controlador del modulo
        if($modulo){
            $rutaModulo = ROOT . 'src' . DS .  $folder . DS . '_modules' . DS . $modulo . DS .'controllers' . DS . $controller . '.php';
            //throw new Exception($rutaModulo);
            if(is_readable($rutaModulo)){
                require_once $rutaModulo;
                $rutaControlador = ROOT . 'src' . DS .  $folder . DS . '_modules' . DS . $modulo . DS . 'controllers' . DS . $controller . '.php';
            }
            else{
                throw new Exception('Error de base de modulo');
            }
        }
        //caso contrario no es modulo, carga el controlador principal de la aplicación
        else{
            $rutaControlador =ROOT . 'src' . DS .  $folder . DS . 'controllers' . DS . $controller . '.php';
        }
        
        //throw new Exception($rutaControlador);
        
        //si la ruta del controlador se puede leer, entonces se crea el controlador
        if(is_readable($rutaControlador)){
            require_once $rutaControlador;
            //throw new Exception($rutaControlador . ' - ' . $controller);
            //Crea un nuevo objeto controllador,
            $controller = new $controller;
            //se llama al metodo del controllador
            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
            //si no hay ningun metodo se llama all metodo index
                $metodo = 'index';
            }
            
            // si hay argumentos entonces se llama al metodo con sus argumentos // PHP function: call_user_func 
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args);
            }
            //se llama al metodo sin argumentos // PHP function: call_user_func 
            else{
                call_user_func(array($controller, $metodo));
            }
            
        }else {
            //no se encuentra el controllador..
            throw new Exception('no encontrado');
        }
    }
}

?>
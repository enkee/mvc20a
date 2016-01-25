<?php


class Session
{
    //Inicia una session
    public static function init()
    {
        session_start();
    }
    //Estruye una variable de session o una session
    public static function destroy($clave = false)
    {
        if($clave){
            if(is_array($clave)){
                for($i = 0; $i < count($clave); $i++){
                    if(isset($_SESSION[$clave[$i]])){
                        unset($_SESSION[$clave[$i]]); //destruye session
                    }
                }
            }
            else{
                if(isset($_SESSION[$clave])){
                    unset($_SESSION[$clave]);
                }
            }
        }
        else{
            session_destroy();
        }
    }
    //Estable el valor de una variable de session
    public static function set($clave, $valor)
    {
        if(!empty($clave))
        $_SESSION[$clave] = $valor;
    }
    //consigue el valor de una variable de session.
    public static function get($clave)
    {
        if(isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }
    //Establece la session si se tienen los permisos suficientes
    public static function acceso($level)
    {
        if(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
        
        Session::tiempo();
        
        if(Session::getLevel($level) > Session::getLevel(Session::get('id_role'))){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
    }
    //Establece la sesion a una vista si se tiene los permisos suficientes.
    public static function accesoView($level)
    {
        if(!Session::get('autenticado')){
            return false;
        }
        
        if(Session::getLevel($level) > Session::getLevel(Session::get('id_role'))){
            return false;
        }
        
        return true;
    }
    //comprueba el nivel de usuario
    public static function getLevel($level)
    {
        $role['admin'] = 3;
        $role['especial'] = 2;
        $role['usuario'] = 1;
        
        if(!array_key_exists($level, $role)){
            throw new Exception('Error de acceso');
        }
        else{
            return $role[$level];
        }
    }
    //Establece la sesion si se tiene el permiso exacto, salvo sea administrador
    public static function accesoEstricto(array $level, $noAdmin = false)
    {
        if(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
        
        Session::tiempo();
        
        if($noAdmin == false){
            if(Session::get('id_role') == 'admin'){
                return;
            }
        }
        
        if(count($level)){
            if(in_array(Session::get('id_role'), $level)){
                return;
            }
        }
        
        header('location:' . BASE_URL . 'error/access/5050');
    }
    //Establece la session a una vista si se tiene el permiso exacto
    public static function accesoViewEstricto(array $level, $noAdmin = false)
    {
        if(!Session::get('autenticado')){
            return false;
        }
        
        if($noAdmin == false){
            if(Session::get('id_role') == 'admin'){
                return true;
            }
        }
        
        if(count($level)){
            if(in_array(Session::get('id_role'), $level)){
                return true;
            }
        }
        
        return false;
    }
    //Establece el tiempo para la session
    public static function tiempo()
    {
        if(!Session::get('tiempo') || !defined('SESSION_TIME')){
            throw new Exception('No se ha definido el tiempo de sesion'); 
        }
        
        if(SESSION_TIME == 0){
            return;
        }
        
        if(time() - Session::get('tiempo') > (SESSION_TIME) * 60){
            Session::destroy();
            setcookie("dcjq-accordion-1", "", -1, "/");
            header('location:' . BASE_URL . 'usuarios/login');
        }
        else{
            Session::set('tiempo', time());
        }
    }
}

?>
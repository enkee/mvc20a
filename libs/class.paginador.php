<?php

class Paginador
{
    private $_datos;
    private $_paginacion;
    
    public function __construct() {
        //inicializa los datos del paginador
        $this->_datos = array();
        $this->_paginacion = array();
    }
    //función principal realiza la paginación del conjunto de registros
    //tiene 4 parametros; la consulta, numero de paginas, el limite de paginas por vista y
    //la paginación, que es el numero de paginas para hacer clic.
    public function paginar($query, $pagina = false, $limite = false, $paginacion = false)
    {
        //comprueba si limite esta definido, sino se usa el predeterminado
        if($limite && is_numeric($limite)){
            $limite = $limite;
        } else {
            $limite = 10;
        }
        
        //comprueba que pagina esta definido y asigna la pagina de inicio a la primera pagina.
        if($pagina && is_numeric($pagina)){
            $pagina = $pagina;
            $inicio = ($pagina - 1) * $limite;
        } else {
            $pagina = 1;
            $inicio = 0;
        }
        
        //captura el numero de registros, el total de paginas
        $registros = count($query);
        $total = ceil($registros / $limite);
        //Toma los datos de la pagina
        $this->_datos = array_slice($query, $inicio, $limite);
               
        $paginacion = array();
        $paginacion['actual'] = $pagina;
        $paginacion['total'] = $total;
        $paginacion['limite'] = $limite;
        
        //si la pagina es mayor a uno activar primero y anterior
        if($pagina > 1){
            $paginacion['primero'] = 1;
            $paginacion['anterior'] = $pagina - 1;
        } else {
            $paginacion['primero'] = '';
            $paginacion['anterior'] = '';
        }
        //si pagina es menor a total activar ultimo y siguiente
        if($pagina < $total){
            $paginacion['ultimo'] = $total;
            $paginacion['siguiente'] = $pagina + 1;
        } else {
            $paginacion['ultimo'] = '';
            $paginacion['siguiente'] = '';
        }
        //asigna los datos de paginación en _paginacion
        $this->_paginacion = $paginacion;
        //llama a la función _rango de paginación para crear los rangos con la paginación
	$this->_rangoPaginacion($paginacion);
        //regresa los registros de la pagina
        return $this->_datos;
    }
    //
    private function _rangoPaginacion($limite = false)
    {
        //coprueba limite
        if($limite && is_numeric($limite)){
            $limite = $limite;
        } else {
            $limite = 10;
        }
        //define variables, total de paginas, pagina seleccionada y rango.
        $total_paginas = $this->_paginacion['total'];
        $pagina_seleccionada = $this->_paginacion['actual'];
        $rango = ceil($limite / 2);
        $paginas = array();
        //define rando derecho
        $rango_derecho = $total_paginas - $pagina_seleccionada;
        //si rango derecho es menor a la mitad de paginas entonces se define el resto de la vista
        //caso contrario no hay resto
        if($rango_derecho < $rango){
            $resto = $rango - $rango_derecho;
        } else {
            $resto = 0;
        }
        // se define el rango izquierdo
        $rango_izquierdo = $pagina_seleccionada - ($rango + $resto);
        //Mientras no se sobrepase la mitad del rango de paginas.
        for($i = $pagina_seleccionada; $i > $rango_izquierdo; $i--){
            if($i == 0){
                break;
            }
        //se crea el arreglo de paginas  
            $paginas[] = $i;
        }
       //se invierte el orden del arreglo de paginas 
        sort($paginas);
        //si se llega la tipo dercho entonces el rango derecho
        if($pagina_seleccionada < $rango){
            $rango_derecho = $limite;
        } else {
            $rango_derecho = $pagina_seleccionada + $rango;
        }
        //si se llega a la ultima pagina entonces salir sino se crea una nueva entrada en paginas
        for($i = $pagina_seleccionada + 1; $i <= $rango_derecho; $i++){
            if($i > $total_paginas){
                break;
            }
            
            $paginas[] = $i;
        }
        //devuelve el rango apaginación
        $this->_paginacion['rango'] = $paginas;
        //devuelve paginación
        return $this->_paginacion;
        
    }
    
    //consigue la vista para mostrar la paginación
    public function getView($vista, $link = false)
    {
        //consigue la ruta de vista (para este ejemplo)
        $rutaView = ROOT . 'src' . DS . 'otros' . DS . 'views' . DS . '_paginador' . DS . $vista . '.php';
        //declara la ruta para la vista (de forma generica para otras vistas)
        if($link)
            $link = BASE_URL . $link . '/';

        if(is_readable($rutaView)){
        //inicia el almacenamiento en buffer
            ob_start();

            include $rutaView;
            //copia el contenido del buffer en la variable contenido
            $contenido = ob_get_contents();
            //elimina el buffer
            ob_end_clean();
            //retorna el contenido 
            return $contenido;
        }

        throw new Exception('Error de paginacion');		
    }
}

?>

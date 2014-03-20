<?php

abstract class Widget
{
    /*Carga Modelos para los Widgets,
     de modo que cada uno tenga acceso a sus propios datos.*/ 
    protected function loadModel($model){
        if(is_readable(ROOT . 'widgets' . DS . 'models' . DS . $model . '.php')){
            include_once ROOT . 'widgets' . DS . 'models' . DS . $model . '.php';
            //creamos la clase del modelo.
            $modelclass = $model . 'Modelwidget';
            
            if(class_exists($modelclass)){
                return new $modelclass;
            }
        }
        throw new Exception('error modelo de widget');
    }
    
    /*Carga la vista del widget.
     *Un arreglo vacio en caso no halla nada que mandar
     *Una extension en caso se use una platilla de distinto formato*/
    protected function render($view, $data = array(), $ext = 'phtml'){
        if(is_readable(ROOT . 'widgets' . DS . 'views' . DS . $view . '.' . $ext)){
            ob_start();
            //convierte el arreglo en variables e incluye la vista widget
            extract($data);
            //adjunta la vista
            include ROOT . 'widgets' . DS . 'views' . DS . $view . '.' . $ext;
            //asigna todo el contenido a una variable 'contenido'
            $content = ob_get_contents();
            ob_end_clean();
            //regresa el contenido de la vista widget y las variables al metodo que lo llamo
            return $content;
        }
        // No se encuentra la vista del widget
        throw new Exception('error vista widget');
    }
}
?>

<?php
//ImportaciÃ³n de la libreria smarty
require_once ROOT . 'libs' . DS . 'smarty' . DS . 'libs' . DS . 'SmartyBC.class.php';

class View extends SmartyBC
{
    private $_request;
    private $_js;
    private $_acl;
    private $_rutas;
    private $_jsPlugin;
    private $_template;
    private static $_item;
    private $_widget;
    //private $template_dir;
    //private $config_dir;
   
    //Inicializa las variables de la vista
    public function __construct(Request $peticion, ACL $_acl) 
    {   
        //Contruye las variables para la la vista
        parent::__construct();
        $this->_request = $peticion;
        $this->_js = array();
        $this->_acl = $_acl;
        $this->_rutas = array();
        $this->_jsPlugin = array();
        $this->_template = DEFAULT_LAYOUT;
        self::$_item = null;
        
        //Verifica el modulo y/o controlador para cargar los archivos de la vista y los archivos js
        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();
        
        if($modulo){
            $this->_rutas['view'] = ROOT . 'src' . DS . $this->_request->getFolder($modulo) . DS . '_modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = BASE_URL . 'src/' . $this->_request->getFolder($modulo) . '/_modules/' . $modulo . '/views/' . $controlador . '/js/';
        }
        else{
            $this->_rutas['view'] = ROOT . 'src' . DS . $this->_request->getFolder($controlador) . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = BASE_URL . 'src/' . $this->_request->getFolder($controlador) . '/views/' . $controlador . '/js/';
        }
        //throw new Exception($this->_rutas['view'] . ' --- ' . $this->_rutas['js']);
    }
    //Esta funcion es creada para leer el valor del "item" fuera del controllador
    public static function getViewId()
    {
        return self::$_item; 
    }
    //Renderiza la vista completa
    public function renderizar($vista, $item = false, $noLayout = FALSE)
    {
        //para saber cuando va ha salir un menu seleccionado
        if($item){
            self::$_item = $item;
        }
        //Establece los directorios necesarios para la plantilla.
        $this->template_dir = ROOT . 'layouts'. DS . $this->_template . DS;
        $this->config_dir = ROOT . 'layouts' . DS . $this->_template . DS . 'configs' . DS;
        //throw new Exception(print_r($this->template_dir));
        $this->cache_dir = ROOT . 'tmp' . DS .'cache' . DS;
        $this->compile_dir = ROOT . 'tmp' . DS .'template' . DS;
        
        /*Si no esta autenticado entonces los valores del menu principal seran los de registro
        if(!Session::get('autenticado')){
            $menu[] = array(
                'id' => 'registro',
                'titulo' => 'Registro',
                'enlace' => BASE_URL . 'usuarios/registro',
                'imagen' => 'icon-book'
                );
        */
        //Establece los parametros para renderizar la vista
        $_params = array(
            'ruta_css' => BASE_URL . 'layouts/' . $this->_template . '/css/',
            'ruta_js' => BASE_URL . 'layouts/' . $this->_template . '/js/',
            'js' => $this->_js,
            'js_plugin' => $this->_jsPlugin,
            'root' => BASE_URL,
            'configs' => array(
                'app_name' => APP_NAME,
                'app_slogan' => APP_SLOGAN,
                'app_company' => APP_COMPANY),
            'user' => Session::get('usuario'),
            );
        /*
        if (Session::get('autenticado') == true){
        $_params = array_merge($_params, array(
            'usuario' => ucwords(strtolower(session::get('nombre') . " " . session::get('ape_pat') . " " . session::get('ape_mat'))),
            'cetpro_clave' => implode($this->_modelo->getClaveCetpro(session::get('id_cetpro'))),
            'cetpro' => implode($this->_modelo->getCetpro(session::get('id_cetpro'))),
            'role' => implode($this->_modelo->getRole(session::get('level'))),
        ));
        }
        */
        //si existe el archivo de la vista se asigna ha este y si no hay se coloca el predeterminado     
        
        if(is_readable($this->_rutas['view'] . $vista . '.tpl')){
            if($noLayout){
                //throw new Exception('no hay layout');
                $this->template_dir = $this->_rutas['view'];
                //el metodo 'display' muestra la vista predeterminada en pantalla
                $this->display($this->_rutas['view'] . $vista . '.tpl');
                exit;
            }
            //el metodo 'assign' asigna la vista hallada al contenido.
            $this->assign('_contenido', $this->_rutas['view'] . $vista . '.tpl');
        } 
        else {
            throw new Exception('Error de vista');
        }
        //Envia los widges a la vista (principalisimo)
        $this->assign('widgets', $this->getWidgets());
        //el metodo 'assign' asigna los permisos a la variable '_acl'.
        $this->assign('_acl', $this->_acl);
        //el metodo 'assign' asigna los parametros a la variable '_layoutParams'.
        $this->assign('_layoutParams', $_params);
        //el metodo 'display' de Smarty muestra la plantilla con la vista y todo.
        $this->display('template.tpl');
    }
    //Establece las rutas a los archivos .js que necesita la vista
    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = $this->_rutas['js'] . $js[$i] . '.js';
            }
        } 
        else {
            throw new Exception('Error de js');
        }
    }
    //Establece las rutas a los plugins .js que necesita la vista.
    public function setJsPlugin(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_jsPlugin[] = BASE_URL . 'public/js/' .  $js[$i] . '.js';
            }
        } 
        else {
            throw new Exception('Error de js plugin');
        }
    }
   //configura la layout en el controlador
    public function setTemplate($template)
    {
        $this->_template = (string) $template;
    }
    // Este funcion es una especie de bootstrap para los widgets
    public function widget($widget, $method, $options = array())
    {
        //si options es solo un valor (no arreglo) aqui se convierte en arreglo.
        if(!is_array($options)){
            $options = array($options);
        }
        //verificar la existencia del widget
        if(is_readable(ROOT . 'widgets' . DS . $widget . '.php')){
            include_once ROOT . 'widgets' . DS . $widget . '.php';
            //crea la variable de la clase del widget
            $widgetClass = $widget . 'widget';
            //comprueba si existe la clase
            if(!class_exists($widgetClass)){
                throw new Exception('error clase widget');
            }
            //comprueba si existe el metodo de la clase
            if(is_callable($widgetClass, $method)){
                if(count($options)){
                    //llama al metodo de la clase con opciones
                    return call_user_func_array(array(new $widgetClass, $method), $options);
                }
                else{
                    //llama al metodo de la clase sin opciones
                    return call_user_func(array(new $widgetClass, $method));
                }
            }
            //No existe el metodo
            throw new Exception('Error metodo widget');
        }
        //No exite el widget.
        throw new Exception('Error de widget');
    }
    //Consigue la configuracion de los layout
    public function getLayoutPositions()
    {
        //Verifica la existencia de los archivos de configuraciÃ³n del layout
        if(is_readable(ROOT . 'layouts' . DS . $this->_template . DS . 'configs.php')){
            include_once ROOT .  'layouts' . DS . $this->_template . DS . 'configs.php';
            //Retorna la configuracion del layout posiciones del layout disponibles
            return get_layout_positions();
        }
        //No existe archivo de configuracion del layout
        throw new Exception('Error configuracion layout');
    }
    //Consigue los widgets para las vistas (principal)
    public function getWidgets()
    {
        //configura los widgets para las vistas
        $widgets = array(
            'menu-sidebar' => array(
                //(falta arreglar)Consiue la configuracion para el widget menu
                'config' => $this->widget('menu', 'getconfig', array('sidebar')),
                /* Seteamos el contenido en un arreglo, debido a que:
                  no es necesario llenar el elemento con el contenido del widget
                 si no se va utilizar en esa vista, se conserva aqui en caso de que se
                 necesite llamar*/
                'content' => array('menu', 'getMenu', array('sidebar', 'sidebar')),
            ),
            'top' => array(
                //Consiue la configuracion para el widget
                'config' => $this->widget('menu', 'getconfig', array('top')),
                'content' => array('menu', 'getMenu', array('top','top')),
            )
        );
        //Consigue las posiciones del layout
        $positions = $this->getLayoutPositions();
        //consigue las claves de los widgets
        $keys = array_keys($widgets);
        //Recorre cada clave del widget
        foreach($keys as $k){
            /*Veririca si la posicion del widget esta presente*/
            if(isset($positions[$widgets[$k]['config']['position']])){
                /*Verifica si el widget esta inavilitado para esa vista*/
                if(!isset($widgets[$k]['config']['hide']) || !in_array(self::$item, $widgets[$k]['config']['hide'])){
                    /*Verificar si esta habilitado para la vista*/
                    if($widgets[$k]['config']['show'] === 'all' || in_array(self::$item, $widgets[$k]['config']['show'])){
                        if(isset($his->_widget[$k]))
                        {
                            $widgets[$k]['content'][2] = $this->_widget[$k];
                        }
                        
                        /*llena la posicion del layout con el widget (principal)*/
                        $positions[$widgets[$k]['config']['position']][] = $this->getWidgetContent($widgets[$k]['content']);
                    }
                }
            }
        }
        //Retorna las posiciones con los widgets 
        return $positions;
    }
    //Consigue el contenido del widget
    public function getWidgetContent(array $content)
    {
        //verifica si se esta enviando el widget y el metodo
        if(!isset($content[0]) || !isset($content[1])){
            throw new Exception('Error contenido widget');
            return;
        }
        //verifica las opciones
        if(!isset($content[2])){
            $content[2] = array();
        }
        //Retorna el contenido del widget
        return $this->widget($content[0],$content[1],$content[2]);
    }
    //Carga las opciones que se declaran en el controlador de la vista
    public function setWidgetOptions($key, $options)
    {
        $this->_widget[$key] = $options;
    }
}

?>

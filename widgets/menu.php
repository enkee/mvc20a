<!-- Controller Widget -->
<?php

class menuwidget extends Widget
{
    private $modelo;
    
    public function __construct() {
        //carga los modelos para el widget
        $this->modelo = $this->loadModel('menu');
    }
    //Consigue los valores del menu y carga parametros.
    public function getmenu($menu, $view, $inverse = null)
    {
        $data['menu'] = array();
        if(Session::get('autenticado')){
            $data['menu'] = $this->modelo->getMenu($menu);
            $data['inverse'] = $inverse;
        }
        return $this->render($view, $data);
    }
    //Retorna la configuracion de uno de los widget
    public function getConfig($menu)
    {
        $menus['sidebar'] =  array(
            'position' => 'sidebar',
            'show' => 'all',
            //'show' => array('inicio', 'post'),
            //'hide' => array('inicio')
        );
        
        $menus['top'] =  array(
            'position' => 'top',
            'show' => 'all',
            //'show' => array('inicio', 'post'),
            //'hide' => array('inicio')
        );
        
        return $menus[$menu];
    }
}

?>

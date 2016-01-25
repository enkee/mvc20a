<!-- Model widget -->
<?php

//require_once ROOT . 'src/administrativo' . DS . 'models' . DS . 'cetprosModel.php';

class menuModelwidget extends Model
{
    private $_modelo;
    
    public function __construct() {
        parent::__construct();
        //carga el registro para reutilizarlo
        $this->_registry = Registry::getInstancia();
        $this->_modelo = new cetprosModel();
    }
  // LLama a la funcion que carga uno de los menus
    public function getMenu($menu){
        //Llama a una funcion del ACL que carga los menus
        $menus['sidebar'] = $this->_registry->_acl->getMenusRole();
        
        if(Session::get('autenticado')){
            $titulos = array(
                array(
                    'id' => 'inicio',
                    'titulo' => 'Inicio',
                    'enlace' => BASE_URL,
                    'imagen' => 'icon-home'
                    ),

                array(
                    'id' => 'post',
                    'titulo' => 'Posts',
                    'enlace' => BASE_URL . 'post',
                    'imagen' => 'icon-flag'
                    ),
            );
            // para la redcetpros
            if(Session::get('clave_cetpro') == 'redcetpros' ){
                $nom_cetpro = 'Red CETPROS UGEL 04';
            }else{
                throw new Exception('hola mucamos');
                $nom_cetpro = 'CETPRO ' . implode($this->_modelo->getCetproFromClave(Session::get('clave_cetpro')));
            }
            
            $menus['top'] = array(
                'titulos' => $titulos,
                'ruta_img' => BASE_URL . 'layouts/sigace/img/',
                'usuario' => ucwords(strtolower(session::get('nombre') . " " . session::get('ape_pat') . " " . session::get('ape_mat'))),
                'cetpro_clave' => Session::get('clave_cetpro'),
                'cetpro' => $nom_cetpro,
                'role' => implode($this->_modelo->getRole(session::get('id_role'))),
            );
        }
        /*
        if(!Session::get('autenticado')){
            $menus['top'][] = array(
                'id' => 'registro',
                'titulo' => 'Registro',
                'enlace' => BASE_URL . 'usuarios/registro',
                'imagen' => 'icon-book'
                );
        }
        */
        return $menus[$menu];
    }
}

?>

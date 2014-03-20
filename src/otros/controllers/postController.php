<?php

class postController extends Controller
{
    private $_post;
    //Inicializa las varibles de la aplicación carga los modelos del post
    public function __construct() 
    {
        parent::__construct();
        $this->_view->setTemplate('twb');
        $this->_view->setWidgetOptions('menu-top', array('top', 'top', true));
        $this->_post = $this->loadModel('post');
    }
    //Carga la pagina inicial de los post
    public function index($pagina = false)
    {
    	/*
        for($i = 0; $i < 300; $i++){
                $model = $this->loadModel('post');
                $model->insertarPost('titulo ' . $i, 'cuerpo' . $i);
        }*/
        //comprueba si se ha mandado una pagina en especial
        if(!$this->filtrarInt($pagina)){
           $pagina = false;
        }
        else{
           $pagina = (int) $pagina;
        }
	//Llama a la libreria paginador
    	
	$paginador = new Paginador();
	//asigna el post a una pagina y esta a su vez es asignada a la variable post	
        $this->_view->assign('posts', $paginador->paginar($this->_post->getPosts(), $pagina));
        //asigna la vista prueba a paginador y esta a su vez es asignada a la variable paginacion
	$this->_view->assign('paginacion', $paginador->getView('prueba', 'post/index'));
        //asingna el titulo de la pagina y renderiza el index de la vista post con el item post.
        $this->_view->assign('titulo', 'Post');
        $this->_view->renderizar('index', 'post');
    }
    
    //manda al formulario para crear un nuevo post
    public function nuevo()
    {
        //verifica el rol y los permisos de usuario.
        $this->_acl->acceso('nuevo_post');
        //asigna titulo a la vista
        $this->_view->assign('titulo', 'Nuevo Post');
        //coloca el archivos js y js.validate.
        $this->_view->setJsPlugin(array('jquery.validate'));
        $this->_view->setJs(array('nuevo'));
        
        //si el archivo fue mandado entonces se asignan los valores de $_POST  a la variable datos.
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            //verifica si el post tiene titulo
            if(!$this->getTexto('titulo')){
                $this->_view->assign('_error', 'Debe introducir el titulo del post');
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }
            //verifica si el post tiene cuerpo
            if(!$this->getTexto('cuerpo')){
                $this->_view->assign('_error', 'Debe introducir el cuerpo del post');
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }
            
            $imagen = '';
            //verifica si se ha seleccionado un archivo tipo imagen
            if($_FILES['imagen']['name']){
                //se define la ruta de la imagen
                $ruta = ROOT . 'public' . DS . 'img' . DS . 'post' . DS;
                //Se crea un objeto upload con idioma español.
                $upload = new upload($_FILES['imagen'], 'es_Es');
                //se especifica el tipo de archivo.
                $upload->allowed = array('image/*');
                //se define un nombre para el archivo.
                $upload->file_new_name_body = 'upl_' . uniqid();
                //Se inicia la carga con la ruta destino especificada
                $upload->process($ruta);
                //si se ha logrado la carga entonces crear una miniatura con upload libreria.
                if($upload->processed){
                    $imagen = $upload->file_dst_name;
                    $thumb = new upload($upload->file_dst_pathname);
                    $thumb->image_resize = true;
                    $thumb->image_x = 100;
                    $thumb->image_y = 70;
                    $thumb->file_name_body_pre = 'thumb_';
                    $thumb->process($ruta . 'thumb' . DS);
                }
                //Se produjo un error al cargar el archivo, muestra de nuevo la vista nuevo.
                else{
                    $this->_view->assign('_error', $upload->error);
                    $this->_view->renderizar('nuevo', 'post');
                    exit;
                }
            }
            //Luego de guardarse la imagen entonces se guarda el post
            $this->_post->insertarPost(
                    $this->getPostParam('titulo'),
                    $this->getPostParam('cuerpo'),
                    $imagen
                    );
            //Se redicciona al index de post.
            $this->redireccionar('post');
        }       
        //Se renderiza nuevamente la vista nuevo del post.
        $this->_view->renderizar('nuevo', 'post');
    }
    
    public function editar($id)
    {
        //comprueba el acceso para editar post
        $this->_acl->acceso('editar_post');
        
        //si no existe el post se redirige al index del post
        if(!$this->filtrarInt($id)){
            $this->redireccionar('post');
        }
        //si no existe el post se redirecciona al index del post
        if(!$this->_post->getPost($this->filtrarInt($id))){
            $this->redireccionar('post');
        }
        //Asigna el titulo a la vista y coloca el archivo nuevo.js.
        $this->_view->assign('titulo', 'Editar Post');
        $this->_view->setJs(array('nuevo'));
        
        //Si el formulario fue mandado
        if($this->getInt('guardar') == 1){
            //se cargan los valores de $_POST a la variable datos.
            $this->_view->assign('datos', $_POST);
            //comprueba que el post tenga titulo
            if(!$this->getTexto('titulo')){
                $this->_view->assign('_error', 'Debe introducir el titulo del post');
                $this->_view->renderizar('editar', 'post');
                exit;
            }
            //comprueba que el post tenga cuerpo
            if(!$this->getTexto('cuerpo')){
                $this->_view->assign('_error', 'Debe introducir el cuerpo del post');
                $this->_view->renderizar('editar', 'post');
                exit;
            }
            //Edita el post, guarda los cambios.
            $this->_post->editarPost(
                    $this->filtrarInt($id),
                    $this->getPostParam('titulo'),
                    $this->getPostParam('cuerpo')
                    );
            //vuelve al index del post.
            $this->redireccionar('post');
        }
        //asigna el contenido del post a la variable datos y carga la vista editar del post
        $this->_view->assign('datos', $this->_post->getPost($this->filtrarInt($id)));
        $this->_view->renderizar('editar', 'post');
    }
    //Elimina un post.
    public function eliminar($id)
    {
        //compueba los permisos de acceso para eliminar.
        $this->_acl->acceso('eliminar_post');
        
        //comprueba el valor de $id
        if(!$this->filtrarInt($id)){
            $this->redireccionar('post');
        }
        //comprueba si existe el post
        if(!$this->_post->getPost($this->filtrarInt($id))){
            $this->redireccionar('post');
        }
        //elimina el post.
        $this->_post->eliminarPost($this->filtrarInt($id));
        $this->redireccionar('post');
    }
    //Esta funcion muestra la vista index de los post con paginación.
    public function prueba($pagina = false)
    {
        /*
        for($i = 0; $i < 300; $i++){
            $model = $this->loadModel('post');
            $model->insertarPrueba('nombre ' . $i);
        }
        */
        //crea un objeto paginador.
	$paginador = new Paginador();
	
        //Carga los modelos de ajax
        $ajaxModel = $this->loadModel('ajax');
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //asigna la lista de paises a la variable paises
        $this->_view->assign('paises', $ajaxModel->getPaises());
        //asigna las paginas de la prueba a la variable posts.
        $this->_view->assign('posts', $paginador->paginar($this->_post->getPrueba()));
        //asigna la vista paginacion_ajax a la variable paginacion.
	$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        //asigna el el titulo de vista
        $this->_view->assign('titulo', 'Post');
        //renderiza la vista prueba, con el item = prueba.
        $this->_view->renderizar('prueba', 'prueba');
   }
   //Esta función muestra la vista index de los post con paginación y con ajax.
   //con una serie de filtros.
   public function pruebaAjax()
   {
       //inicializa las variables
       $pagina = $this->getInt('pagina');
       $nombre = $this->getSql('nombre');
       $pais = $this->getInt('pais');
       $ciudad = $this->getInt('ciudad');
       $registros = $this->getInt('registros');
       $condicion = "";
       
       //filtro del nombre
       if($nombre){
           $condicion .= " AND nombre LIKE '$nombre%' ";
       }
       //filtro de pais
       if($pais){
           $condicion .= " AND id_pais = $pais ";
       }
       //filtro de ciudad
       if($ciudad){
           $condicion .= " AND id_ciudad = $ciudad ";
       }
       //crea una instancia del paginador.
        $paginador = new Paginador();
        //coloca el archivo prueba.js
        $this->_view->setJs(array('prueba'));
        //asigna los post de prueba con filtro a la variable posts
        $this->_view->assign('posts', $paginador->paginar($this->_post->getPrueba($condicion), $pagina, $registros));
        //asigna la vista paginacion_ajax a la varible paginacion
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        //carga la vista ajax/prueba, con los parametros establecidos.
        $this->_view->renderizar('ajax/prueba', false, true);
   }
}

?>

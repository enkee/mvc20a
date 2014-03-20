<?php

class postModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    //Consigue los post de la base de datos.
    public function getPosts()
    {
        //utiliza el objeto _db de la clase padre PDO
        $post = $this->_db->query("select * from posts");
        return $post->fetchall();
    }
    //Devuelve el post de un id
    public function getPost($id)
    {
        
        $id = (int) $id;
        $post = $this->_db->query("select * from posts where id = $id");
        return $post->fetch();
    }
    //inserta un nuevo post
    public function insertarPost($titulo, $cuerpo, $imagen)
    {
        $this->_db->prepare("INSERT INTO posts VALUES (null, :titulo, :cuerpo, :imagen)")
                ->execute(
                        array(
                           ':titulo' => $titulo,
                           ':cuerpo' => $cuerpo,
                           ':imagen' => $imagen
                        ));
    }
    //Edita un post
    public function editarPost($id, $titulo, $cuerpo)
    {
        $id = (int) $id;
        
        $this->_db->prepare("UPDATE posts SET titulo = :titulo, cuerpo = :cuerpo WHERE id = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':titulo' => $titulo,
                           ':cuerpo' => $cuerpo
                        ));
    }
    //Elimina un Post
    public function eliminarPost($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM posts WHERE id = $id");
    }
    //Inserta en registro en la tabla pruebas
    public function insertarPrueba($nombre)
    {
        $this->_db->prepare("INSERT INTO prueba VALUES (null, :nombre)")
                ->execute(
                        array(
                           ':nombre' => $nombre
                        ));
    }
    //devuelve una consulta; Nombres pais y ciudad.
    public function getPrueba($condicion = "")
    {
        $post = $this->_db->query(
                "select r.*, p.pais, c.ciudad from prueba r, paises p, ciudades c " . 
                "where r.id_pais = p.id and r.id_ciudad = c.id $condicion order by id asc"
                );
        return $post->fetchAll();
    }
    
}

?>

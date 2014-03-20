<?php

class indexModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //consigue los estudiantes con sus roles
    public function getEstudiantes()
    {
        $estudiantes = array();
        foreach($this->_dbMod as $valor){
            $estudiante = $valor->query(
                "select * from estudiantes"
                );
           $estudiantes = array_merge($estudiantes,$estudiante->fetchall(PDO::FETCH_ASSOC));
        }
       
        return $estudiantes;
        
    }
    //consigue un unico estudiante con su rol.
    public function getEstudiante($estudianteID)
    {
         $estudiantes = $this->_db->query(
                "select usuario from estudiantes ".
                "where id = $estudianteID"
                );
        return $estudiantes->fetch();
    }
    //Consigue los permisos de un unico estudiante
    public function getPermisosEstudiante($estudianteID)
    {
        $acl = new ACL($estudianteID);
        return $acl->getPermisos();
    }
    //Consigue los permisos de un rol que le pertenescan a un estudiante especifico.
    public function getPermisosRole($estudianteID)
    {
        $acl = new ACL($estudianteID);
        return $acl->getPermisosRole();
    }
    //Elimina un unico permiso de un unico estudiante 
    public function eliminarPermiso($estudianteID, $permisoID)
    {
        $this->_db->query(
                "delete from permisos_estudiante where ".
                "estudiante = $estudianteID and permiso = $permisoID"
                );
    }
    //Cambia un permiso de un estudiante con el valor mandado.
    public function editarPermiso($estudianteID, $permisoID, $valor)
    {
        $this->_db->query(
                "replace into permisos_estudiante set ".
                "estudiante = $estudianteID , permiso = $permisoID, valor ='$valor'"
                );
    }
}

?>

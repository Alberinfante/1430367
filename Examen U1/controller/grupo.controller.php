<?php
require_once 'model/grupo.php';

class GrupoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Grupo();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alumno/alumno.php';
    }
    
    public function CrudGrupo(){
        $grp = new Grupo();
        
        if(isset($_REQUEST['id'])){
            $grp = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/alumno/grupo-editar.php';
    }
    
    public function GuardarGrupo(){
        $grp = new Grupo();
        
        $grp->id = $_REQUEST['id'];
        $grp->matricula = $_REQUEST['cuatrimestre'];
        $grp->nombre = $_REQUEST['nombre'];

        $grp->id > 0 
            ? $this->model->ActualizarGrupo($grp)
            : $this->model->RegistrarGrupo($grp);
        
        header('Location: index.php');
    }
    
    public function EliminarGrupo(){
        $this->model->EliminarGrupo($_REQUEST['id']);
        header('Location: index.php');
    }
}
<?php
require_once 'model/alumno.php';

class AlumnoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alumno/alumno.php';
    }
    
    public function Crud(){
        $alm = new Alumno();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/alumno/alumno-editar.php';
    }
    
    public function Guardar(){
        $alm = new Alumno();
        
        $alm->id = $_REQUEST['id'];
        $alm->matricula = $_REQUEST['matricula'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->apellidos = $_REQUEST['apellidos'];
        $alm->carrera = $_REQUEST['carrera'];
        $alm->ano_ingreso = $_REQUEST['ano_ingreso'];
        $alm->id_grupo = $_REQUEST['id_grupo'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
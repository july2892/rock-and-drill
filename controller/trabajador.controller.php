<?php
require_once 'model/trabajador.php';

class TrabajadorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Trabajador();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/trabajador/trabajador.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $tra = new Trabajador();

        if(isset($_REQUEST['id'])){
            $tra = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/trabajador/trabajador-edit.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $tra = new Trabajador();
        
        $tra->id = $_REQUEST['id'];
        $tra->nombre = $_REQUEST['nombre'];
        $tra->apellido_p = $_REQUEST['ap_paterno'];
        $tra->apellido_m = $_REQUEST['ap_materno'];
        $tra->tipo_doc = $_REQUEST['tipoDoc'];
        $tra->num_doc = $_REQUEST['num_doc'];
        $tra->sexo = $_REQUEST['sexo'];
        $tra->fecha_nacimiento = $_REQUEST['fecha_nac'];
        $tra->departamento = $_REQUEST['departamento'];
        $tra->provincia = $_REQUEST['provincia'];
        $tra->distrito = $_REQUEST['distrito'];
        $tra->direccion = $_REQUEST['direccion'];

        $tra->id > 0 
            ? $this->model->Actualizar($tra)
            : $this->model->Registrar($tra);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
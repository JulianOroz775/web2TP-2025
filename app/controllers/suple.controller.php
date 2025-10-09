<?php 

require_once './app/models/suple.model.php';
include_once 'app/models/suple.model.php';
include_once 'app/views/suple.views.php';


class SupleController{
    private $model;
    private $view;


    function __construct(){
        $this->view = new SupleView();
        $this->model = new SupleModel();
    }


    //listo los suplementos
    function showSuplementos(){

        //obtengo las tareas del modelo
       $suplementos = $this->model->getAll();
    
       //le mando a la vista los suplementos, asi los muestra
       $this->view->showSuples($suplementos);
    }

    // listo un suplemento en especial
    //obtengo los suplementos
    function showSuplemento($id){

        //obtengo las tareas del modelo
       $suplementos = $this->model->get($id);
    
       //le mando a la vista los suplementos, asi los muestra
       $this->view->showSuple($suplementos);
    }


    function addSuplemento(){
        
        //obtengo los datos del usuario
        $Marca = $_POST['Marca'];
        $Nombre = $_POST['Nombre'];
        $Prioridad = $_POST['Prioridad'];

        //valido datos 
        if(empty($Marca) || empty($Prioridad)){
            $this->view->showError("Faltan datos obligatorios");
            die();
        }

        //inserto en la db

        $id = $this->model->insert($Marca,$Nombre,$Prioridad);

        if($id){
            //redirigo a la pantalla principal
            header('Location: ' . BASE_URL);
        }else{
            echo "Error al insertar tarea";
        }

    }

    
    function removeSuplemento($id){
        
        $this->model->remove($id);
        
        header('Location: ' . BASE_URL);
    
    }


     function finishSuplemento($id){
        
        $this->model->update($id);
        
        header('Location: ' . BASE_URL);
        
    }
}

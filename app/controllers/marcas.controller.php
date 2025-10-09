<?php 

include_once 'app/models/marcas.model.php';
include_once 'app/views/marcas.views.php';
include_once 'app/views/suple.views.php';

class MarcasController{

    private $model;
    private $view;
    private $Sview;

    function __construct(){
        $this->view = new MarcasView();
        $this->model = new MarcasModel();
        $this->Sview = new SupleView();
    }


     //listo los suplementos
    function showMarcas(){

        //obtengo las tareas del modelo
       $marcas = $this->model->getAll();
    
       //le mando a la vista los suplementos, asi los muestra
       $this->view->showMarcas($marcas);
    }

    function showMarcabyID($id){

        //obtengo las tareas del modelo
       $marcas = $this->model->getAllbyID($id);
    
       //le mando a la vista los suplementos, asi los muestra
       $this->Sview->showSuples($marcas);
    }

}
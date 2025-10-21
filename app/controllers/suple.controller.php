<?php 

include_once 'app/models/marcas.model.php';
include_once 'app/models/suple.model.php';
include_once 'app/views/suple.views.php';


class SupleController{
    private $model;
    private $view;
    private $marcasModel;


    function __construct(){
        $this->view = new SupleView();
        $this->model = new SupleModel();
        $this->marcasModel= new MarcasModel();
    }


    //listo los suplementos
    function showSuplementos(){

        //obtengo las tareas del modelo
       $suplementos = $this->model->getAll();
       $marcas = $this->marcasModel->getAll();
    
       //le mando a la vista los suplementos, asi los muestra
       $this->view->showSuples($suplementos,$marcas);
    }

    // listo un suplemento en especial
    //obtengo los suplementos
    function showSuplemento($id){

        //obtengo las tareas del modelo
       $suplemento = $this->model->get($id);
       $marca= $this->marcasModel->get($suplemento->marca_id);


       //le mando a la vista los suplementos, asi los muestra
       $this->view->showSuple($suplemento,$marca);
    }


   
    
}

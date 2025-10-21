<?php 

include_once 'app/models/marcas.model.php';
include_once 'app/views/marcas.views.php';

class MarcasController{

    private $model;
    private $view;

    function __construct(){
        $this->view = new MarcasView();
        $this->model = new MarcasModel();
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
       $marca = $this->model->get($id);
       $suplementos = $this->model->getAllbyID($id);
    
       //le mando a la vista los suplementos, asi los muestra
       $this->view->showSuplesByMarca($suplementos,$marca);
    }

}
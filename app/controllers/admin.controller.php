<?php 

    include_once 'app/models/marcas.model.php';
    include_once 'app/views/marcas.views.php';
    include_once 'app/views/suple.views.php';
    include_once 'app/models/suple.model.php';
    include_once 'app/views/admin.views.php';


class AdminController {

        private $SupleModel;
        private $SupleView;
        private $MarcasView;
        private $MarcasModel;
        private $view;


        function __construct(){
            
            $this->MarcasView = new MarcasView();
            $this->MarcasModel = new MarcasModel();
            $this->SupleView = new SupleView();
            $this->SupleModel = new SupleModel();
            $this->view = new AdminView();

        }


        function admin(){

            $this->view->adminView();

        }


        function adminMarcas(){

            $Marcas= $this->MarcasModel->getAll();


            $this->view->adminMarcasView($Marcas);

        }

        function adminSuplementos(){

            $this->view->adminView();

        }

        function addMarca(){
        
        //obtengo los datos del usuario
        $Marca = $_POST['Marca'];
    
        //valido datos 
        if(empty($Marca)){
            $this->SupleView->showError("Faltan datos obligatorios");
            die();
        }

        //inserto en la db

        $id = $this->MarcasModel->insert($Marca);

        if($id){
            //redirigo a la pantalla principal
            header('Location: ' . BASE_URL);
        }else{
            echo "Error al insertar tarea";
        }

    }


    }   


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

            $Suplementos= $this->SupleModel->getAll();
            $Marcas= $this->MarcasModel->getAll();

            $this->view->adminSupleView($Suplementos,$Marcas);

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
                header('Location: ' . BASE_URL . 'adminMarcas');
            }else{
                echo "Error al insertar tarea";
            }

        }

         function editarMarca(){
        
            //obtengo los datos del usuario
            $Marca = $_POST['Marca'];

            $id = (int)$_POST['id'];
        
            //valido datos 
            if(empty($Marca)){
                $this->SupleView->showError("Faltan datos obligatorios");
                die();
            }

            $this->MarcasModel->update($Marca,$id);

            header('Location: ' . BASE_URL . 'adminMarcas');
        }

        function deleteMarca($id){

            $this->MarcasModel->delete($id);

            header('Location: ' . BASE_URL . 'adminMarcas');

        }

        //Suplementos

        function addSuplemento(){
            $Nombre = $_POST['Nombre'];
            $Stock = $_POST['Stock'];
            $Id_Marca = $_POST['id_marca'];
            $Marca = $this->MarcasModel->getbyID($Id_Marca);
            $M= $Marca->Marca;
            
           
           
            if( empty($Id_Marca) || empty($Stock)){
                $this->SupleView->showError("Faltan datos obligatorios");
                die();
            }

            $this->SupleModel->insert($M,$Nombre,$Stock,$Id_Marca);

          
            header('Location: ' . BASE_URL . 'adminSuplementos');
           
        }

        function editarSuplemento(){

            $id = (int)$_POST['id'];
            $Nombre = $_POST['Nombre'];
            $Stock = $_POST['Stock'];
            $Id_Marca = $_POST['id_marca'];
            $Marca = $this->MarcasModel->getbyID($Id_Marca);
            $M= $Marca->Marca;
            
            
            if( empty($Id_Marca) || empty($Stock) || empty($Nombre)){
                $this->SupleView->showError("Faltan datos obligatorios");
                die();
            }

            $this->SupleModel->update($M,$Nombre,$Stock,$Id_Marca,$id);

          
            header('Location: ' . BASE_URL . 'adminSuplementos');
        }

        function deleteSuplemento($id){

            $this->SupleModel->delete($id);

            header('Location: ' . BASE_URL . 'adminSuplementos');

        }
        
    }   


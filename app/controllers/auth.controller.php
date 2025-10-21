<?php 

include_once 'app/views/auth.views.php';
include_once 'app/models/user.model.php';


class AuthContoller{

    private $view;
    private $model;



    function __construct(){
        
        $this->view = new AuthView();
        $this->model = new UserModel();

    }


    function showLogin(){

        $this->view->login();
    }


    function login(){

        if (!isset($_POST['nombre_usuario']) || empty($_POST['nombre_usuario'])) {
            $this->view->showError('Falta completar el nombre de usuario');
            die();

        }
    
        if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            $this->view->showError('Falta completar la contraseña');
            die();
            
        }


        $username = $_POST['nombre_usuario'];
        $password = $_POST['contraseña'];


        $userDB = $this->model->getByUsername($username);

        
        //encontro un usuario con el username que mando, y tiene la contraseña

        if( !empty($userDB) && password_verify($password,$userDB->contraseña)){

            //inicio la session y logueo al usuario
            
            session_start();
            $_SESSION['ID_USER'] = $userDB->id;
            $_SESSION['USERNAME'] = $userDB->usuario;

            header('Location:'.BASE_URL.'admin');

        }else{

            $this->view->showError("Login Incorrecto");
            header('Location:'.BASE_URL.'marcas');


        }

    }

    
    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }



}
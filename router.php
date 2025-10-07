<?php

include_once 'app/controllers/suple.controller.php';


// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'listar'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);


switch($params[0]){

    case 'listar':
        
        $SupleController = new SupleController(); 
        $SupleController->showSuplementos();

        break;

   case 'agregar':
        
        $SupleController = new SupleController(); 
        $SupleController->addSuplemento();
        
        break;

    case 'eliminar':

        $SupleController = new SupleController(); 
        $SupleController->removeSuplemento($params[1]);
       
        break;

   
    case 'finalizar':

        $SupleController = new SupleController(); 
        $SupleController->finishSuplemento($params[1]);

        break;
    
    default:
        
        header("HTTP/1.0 404 Not Found");
        echo "404 Page Not Found";
       
        break;

}

?>
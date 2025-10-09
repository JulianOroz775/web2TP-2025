<?php

include_once 'app/controllers/suple.controller.php';
include_once 'app/controllers/marcas.controller.php';
include_once 'app/controllers/admin.controller.php';


// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'marcas'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);


switch($params[0]){

    // vista Marcas-Suplementos
    case 'listar':
        
        $SupleController = new SupleController(); 
        $SupleController->showSuplementos();

        break;
    
    case 'marcas':
        
        $MarcasController = new MarcasController();
        $MarcasController->showMarcas();
        
        break;
    
    case 'marca':
        
        $MarcasController = new MarcasController();
        $MarcasController->showMarcabyID($params[1]);
        
        break;    

    case 'suplemento':

        $SupleController = new SupleController(); 
        $SupleController->showSuplemento($params[1]);

        break;

    // MODO ADMIN: 
    case 'admin':
        
        $AdminController = new AdminController();
        $AdminController->admin();
        
        break;   

    case 'adminMarcas':
        
        $AdminController = new AdminController();
        $AdminController->adminMarcas();
        
        break;
    
    case 'adminSuplementos':
        
        $AdminController = new AdminController();
        $AdminController->adminSuplementos();
        
        break;

    case 'agregarMarca':
        
        $AdminController = new AdminController();
        $AdminController->addMarca();
        
        break;

    case 'agregarSuple':
        
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
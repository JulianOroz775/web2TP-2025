<?php
require_once 'app/libs/response.php';
include_once 'app/controllers/suple.controller.php';
include_once 'app/controllers/marcas.controller.php';
include_once 'app/controllers/admin.controller.php';
include_once 'app/controllers/auth.controller.php';

// ⬇️ Middlewares
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'marcas'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);




switch($params[0]){

    // vista Marcas-Suplementos
    case 'showLogin':
        
        $AuthController = new AuthContoller(); 
        $AuthController->showLogin();

        break;
    
    case 'login':
        
        $AuthController = new AuthContoller(); 
        $AuthController->login();

        break;
     
    case 'logout':
        
        $AuthController = new AuthContoller(); 
        $AuthController->logout();

        break;    
    
    
    
    case 'suplementos':
        
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
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $AdminController = new AdminController();
        $AdminController->admin();
        
        break;   

    case 'adminMarcas':
        
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login

        $AdminController = new AdminController();
        $AdminController->adminMarcas();
        
        break;
    
    case 'adminSuplementos':
        
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login

        $AdminController = new AdminController();
        $AdminController->adminSuplementos();
        
        break;

    case 'agregarMarca':

        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        
        $AdminController = new AdminController();
        $AdminController->addMarca();
        
        break;

    case 'editarMarca':
        
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login

        $AdminController = new AdminController();
        $AdminController->editarMarca();
        
        break;

     case 'eliminarMarca':

        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        
        $AdminController = new AdminController();
        $AdminController->deleteMarca($params[1]);
        
        break;    

    case 'agregarSuplemento':

        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        
        $AdminController = new AdminController();
        $AdminController->addSuplemento();
        
        break;
    
    case 'editarSuplemento':

        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        
        $AdminController = new AdminController();
        $AdminController->editarSuplemento();
        
        break;    

    case 'eliminarSuplemento':

        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login

        $AdminController = new AdminController();
        $AdminController->deleteSuplemento($params[1]);
       
        break;

    
    default:
        
        header("HTTP/1.0 404 Not Found");
        echo "404 Page Not Found";
       
        break;

}

?>
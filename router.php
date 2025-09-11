<?php

require_once 'app/suplementos.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'listar'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);


switch($params[0]){

    case 'listar':

        showSuplementos();

        break;

    case 'agregar':

        addSuplemento();

        break;

    case 'eliminar':

        removeSuplemento($params[1]);

        break;

    case 'finalizar':

        finishSuplemento($params[1]);

        break;


    default:
        echo "404 Page Not Found";

        break;

}

?>
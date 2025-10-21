<?php 

    include_once 'app/views/suple.views.php';


class AdminView{

    /*

        *ADMIN VIEW

    */
     function adminView(){

        require 'templates/vista_admin.phtml';

    }

    
    function adminMarcasView($marcas){

        require 'templates/vista_admin_marcas.phtml';

    }


    function adminSupleView($productos,$marcas){

        require 'templates/vista_admin_suplementos.phtml';

    }

}
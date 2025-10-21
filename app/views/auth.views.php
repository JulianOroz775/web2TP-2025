<?php



class AuthView{


    function login(){

        include 'templates/form.login.phtml';
    }

     function showError($msg)
    {
        echo "<h1> ERROR! </h1>";
        echo "<h2> $msg </h2>";
    }

}
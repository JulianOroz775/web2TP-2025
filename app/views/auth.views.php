<?php



class AuthView{


    function login(){

        include 'templates/form.login.phtml';
    }

     function showError($msg){
        require 'templates/error.phtml';
    }

}
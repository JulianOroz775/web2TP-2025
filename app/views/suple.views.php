<?php

class SupleView{

    function showError($msg){
        require 'templates/error.phtml';
    }



    function showSuples($productos,$marcas){

        require 'templates/lista_productos.phtml';
    }

    function showSuple($producto,$marca){

        require 'templates/lista_producto.phtml';
    }

}

<?php


class MarcasView{

    function showMarcas($marcas){
        
        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/lista_marcas.phtml';
    }

     function showSuplesByMarca($suplementos,$marca){
            
          require 'templates/lista_producto_marca.phtml';
    }
}

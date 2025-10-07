<?php

class SupleView{


    //muestro los suplementos
    function showSuples($suplementos){

        include  'templates/header.php';
        include 'templates/form.php';

        ?>
        <ul class="list-group">
            <?php
            foreach($suplementos as $suplemento){ ?>

                <li class="list-group-item item-suplemento <?php if(!$suplemento->Stock) echo 'finalizada' ?>">
                    <div>
                        <b class= "font-weight-bold"><?php echo $suplemento->Marca ?> </b> | <?php echo $suplemento->Nombre ?> 
                    </div>
                    <div>
                        <a href="eliminar/<?php echo $suplemento->Suplemento_ID ?>" type="button" class='btn btn-danger m1-auto'>Borrar</a>    
                        <?php
                        if($suplemento->Stock){ ?>
                        <a href="finalizar/<?php echo $suplemento->Suplemento_ID ?>" type="button" class='btn btn-success m1-auto'>Finalizar</a>
                        <?php }?>
                    </div>

                </li>
            
            <?php } ?>



            
            
                </ul>

            <?php
        
        include 'templates/footer.php';

    }

    function showError($msg){
        echo "<h1> ERROR! </h1>";
        echo "<h2> $msg </h2>";

    }
}



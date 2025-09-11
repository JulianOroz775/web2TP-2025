<?php 

require_once './app/db.php';

//obtengo los suplementos


function showSuplementos(){

    require_once 'templates/header.php';

    $suplementos = getSuplementos();

    require_once 'templates/form.php';

    ?>
    <ul class="list-group">
    <?php
    foreach($suplementos as $suplemento){ ?>

        <li class="list-group-item item-suplemento <?php if($suplemento->Stock) echo 'finalizada' ?>">
            <div>
                <b class= "font-weight-bold"><?php echo $suplemento->Marca ?> </b> | <?php echo $suplemento->Nombre ?> 
            </div>
            <div>
                <a href="eliminar/<?php echo $suplemento->Suplemento_ID ?>" type="button" class='btn btn-danger m1-auto'>Borrar</a>    
                <?php
                if(!$suplemento->Stock){ ?>
                <a href="finalizar/<?php echo $suplemento->Suplemento_ID ?>" type="button" class='btn btn-success m1-auto'>Finalizar</a>
                <?php }?>
            </div>

        </li>
    
    <?php } ?>



    
    
    </ul>

<?php
        require_once 'templates/footer.php';

}
 
 ?>

 <?php

 function addSuplemento(){
    
    // falta validar datos 

    //obtengo los datos del usuario
    $Marca = $_POST['Marca'];
    $Nombre = $_POST['Nombre'];
    $Prioridad = $_POST['Prioridad'];


    //inserto en la db

    $id = insertSuplemento($Marca,$Nombre,$Prioridad);

    if($id){
        //redirigo a la pantalla principal
        header('Location: ' . BASE_URL);
    }else{
        echo "Error al insertar tarea";
    }

 }

 function removeSuplemento($id){
    
    deleteSuplemento($id);
    header('Location: ' . BASE_URL);
 }


 function finishSuplemento($id){
    
    updateSuplemento($id);
    header('Location: ' . BASE_URL);
    
 }


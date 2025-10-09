<?php 


class AdminView{


    /*

        *ADMIN VIEW

    */
     function adminView(){

            include  'templates/header.php';

            ?>
            <div class="container mt-4">
                <h2 class="mb-4 text-center">A D M I N</h2>

                <div class="row g-3">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a
                                href="adminMarcas"
                                class="text-decoration-none text-dark"
                                style="display:block"
                                title="Ver suplemento">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">
                                            <strong>Administrar Marcas</strong>
                                        </h5>
                            
                                    </div>
                                </div>
                            </a>
                        </div>
                         <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a
                                href="marca/"
                                class="text-decoration-none text-dark"
                                style="display:block"
                                title="Ver suplemento">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">
                                            <strong>Administrar Suplementos</strong>
                                        </h5>
                            
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>
            </div>

        <?php

        include 'templates/footer.php';
    }

    
    function adminMarcasView($suplementos){

        include  'templates/header.php';
        include 'templates/form.marcas.php';

        ?>
        <ul class="list-group">
            <?php
            foreach($suplementos as $suplemento){ ?>

                <li class="list-group-item item-suplemento ">
                    <div>
                        <b class= "font-weight-bold"><?php echo $suplemento->Marca ?> </b>
                    </div>
                    <div>
                        <a href="eliminar/<?php echo $suplemento->Suplemento_ID ?>" type="button" class='btn btn-danger m1-auto'>Borrar</a>    
                    </div>

                </li>
            
            <?php } ?>



            
            
                </ul>

            <?php
        
        include 'templates/footer.php';

    }

}
<?php 

    include_once 'app/views/suple.views.php';


class AdminView{

    private $viewSuple;

    function __construct(){
        
        $this->viewSuple = new SupleView();
    }

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
                                href="adminSuplementos"
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
        include 'templates/form.marcas.php'

        ?>
        <form method="POST" class="p-4 bg-light rounded-3 shadow-sm">

            <div class="mb-3">
                <label for="marca" class="form-label">Editar :</label>
                <input type="text" name="Marca" class="form-control" id="marca" >
            </div>
        
          <ul class="list-group">
                <?php
                    foreach($suplementos as $suplemento){ ?>

                        <li class="list-group-item item-suplemento ">
                            <div>
                                <b class= "font-weight-bold"><?php echo $suplemento->Marca ?> </b>
                            </div>
                            <div>
                                 <button
                                    type="submit"
                                    class="btn btn-warning"
                                    formmethod="post"
                                    formaction="editarMarca"
                                    name="id"
                                    value= "<?php echo (int) $suplemento->Suplemento_ID ?>"
                                >Editar</button>
                                
                                <a href="eliminarMarca/<?php echo $suplemento->Suplemento_ID ?>" type="button" class='btn btn-danger m1-auto'>Borrar</a>    
                            </div>

                        </li>
                
                <?php } ?>

            </ul>

        </form>   

            <?php
        
        include 'templates/footer.php';

    }


    function adminSupleView($suplementos,$marcas){

        include  'templates/header.php';

        ?>
            <form action="agregarSuplemento" method="POST" class="p-4 bg-light rounded-3 shadow-sm">
                
                <div class="mb-3">
                    <label for="prioridad" class="form-label">Cantidad</label>
                    <select name="id_marca" id="prioridad" class="form-select">
                    
                    <?php foreach($marcas as $marca){ ?>  
                        <option value="<?php echo $marca->Suplemento_ID ?>"><?php echo $marca->Marca ?></option>
                    <?php } ?>
                    
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="Nombre" class="form-control" id="nombre" placeholder="Ej: Creatina">
                </div>


                <div class="mb-3">
                    <label for="nombre" class="form-label">Stock</label>
                    <input type="text" name="Stock" class="form-control" id="Stock" placeholder="Ej: 2 ">
                </div>

                

                <button type="submit" class="btn btn-primary w-100">Cargar</button>
            </form>

        

            <form method="POST" class="p-4 bg-light rounded-3 shadow-sm">
                
                <label for="marca" class="form-label">Editar :</label>

                <div class="mb-3">
                    <label for="prioridad" class="form-label">Cantidad</label>
                    <select name="id_marca" id="prioridad" class="form-select">
                    
                    <?php foreach($marcas as $marca){ ?>  
                        <option value="<?php echo $marca->Suplemento_ID ?>"><?php echo $marca->Marca ?></option>
                    <?php } ?>
                    
                    </select>
                </div>  

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Ej: Creatina">
                </div>


                <div class="mb-3">
                    <label for="nombre" class="form-label">Stock</label>
                    <input type="text" name="Stock" class="form-control" id="Stock" placeholder="Ej: 2 ">
                </div>
            
                <ul class="list-group">
                    <?php
                        foreach($suplementos as $suplemento){ ?>

                            <li class="list-group-item item-suplemento ">
                                <div>
                                    <b class= "font-weight-bold"><?php echo $suplemento->Marca ?> </b>
                                </div>
                                <div>
                                    <b class= "font-weight-bold"><?php echo $suplemento->Nombre ?> </b>
                                </div>
                                <div>
                                    <button
                                        type="submit"
                                        class="btn btn-warning"
                                        formmethod="post"
                                        formaction="editarSuplemento"
                                        name="id"
                                        value= "<?php echo (int) $suplemento->Suplemento_ID ?>"
                                    >Editar</button>
                                    
                                    <a href="eliminarSuplemento/<?php echo $suplemento->Suplemento_ID ?>" type="button" class='btn btn-danger m1-auto'>Borrar</a>    
                                </div>

                            </li>
                    
                    <?php } ?>

                </ul>

            </form>   

                <?php
            
            include 'templates/footer.php';
        
    }

}
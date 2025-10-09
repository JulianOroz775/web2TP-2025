<?php

class SupleView
{

    function showError($msg)
    {
        echo "<h1> ERROR! </h1>";
        echo "<h2> $msg </h2>";
    }



    function showSuples($suplementos){

            include  'templates/header.php';

            ?>
            <div class="container mt-4">
                <h2 class="mb-4 text-center">Listado de Suplementos</h2>

                <div class="row g-3">
                    <?php foreach ($suplementos as $s): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a
                                href="/web2/WEB2-2025/web2TP-2025/suplemento/<?php echo (int)$s->Suplemento_ID; ?>"
                                class="text-decoration-none text-dark"
                                style="display:block"
                                title="Ver suplemento">
                                <div class="card h-100 shadow-sm <?php echo ((int)$s->Stock <= 0 ? 'opacity-75' : ''); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">
                                            <strong><?php echo htmlspecialchars($s->Marca); ?></strong>
                                        </h5>
                                        <p class="card-text mb-1">
                                            <?php echo htmlspecialchars($s->Nombre); ?><br>
                                            <?php if (!empty($s->Cantindad)): ?>
                                                <small class="text-muted"><?php echo (int)$s->Cantindad; ?>g</small>
                                            <?php endif; ?>
                                        </p>

                                        <?php if (!empty($s->Descripcion)): ?>
                                            <p class="text-muted small mb-2"><?php echo htmlspecialchars($s->Descripcion); ?></p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php

        include 'templates/footer.php';
    }

    function showSuple($suplemento){

        include  'templates/header.php';
    ?>
        <div class="container mt-5">
            <div class="card shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body text-center">
                    <h4 class="card-title mb-2">
                        <strong class="text-primary"><?php echo htmlspecialchars($suplemento->Marca); ?></strong>
                    </h4>
                    <h5 class="card-subtitle mb-3 text-muted">
                        <?php echo htmlspecialchars($suplemento->Nombre); ?>
                    </h5>

                    <p class="mb-2">
                        <span class="badge bg-<?php echo ($suplemento->Stock > 0 ? 'success' : 'danger'); ?>">
                            <?php echo ($suplemento->Stock > 0 ? 'Stock: ' . $suplemento->Stock : 'Sin stock'); ?>
                        </span>
                    </p>

                    <p class="text-muted mb-3">
                        Cantidad: <?php echo (int)$suplemento->Cantindad; ?>g
                    </p>

                    <?php if (!empty($suplemento->Descripcion)): ?>
                        <p class="card-text"><?php echo htmlspecialchars($suplemento->Descripcion); ?></p>
                    <?php endif; ?>

                    <a href="/web2/WEB2-2025/web2TP-2025/" class="btn btn-outline-secondary mt-3">Volver al listado</a>
                </div>
            </div>
        </div>


<?php
        include 'templates/footer.php';
    }




    /*
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
        */
}

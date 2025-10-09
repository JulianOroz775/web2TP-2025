<?php


class MarcasView
{

    function showMarcas($suplementos)
    {

        include  'templates/header.php';

?>
        <div class="container mt-4">
            <h2 class="mb-4 text-center">Lista de Marcas</h2>

            <div class="d-flex justify-content-center align-items-center flex-wrap gap-3">
                <?php foreach ($suplementos as $s){ ?>
                    <a href="marca/<?php echo $s->Suplemento_ID ?>" class="text-decoration-none text-dark">
                        <div class="card text-center shadow-sm" style="width: 180px;">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h5 class="card-title fw-bold mb-0">
                                    <?php echo htmlspecialchars ($s->Marca) ?>
                                </h5>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>

<?php

        include 'templates/footer.php';
    }
}

<?php

function showSuplementos() {
    // Abrimos la conexión a la base de datos
    $db = new PDO('mysql:host=localhost;dbname=web2tp-2025;charset=utf8', 'root', '');

    //Enviamos la consulta y obtenemos los resultados

    $query= $db->prepare('SELECT * FROM suplementos2');
    $query->execute();

    //Obtengo todos los datos de la consulta - query
    $suplementos = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($suplementos as $suplemento) {
        echo "<ul>";

        echo "<li>$suplemento->Marca - $suplemento->Nombre</li>";

        echo "</ul>";
    }
    //Cerramos la conexión, pero no es necesario en PDO
}


function deleteSuplemento($id) {
    // DELETE FROM suplementos WHERE id= 2 ($id)

    $db = new PDO('mysql:host=localhost;dbname=web2tp-2025;charset=utf8', 'root', '');

    //Enviamos la consulta 

    $query= $db->prepare("DELETE FROM suplementos2 WHERE Suplemento_ID = ? ");
    //evitamos la inyeccion sql
    $query->execute([$id]);


};


echo "<h2>Lista de Suplementos</h2>";

showSuplementos();



?>
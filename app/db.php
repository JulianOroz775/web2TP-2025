<?php

function getConection(){

    return new PDO('mysql:host=localhost;dbname=web2tp-2025;charset=utf8', 'root', '');
}

function getSuplementos(){

    $db = getConection();

    $query = $db->prepare('SELECT * FROM suplementos2');
    $query->execute();

    $suplementos = $query->fetchAll(PDO::FETCH_OBJ);


    return $suplementos;
}


//Inserta el suplemento a la db
function insertSuplemento($Marca,$Nombre,$Prioridad){

    $db = getConection();

    $query= $db->prepare('INSERT INTO suplementos2 (Marca,Nombre,Prioridad) VALUES(?,?,?)');
    $query->execute([$Marca,$Nombre,$Prioridad]);

    return $db->lastInsertId();

}

function deleteSuplemento($id){

    $db = getConection();

    $query= $db->prepare('DELETE FROM suplementos2 WHERE Suplemento_ID = ?');
    $query->execute([$id]);

}

function updateSuplemento($id){

    $db = getConection();

    $query= $db->prepare('UPDATE suplementos2 SET Stock = 1 WHERE Suplemento_ID = ?');
    $query->execute([$id]);

}
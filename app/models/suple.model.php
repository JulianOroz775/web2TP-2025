<?php


class SupleModel{

    // POR DEFAULT IMPLICITAMENTE EXISTE UN CONSTRUCTOR POR MAS QUE NO LO CODEE

    // CONEXION 
    private function getConection(){

        return new PDO('mysql:host=localhost;dbname=web2tp-2025;charset=utf8', 'root', '');
    }


    // OBTENGO LOS SUPLEMENTOS
    function getSuplementos(){

        // 1. Abro la conexion
        $db = $this->getConection();

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $db->prepare('SELECT * FROM suplementos2');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $suplementos = $query->fetchAll(PDO::FETCH_OBJ);// arreglo de tareas


        return $suplementos;
    
    }

    //Inserta el suplemento a la db
    function insertSuplemento($Marca,$Nombre,$Prioridad){
        
        // 1. Abro la conexion
        $db = $this->getConection();

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query= $db->prepare('INSERT INTO suplementos2 (Marca,Nombre,Prioridad) VALUES(?,?,?)');
        $query->execute([$Marca,$Nombre,$Prioridad]);

        // 3. Obtengo y devuelvo el ID de la tarea nueva
        return $db->lastInsertId();

    }

    function deleteSuplemento($id){
        // 1. Abro la conexion
        $db = $this->getConection();

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query= $db->prepare('DELETE FROM suplementos2 WHERE Suplemento_ID = ?');
        $query->execute([$id]);

    }

    function updateSuplemento($id){

        $db = $this->getConection();

        $query= $db->prepare('UPDATE suplementos2 SET Stock = 0 WHERE Suplemento_ID = ?');
        $query->execute([$id]);

    }


}
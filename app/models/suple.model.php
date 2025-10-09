<?php


class SupleModel{

    private $db;


    function __construct(){
        // 1. Abro la conexion al instanciar
        $this-> db = $this->getConection();
    }


   
    private function getConection(){

        return new PDO('mysql:host=localhost;dbname=web2tp-2025;charset=utf8', 'root', '');
    
    } 


    // OBTENGO LOS SUPLEMENTOS
    function getAll(){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM suplementos2');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $suplementos = $query->fetchAll(PDO::FETCH_OBJ);// arreglo de tareas


        return $suplementos;
    
    }

    // OBTENGO un SUPLEMENTOS
    function get($id){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM suplementos2 WHERE Suplemento_ID = ?');
        $query->execute([$id]);

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $suplemento = $query->fetch(PDO::FETCH_OBJ);// arreglo de tareas


        return $suplemento;
    
    }



    //Inserta el suplemento a la db
    function insert($Marca,$Nombre,$Prioridad){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query= $this->db->prepare('INSERT INTO suplementos2 (Marca,Nombre,Prioridad) VALUES(?,?,?)');
        $query->execute([$Marca,$Nombre,$Prioridad]);

        // 3. Obtengo y devuelvo el ID de la tarea nueva
        return $this->db->lastInsertId();

    }

    function remove($id){
        
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query= $this->db->prepare('DELETE FROM suplementos2 WHERE Suplemento_ID = ?');
        $query->execute([$id]);

    }

    function update($id){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query= $this->db->prepare('UPDATE suplementos2 SET Stock = 0 WHERE Suplemento_ID = ?');
        $query->execute([$id]);

    }


}
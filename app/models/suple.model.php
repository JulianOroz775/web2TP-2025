<?php

require_once 'app/models/model.php';

class SupleModel extends Model{


    // OBTENGO LOS SUPLEMENTOS
    function getAll(){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $suplementos = $query->fetchAll(PDO::FETCH_OBJ);// arreglo de tareas


        return $suplementos;
    
    }

    // OBTENGO un SUPLEMENTOS
    function get($id){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM productos WHERE producto_id = ?');
        $query->execute([$id]);

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $suplemento = $query->fetch(PDO::FETCH_OBJ);// arreglo de tareas


        return $suplemento;
    
    }



    //Inserta el suplemento a la db
    function insert($Nombre,$Stock,$Id_marca){

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query= $this->db->prepare('INSERT INTO productos (nombre,stock,marca_id) VALUES(?,?,?)');
        $query->execute([$Nombre,$Stock,$Id_marca]);


    }


    function remove($id){
        
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query= $this->db->prepare('DELETE FROM productos WHERE producto_id = ?');
        $query->execute([$id]);

    }

    // Actualiza todos los campos editables de un suplemento
    function update($Nombre,$Stock,$id_marca,$id){

        $query = $this->db->prepare('UPDATE productos SET nombre = ?, stock = ?, marca_id = ? WHERE producto_id = ?');
        $query->execute([$Nombre,$Stock,$id_marca,$id]);

    }

    function delete($id){

         $query = $this->db->prepare('DELETE FROM productos WHERE producto_id = ?');
            
         $query->execute([$id]);

    }
    

}

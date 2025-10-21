<?php

    require_once 'app/models/model.php';
    
    class MarcasModel extends Model{


        // OBTENGO LOS SUPLEMENTOS
        function getAll(){

            // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
            $query = $this->db->prepare('SELECT * FROM marcas');
            $query->execute();

            // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
            $suplementos = $query->fetchAll(PDO::FETCH_OBJ);// arreglo de tareas


            return $suplementos;
        
        }

         function getAllbyID($id){

            // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
            $query = $this->db->prepare('SELECT * FROM productos WHERE marca_id = ? ');
            $query->execute([$id]);

            // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
            $suplementos = $query->fetchAll(PDO::FETCH_OBJ);// arreglo de tareas


            return $suplementos;
        
        }

        function getbyID($id){

            // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
            $query = $this->db->prepare('SELECT * FROM marcas WHERE marca_id = ? ');
            $query->execute([$id]);

            // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
            $suplemento = $query->fetch(PDO::FETCH_OBJ);// arreglo de tareas


            return $suplemento;
        
        }



        // OBTENGO un SUPLEMENTOS
        function get($id){

            // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
            $query = $this->db->prepare('SELECT * FROM marcas WHERE marca_id = ?');
            $query->execute([$id]);

            // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
            $suplemento = $query->fetch(PDO::FETCH_OBJ);// arreglo de tareas


            return $suplemento;
        
        }


        //ADMIN

        //Inserta el suplemento a la db
        function insert($Marca){

            // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
            $query= $this->db->prepare('INSERT INTO marcas (marca) VALUES(?)');
            $query->execute([$Marca]);

            // 3. Obtengo y devuelvo el ID de la tarea nueva
            return $this->db->lastInsertId();

        }

        function delete($id){

            $query = $this->db->prepare('DELETE FROM marcas WHERE marca_id = ?');
            
            $query->execute([$id]);

        }

        
        function update($marca,$id){

            // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
            $query= $this->db->prepare('UPDATE marcas SET marca = ? WHERE marca_id = ?');
            $query->execute([$marca,$id]);

        }
 
    }
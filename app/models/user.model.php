<?php 

require_once 'app/models/model.php';

class UserModel extends Model{


    function getByUsername($username){

        $query =  $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$username]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;

        
    }


}
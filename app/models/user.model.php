<?php 


class UserModel{

    private $db;


    function __construct(){
        
        $this->db = $this->getConection();
    }


   
    private function getConection(){

        return new PDO('mysql:host=localhost;dbname=web2tp-2025;charset=utf8', 'root', '');
    
    }

    function getByUsername($username){

        $query =  $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$username]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        var_dump($user);
        return $user;

        
    }


}
<?php
class UserModel{
    protected $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
    }

    public function getUser(){

    }

    public function insertNewUser(){
        $user = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $passwordHashed = password_hash($pasword, PASSWORD_BCRYPT);
        
        if($password === $passwordConfirm){
            $query = $this->db->prepare("INSERT INTO `users` (`user`, `password`) VALUES (?, ?)");
            $query->execute([$user, $passwordHashed]);
            header('Location: '. BASE_URL . 'signup');
        }


        
    }

}

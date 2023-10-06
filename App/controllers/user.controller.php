<?php
require './App/models/user.model.php';
class UserController{

    public function __construct(){
        $this->model = new UserModel();
    }

    public function createUser(){
        $this->model->insertNewUser();
    }
}
?>
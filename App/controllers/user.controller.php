<?php
require './App/models/user.model.php';
class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function createUser(){
        $user = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

        if ($password === $passwordConfirm) {
            $this->model->insertUser([$user, $passwordHashed]);
            header('Location: ' . BASE_URL . 'signup');
        }
    }

}

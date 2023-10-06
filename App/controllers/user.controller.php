<?php
require './App/models/user.model.php';
class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    // public function createUser()
    // {
    //     $this->model->insert($array, );
    // }
}

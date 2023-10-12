<?php
require_once './App/models/user.model.php';
require_once './App/views/user.view.php';

class UserController
{
    private $model, $view;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function createUser()
    {
        $user = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

        if ($password === $passwordConfirm) {
            $this->model->insertUser($user, $passwordHashed);
            header('Location: ' . BASE_URL . 'signup');
        }
    }
    public function showUserPage(){
        $this->view->showUser($userName);
    }

}

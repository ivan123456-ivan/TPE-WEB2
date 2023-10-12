<?php
require_once './App/helpers/auth.helper.php';
require_once './App/models/user.model.php';
class AuthController{
    private $userModel;
    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function auth(){
        $userName = $_POST['userName'];
        $password = $_POST['userPassword'];

        if(empty($userName) || empty($password)){
            return;
        }
        $user = $this->userModel->getAllDataUser($userName);

        if($user && password_verify($password, $user->password)){

            AuthHelper::signIn($user);

            header('Location: ' . BASE_URL . 'user');
        }
    }

    public function closeSession(){
        AuthHelper::logout();
        header('Location: '. BASE_URL . 'home');
    }
    
}

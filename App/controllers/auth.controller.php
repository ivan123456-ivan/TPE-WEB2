<?php
require_once './App/helpers/auth.helper.php';
require_once './App/models/user.model.php';
require_once './App/views/generic.view.php';
require_once './App/views/user.view.php';
class AuthController{
    private $userModel, $genericView;
    public function __construct(){
        $this->userModel = new UserModel();
        $this->genericView = new GenericView();
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
        }else{
            $this->genericView->showError("Error");
        }
    }

    public function closeSession(){
        AuthHelper::logout();
        header('Location: '. BASE_URL . 'home');
    }
}

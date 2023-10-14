<?php
require_once './App/helpers/auth.helper.php';
require_once './App/models/user.model.php';
require_once './App/views/generic.view.php';
require_once './App/views/user.view.php';
class AuthController
{
    private $userModel, $genericView;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->genericView = new GenericView();
    }

    public function auth()
    {
        if ($_POST) {

            $userName = $_POST['userName'];
            $password = $_POST['userPassword'];

            if (empty($userName) || empty($password)) {
                die();
            }
            $user = $this->userModel->getAllDataUser($userName);

            if ($user && password_verify($password, $user->password)) {

                AuthHelper::signIn($user);

                return $user;
            } else {
                $this->genericView->showError("Error");
            }
        } else {
            AuthHelper::verify();
            return $_SESSION;
        }
    }

    public function signOut()
    {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'home');
    }
}

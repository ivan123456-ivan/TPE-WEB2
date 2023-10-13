<?php
require_once './App/models/user.model.php';
require_once './App/views/user.view.php';
require_once './App/models/shop.model.php';
require_once './App/models/product.model.php';

class UserController
{
    private $model, $view, $genericView, $shopModel, $productModel;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->genericView = new GenericView();
        $this->shopModel = new ShopModel();
        $this->productModel = new ProductModel();
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

    public function showShopsForUser()
    {
        return $this->shopModel->getAllShopsForUser($_SESSION['USER_ID']);
    }
    
    public function showDashboard($user, $shops)
    {
        AuthHelper::verify();
        if ($this->checkSignIn() !== false) {
            $this->view->showUser($user, $shops);
        } else {
            $this->genericView->showError('La sesión expiró.');
        }
    }

    public function checkSignIn()
    {
        if (AuthHelper::isLoggedIn() === false) {
            AuthHelper::logout();
            header('Refresh: 3; URL=' . BASE_URL . 'signin');
            return false;
        }
    }
}

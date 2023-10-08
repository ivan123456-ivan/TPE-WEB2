<?php
/* 
    * Tabla de Ruteo:
    * home          -> controller->showHome()
    * signin        -> controller->signin()
    * signup        -> controller->signup()
    * signout       -> controller->signout()
    * products      -> controller->showProducts($shop)
    * shops         -> controller->showShops()
    * 
    */

require_once './App/controllers/product.controller.php';
require_once './App/controllers/shop.controller.php';
require_once './App/controllers/user.controller.php';
require_once './App/controllers/auth.cotroller.php';
require_once './App/controllers/category.controller.php';
require_once './App/controllers/generic.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$genericController = new GenericController();
$userController = new UserController();
$productController = new ProductController();
$categoryController = new CategoryController();
// parsea la accion Ej: noticia/1 --> ['noticia', 1]
$params = explode('/', $action);
switch ($params[0]) {
    case 'home':
        $genericController->showHome();
        break;
    case 'signin':
        $genericController->showSignInPage();
        break;
    case 'signup':
        $genericController->showSignUpPage();
        break;
    case 'createUser':
        $userController->createUser();
        break;
    case 'addProduct':
        $categoryController->showCategories();
        $productController->getAllData();
        break;
    case 'productPage':
        $productController->showProductPage();
        break;
    case 'searchByCategory':
        $productController->searchByCategory();
        break;
    default:
        $genericController->showError('404 not found');
        break;
}

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
require_once './App/controllers/auth.controller.php';
require_once './App/controllers/category.controller.php';
require_once './App/controllers/generic.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$genericController = new GenericController();
$userController = new UserController();
$shopController = new ShopController();
$productController = new ProductController();
$categoryController = new CategoryController();
$authController = new AuthController();
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
    case 'adminProduct':
        $productController->showProductPageAdministration();
        break;
    case 'addProduct':
        $productController->getAllData();
        break;
    case 'editProduct':
        $productController->updateProduct();
        break;
    case 'deleteProduct':
        $productController->deleteProduct($params[1]);
        break;
    case 'productPage':
    case 'searchByCategory':
        $productController->searchByCategory();
        if (!$_POST) {
            $productController->showProductPage();
        }
        break;
    case 'shopPage':
        $shopController->showShopPage();
        break;
    case 'addShop':
        $shopController->showShopPageAdministration();
        break;
    case 'adminCategories':
        $categoryController->showCategoriesAdministration();
        break;
    case 'editCategory':
        $categoryController->showEditCategory($params[1]);
        break;
    case 'updateCategory':
        $categoryController->updateCategory($params[1]);
        break;
    case 'deleteCategory':
        $categoryController->deleteCategory($params[1]);
        break;
    case 'addCategory':
        $categoryController->insertCategory();
        break;
    case 'dashboard':
        $user = $authController->auth();
        $shops = $userController->showShopsForUser();
        $userController->showDashboard($user, $shops);
        break;
    case 'signout':
        $authController->signOut();
        break;
    default:
        $genericController->showError('404 not found');
        break;
}

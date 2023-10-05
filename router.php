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

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'home'; // accion por defecto
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }
    
    // parsea la accion Ej: noticia/1 --> ['noticia', 1]
    $params = explode('/', $action);
    switch ($params[0]) {

    }
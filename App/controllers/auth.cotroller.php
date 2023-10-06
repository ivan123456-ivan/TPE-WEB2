<?php
require_once './App/helpers/auth.helper.php';
class AuthCotroller{
    public function __construct(){
        
    }

    public function closeSession(){
        AuthHelper::logout();
        header('Location: '. BASE_URL . 'home');
    }
}

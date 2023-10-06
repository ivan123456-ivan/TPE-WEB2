<?php
class AuthHelper{

    public static function init(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function signIn($user){
        AuthHelper::init();
        $_SESSION['User_email'];
        $_SESSION['password'];

    }
    public static function logout(){
        AuthHelper::init();
        session_destroy();
    }
}

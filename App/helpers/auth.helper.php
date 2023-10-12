<?php
class AuthHelper
{

    public static function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function signIn($user){
        AuthHelper::init();
        $_SESSION['USER_NAME'] = $user->user;
        $_SESSION['USER_PASSWORD'] = $user->password;
    }

    public static function logout()
    {
        AuthHelper::init();
        session_destroy();
    }
}

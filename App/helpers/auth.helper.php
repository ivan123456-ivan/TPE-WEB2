<?php
class AuthHelper
{
    const SESSION_TIMEOUT = 60 * 10;
    public static function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function signIn($user)
    {
        AuthHelper::init();
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_NAME'] = $user->user;
        $_SESSION['USER_PASSWORD'] = $user->password;
        $_SESSION['vencimiento'] = time() + AuthHelper::SESSION_TIMEOUT;
    }

    public static function isLoggedIn()
    {
        AuthHelper::verify();
        if (!isset($_SESSION['USER_NAME']) || $_SESSION['vencimiento'] < time()) {
            return false;
        }
        $_SESSION['vencimiento'] = time() + AuthHelper::SESSION_TIMEOUT;
    }

    public static function logout()
    {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify()
    {
        AuthHelper::init();
        if (!isset($_SESSION['USER_NAME'])) {
            header('Location: ' . BASE_URL . 'home');
            die();
        }
    }
}

<?php
class AuthHelper
{

    public static function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function logout()
    {
        AuthHelper::init();
        session_destroy();
    }
}

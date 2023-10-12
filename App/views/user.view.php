<?php

class UserView
{


    public function showUser($user, $shops)
    {
        AuthHelper::init();
        $title = 'dashboard';
        require './Templates/header.phtml';
        require './Templates/user.phtml';
        require './Templates/footer.phtml';
    }
}

<?php

class UserView{


    public function showUser($userName = null){
        AuthHelper::init();
        require './Templates/header.phtml';
        require './Templates/user.phtml';
        require './Templates/footer.phtml';
    }
}

?>
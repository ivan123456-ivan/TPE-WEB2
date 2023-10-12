<?php

class UserView{


    public function showUser($userName = null){
        require './Templates/header.phtml';
        require './Templates/user.phtml';
        require './Templates/footer.phtml';
    }
}

?>
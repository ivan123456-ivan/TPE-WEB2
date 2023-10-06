<?php
class GenericView
{
    public function showHome()
    {
        $title = "Página Inicio";
        require './Templates/header.phtml';
        require './Templates/home.phtml';
        require './Templates/footer.phtml';
    }

    public function showError($msgError)
    {
        $title = "Error";
        require './Templates/header.phtml';
        require './Templates/error.phtml';
        require './Templates/footer.phtml';
    }
}

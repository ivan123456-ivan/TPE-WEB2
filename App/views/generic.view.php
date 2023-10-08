<?php
class GenericView
{
    public function showHome()
    {
        $title = "Home Page";
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

    public function showSuccess($msgSuccess)
    {
        $title = "Success";
        require './Templates/header.phtml';
        require './Templates/success.phtml';
        require './Templates/footer.phtml';
    }

    public function showSignInPage()
    {
        $title = "Sign In";
        require './Templates/header.phtml';
        require './Templates/signIn.phtml';
        require './Templates/footer.phtml';
    }
    public function showSignUpPage()
    {
        $title = "Sign Up";
        require './Templates/header.phtml';
        require './Templates/signUp.phtml';
        require './Templates/footer.phtml';
    }
}

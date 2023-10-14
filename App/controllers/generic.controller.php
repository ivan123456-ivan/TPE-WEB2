<?php
require_once './App/views/generic.view.php';
class GenericController
{
    private $view;
    public function __construct()
    {
        $this->view = new GenericView();
    }

    public function showHome()
    {
        $this->view->showHome();
    }

    public function showError($msgError)
    {
        $this->view->showError($msgError);
    }
    public function showSignInPage()
    {
        $this->view->showSignInPage();
    }
    public function showSignUpPage()
    {
        $this->view->showSignUpPage();
    }

    public static function checkValuesPost()
    {
        foreach ($_POST as $value) {
            if (!isset($value) || empty($value)) {
                $view = new GenericView();
                $view->showError('the fields were not completed correctly');
                header('Refresh: 5; URL=' . BASE_URL);
                die();
            }
        }
    }
}

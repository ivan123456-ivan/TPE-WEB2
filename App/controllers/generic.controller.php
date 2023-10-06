<?php
require_once './App/views/generic.view.php';
class GenericController{
    private $view;
    public function __construct(){
        $this->view = new GenericView();
    }

    public function showHome(){
        $this->view->showHome();
    }

    public function showError($msgError){
        $this->view->showError($msgError);
    }
}

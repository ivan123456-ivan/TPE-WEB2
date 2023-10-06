<?php
require_once './App/models/product.model.php';
require_once './App/views/product.view.php';
class ProductController
{
    private $model, $view;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    // public function showProductRegister(){
    //     $categories = $this->model->getAll();
    // }

}

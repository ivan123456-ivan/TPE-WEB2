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
    public function showProductPage(){
        $products = $this->model->getAllProduct();
        $this->view->showProductPage([$products]);
    }

    public function showProductPageAdministration(){
        $this->view->showProductPageAdministration();
    }

    public function getAllData(){
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productImage = $_POST['productImage'];
        $productPrice = $_POST['productPrice'];
        $productStock = $_POST['productStock'];

        $this->model->addProduct([$productName, $productPrice, $productStock, $productImage, $productDescription]);
    }

    public function showAllProduct(){
        $query = $this->model->getAllProduct();
        $this->view->showProductPage($query);
    }


}

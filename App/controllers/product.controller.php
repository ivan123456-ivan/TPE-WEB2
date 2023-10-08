<?php
require_once './App/models/product.model.php';
require_once './App/views/product.view.php';
class ProductController
{
    private $model, $view, $modelCategories;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelCategories = new CategoryModel();
    }

    // public function showProductRegister(){
    //     $categories = $this->model->getAll();
    // }
    public function showProductPage($search = null)
    {
        $products = $this->model->getAllProduct();
        if ($search) {
            $products = [];
            $products = $search;
        }
        $categories = $this->modelCategories->getAllCategories();
        $this->view->showProductPage([$products], $categories);
    }

    public function searchByCategory()
    {
        if ($_POST) {
            $category = $_POST['select-categories'];
            if (isset($category) && is_numeric($category)) {
                $search = $this->model->getAllByCategory((int) $category);
                $this->showProductPage($search);
            }
            header('Location: ' . BASE_URL . 'productPage');
        }
    }

    public function showProductPageAdministration()
    {
        $this->view->showProductPageAdministration();
    }

    public function getAllData()
    {
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productImage = $_POST['productImage'];
        $productPrice = $_POST['productPrice'];
        $productStock = $_POST['productStock'];

        $this->model->addProduct([$productName, $productPrice, $productStock, $productImage, $productDescription]);
    }

    public function showAllProduct()
    {
        $query = $this->model->getAllProduct();
        // $this->view->showProductPage($query);
    }
}

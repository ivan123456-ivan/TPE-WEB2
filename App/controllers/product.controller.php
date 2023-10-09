<?php
require_once './App/models/product.model.php';
require_once './App/views/product.view.php';
require_once './App/models/category.model.php';
class ProductController
{
    private $model, $view, $modelCategories;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelCategories = new CategoryModel();
    }

    public function showProductPage($search = null)
    {
        $products = $this->model->getAllProduct();
        if ($search) {
            $products = [];
            $products = $search;
        }
        $categories = $this->modelCategories->getAllCategories();
        $this->view->showProductPage($products, $categories);
    }

    public function searchByCategory()
    {
        if ($_POST) {
            $category = $_POST['select-categories'];
            if (isset($category) && is_numeric($category)) {
                $this->showProductPage($this->model->getAllByCategory($category));
            } else {
                header('Location: ' . BASE_URL . 'productPage');
            }
        }
    }

    public function showProductPageAdministration()
    {
        $this->view->showProductPageAdministration();
    }

    public function getAllData()
    {
        if ($_POST) {
            $productName = $_POST['productName'];
            $productDescription = $_POST['productDescription'];
            $productImage = $_POST['productImage'];
            $productPrice = $_POST['productPrice'];
            $productStock = $_POST['productStock'];
            $productCategory = $_POST['select-categories'];
            AuthHelper::init();
            $this->model->addProduct([$productName, $productPrice, $productStock, $productCategory, $_SESSION['ID_USER'], $productImage, $productDescription]);
        }
    }
}

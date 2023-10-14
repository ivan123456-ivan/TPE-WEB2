<?php
require_once './App/models/product.model.php';
require_once './App/views/product.view.php';
require_once './App/models/category.model.php';
require_once './App/models/shop.model.php';
require_once './App/views/generic.view.php';
class ProductController
{
    private $model, $view, $modelCategories, $modelShop, $genericView;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelCategories = new CategoryModel();
        $this->modelShop = new ShopModel();
        $this->genericView = new GenericView();
    }

    public function showProductPage($search = null)
    {
        $products = $this->model->getAllProduct();
        $products = $this->checkCategory($search, $products);
        $categories = $this->modelCategories->getAllCategories();
        $this->view->showProductPage($products, $categories);
    }

    public function showProductPageAdministration($search = null)
    {
        AuthHelper::verify();
        $products = $this->model->getAllProductsForUser($_SESSION['USER_ID']);
        //$products = $this->checkCategory($search, $products);
        $categories = $this->modelCategories->getAllCategories();
        $shops = $this->modelShop->getAllShopsForUser($_SESSION['USER_ID']);
        $this->view->showProductPageAdministration($products, $categories, $shops);
    }

    public function getAllData()
    {
        AuthHelper::verify();
        if ($_POST) {
            $productName = $_POST['productName'];
            $productDescription = $_POST['productDescription'];
            $productImage = $_POST['productImage'];
            $productPrice = $_POST['productPrice'];
            $productStock = $_POST['productStock'];
            $productCategory = $_POST['select-categories'];
            $id_shops = $_POST['select-shops'];
            $this->model->addProduct($productName, $productPrice, $productStock, $id_shops, $productCategory, $productImage, $productDescription);
            header('Location: ' . BASE_URL . 'adminProduct');
        }else{
            $this->genericView->showError("No se ha podido crear el producto");
        }
    }
    public function showProduct(){
        AuthHelper::verify();
        $products = $this->model->getAllProductsForUser($_SESSION['USER_ID']);
        $categories = $this->modelCategories->getAllCategories();
        $this->view->showProductPageAdministration($products, $categories);
    }
    public function deleteProduct($idProduct){
        AuthHelper::verify();
        $query = $this->model->deleteProduct($idProduct);
        $this->genericView->showSuccess("The product has been successfully deleted.");
        header('Refresh: 3; URL=' . BASE_URL . 'adminProduct');
    }


    public function updateProduct(){
        AuthHelper::verify();
        if($_POST){
            $productName = $_POST['productName'];
            $productPrice = $_POST['productPrice'];
            $productStock = $_POST['productStock'];
            $productCategory = $_POST['select-categories'];
            $productImage = $_POST['productImage'];
            $productDescription = $_POST['productDescription'];
            $idProduct = $_POST['select-products'];
            $this->model->updateProduct($productName, $productPrice, $productStock, $productCategory, $productImage, $productDescription, $idProduct);
            header('Refresh: 3; URL=' . BASE_URL . 'adminProduct');
        }
    }

    public function searchByCategory()
    {
        if ($_POST) {
            $category = $_POST['select-categories'];
            if (isset($category) && is_numeric($category)) {
                $this->showProductPage($this->modelCategories->getAllByCategory($category));
            } else {
                header('Location: ' . BASE_URL . 'productPage');
            }
        }
    }

    public function checkCategory($search, $products)
    {
        if ($search) {
            $products = [];
            $products = $search;
        }
        return $products;
    }
}

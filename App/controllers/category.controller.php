<?php
require_once './App/models/category.model.php';
require_once './App/views/product.view.php';
class CategoryController
{
    private $model, $viewProduct;

    public function __construct()
    {
        $this->model = new CategoryModel();
        $this->viewProduct = new ProductView();
    }

    public function showCategories()
    {
        $categories = $this->model->getAllCategories();
        $this->viewProduct->showProductRegister($categories);
    }
}

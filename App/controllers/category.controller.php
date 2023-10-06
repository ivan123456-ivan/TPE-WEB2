<?php
require_once './App/models/category.model.php';
class CategoryController{
    private $model;
    
    public function __construct(){
        $this->model = new CategoryModel();
    }

    public function showCategories(){
        $categories = $this->model->getCategories();
        
    }
}

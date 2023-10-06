<?php
require_once './App/models/generic.model.php';
class CategoryModel extends GenericModel
{
    private $genericModel, $getAll;
    public function __construct()
    {
        $this->genericModel = new GenericModel();
        $this->getAll = 'SELECT * FROM categories';
    }

    public function getAllCategories()
    {
        return $this->genericModel->getAll($this->getAll);
    }
}

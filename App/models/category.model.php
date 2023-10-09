<?php
require_once './App/models/generic.model.php';
class CategoryModel extends GenericModel
{
    private $genericModel, $getAll, $update, $delete, $insert;
    public function __construct()
    {
        parent::__construct();
        $this->update = 'UPDATE categories SET name = ? WHERE id = ?';
        $this->genericModel = new GenericModel();
        $this->getAll = 'SELECT * FROM categories';
        $this->delete = 'DELETE FROM categories WHERE id = ?';
        $this->insert = 'INSERT INTO categories(name)VALUES(?)';
    }

    public function getAllCategories()
    {
        return $this->genericModel->getAll($this->getAll);
    }

    public function updateCategory($array)
    {
        $this->genericModel->update($array, $this->update);
    }

    public function deleteCategory($id)
    {
        $this->genericModel->delete($id, $this->delete);
    }

    public function insertCategory($value)
    {
        return $this->genericModel->insert([$value], $this->insert);
    }
}

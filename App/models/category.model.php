<?php
require_once './App/models/generic.model.php';
class CategoryModel extends GenericModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllByCategory($id)
    {
        $query = $this->db->prepare('SELECT p.name AS productName, p.id AS idProduct, p.price, p.stock, p.product_image, p.product_description, c.id AS idCategory, c.name AS categoryName FROM products AS p INNER JOIN categories AS c ON p.id_categories = c.id WHERE id_categories = ?');
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllCategories()
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateCategory($value, $id)
    {
        $query = $this->db->prepare('UPDATE categories SET name = ? WHERE id = ?');
        $query->execute([$value, $id]);
    }

    public function deleteCategory($id)
    {
        $query = $this->db->prepare('DELETE FROM categories WHERE id = ?');
        $query->execute([$id]);
    }

    public function insertCategory($value)
    {
        $query = $this->db->prepare('INSERT INTO categories(name)VALUES(?)');
        $query->execute([$value]);

        return $this->db->lastInsertId();
    }
}

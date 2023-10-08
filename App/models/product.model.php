<?php
require_once './App/models/generic.model.php';
class ProductModel extends GenericModel
{
    private $genericModel, $getAll, $insert;
    public function __construct()
    {
        $this->genericModel = new GenericModel();
        $this->getAll = 'SELECT * FROM products';
        $this->insert = "INSERT INTO `products` (`name`, `price`, `stock`, `product_image`, `product_description`) VALUES ( ?, ?, ?, ?, ?)";
    }

    public function addProduct($array)
    {
        $this->genericModel->insert($array, $this->insert);
    }

    public function getAllProduct()
    {
        return $this->genericModel->getAll($this->getAll);
    }

    public function getAllByCategory($id)
    {
        $query = $this->db->prepare('SELECT * FROM products WHERE id_categories = ?');
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

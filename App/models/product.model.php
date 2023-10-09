<?php
require_once './App/models/generic.model.php';
class ProductModel extends GenericModel
{
    private $genericModel, $getAll, $insert, $innerJoin;
    public function __construct()
    {
        parent::__construct();
        $this->genericModel = new GenericModel();
        $this->getAll = 'SELECT * FROM products';
        $this->innerJoin = 'SELECT p.name AS productName, p.id AS idProduct, p.price, p.stock, p.product_image, p.product_description, c.id AS idCategory, c.name AS categoryName FROM products AS p INNER JOIN categories AS c ON p.id_categories = c.id';
        $this->insert = "INSERT INTO `products` (`name`, `price`, `stock`, `id_categories`, `id_shops`, `product_image`, `product_description`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    }

    public function addProduct($array)
    {
        $this->genericModel->insert($array, $this->insert);
    }

    public function getAllProduct()
    {
        return $this->genericModel->getAll($this->innerJoin);
    }

    public function getAllByCategory($id)
    {
        $query = $this->db->prepare('SELECT p.name AS productName, p.id AS idProduct, p.price, p.stock, p.product_image, p.product_description, c.id AS idCategory, c.name AS categoryName FROM products AS p INNER JOIN categories AS c ON p.id_categories = c.id WHERE id_categories = ?');
        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

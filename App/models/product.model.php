<?php
require_once './App/models/generic.model.php';
class ProductModel extends GenericModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addProduct($productName, $productPrice, $productStock, $productCategory, $productImage, $productDescription)
    {
        $query = $this->db->prepare("INSERT INTO `products` (`name`, `price`, `stock`, `id_categories`, `product_image`, `product_description`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$productName, $productPrice, $productStock, $productCategory, $productImage, $productDescription]);

        return $this->db->lastInsertId();
    }

    public function getAllProduct()
    {
        $query = $this->db->prepare('SELECT p.name AS productName, p.id AS idProduct, p.price, p.stock, p.product_image, p.product_description, c.id AS idCategory, c.name AS categoryName FROM products AS p INNER JOIN categories AS c ON p.id_categories = c.id');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

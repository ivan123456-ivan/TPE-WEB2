<?php
require_once './App/models/generic.model.php';
class ProductModel extends GenericModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addProduct($productName, $productPrice, $productStock, $id_shops, $productCategory, $productImage, $productDescription)
    {
        $query = $this->db->prepare("INSERT INTO `products` (`name`, `price`, `stock`, `id_shops`, `id_categories`, `product_image`, `product_description`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$productName, $productPrice, $productStock, $id_shops, $productCategory, $productImage, $productDescription]);

        return $this->db->lastInsertId();
    }

    public function getAllProduct()
    {
        $query = $this->db->prepare('SELECT p.name AS productName, p.id AS idProduct, p.price, p.stock, p.product_image, p.product_description, c.id AS idCategory, c.name AS categoryName, s.name AS shopName, s.id AS shopId FROM products AS p INNER JOIN categories AS c ON p.id_categories = c.id INNER JOIN shops AS s ON p.id_shops = s.id');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteProduct($id){
        $query = $this->db->prepare("DELETE FROM products WHERE `products`.`id` = ?");
        $query->execute([$id]);
    }
    public function updateProduct($productName, $productPrice, $productStock, $productCategory, $productImage, $productDescription, $idProduct){
        $query = $this->db->prepare("UPDATE `products` SET `name` = ?, `price` = ?, `stock` = ?, `id_categories` = ?, `product_image` = ?, `product_description` = ? WHERE `products`.`id` = ?");
        $query->execute([$productName, $productPrice, $productStock, $productCategory, $productImage, $productDescription, $idProduct]);
    }
    public function getAllProductsForUser($user_id)
    {
        $query = $this->db->prepare("SELECT p.name AS productName, p.id AS idProduct, p.price, p.stock, p.product_image, p.product_description, c.id AS idCategory, c.name AS categoryName, s.name AS shopName, s.id AS shopId FROM products AS p INNER JOIN categories AS c ON p.id_categories = c.id INNER JOIN shops AS s ON p.id_shops = s.id INNER JOIN user AS u ON s.id_users = u.id WHERE u.id = ?;");
        $query->execute([$user_id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAllProductsForShop($shop)
    {
        $query = $this->db->prepare("SELECT p.name AS productName, p.id AS idProduct, p.price, p.stock, p.product_image, p.product_description, c.id AS idCategory, c.name AS categoryName, s.name AS shopName, s.id AS shopId FROM products AS p INNER JOIN categories AS c ON p.id_categories = c.id INNER JOIN shops AS s ON p.id_shops = s.id WHERE s.id = ?;");
        $query->execute([$shop]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
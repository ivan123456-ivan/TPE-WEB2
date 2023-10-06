<?php
require_once './App/models/user.model.php';
class ProductModel extends UserModel{


    public function getProduct(){
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productImage = $_POST['productImage'];
        $productPrice = $_POST['productPrice'];
        $productStock = $_POST['productStock'];
    }
    public function insertNewProduct(){
        $query = $this->db->prepare("INSERT INTO `productos` (`nombre`, `precio`, `stock`, `id_categoria`, `product_image`, `product_description`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$productName, $productPrice, $productStock, $productImage, $productDescription]);
    }
}

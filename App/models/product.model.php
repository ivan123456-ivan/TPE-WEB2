<?php
require_once './App/models/generic.model.php';
class ProductModel extends GenericModel
{


    public function getAllData()
    {
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productImage = $_POST['productImage'];
        $productPrice = $_POST['productPrice'];
        $productStock = $_POST['productStock'];
    }

    public function addProduct($array)
    {
        $query = $this->db->prepare("INSERT INTO `productos` (`nombre`, `precio`, `stock`, `id_categoria`, `product_image`, `product_description`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute($array);
    }
}

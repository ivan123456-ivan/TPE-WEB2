<?php
require_once './App/models/generic.model.php';
class ShopModel extends GenericModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllShops()
    {
        $query = $this->db->prepare('SELECT * FROM shops');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertShop($nombre, $address, $shopImage)
    {
        $query = $this->db->prepare('INSERT INTO shops(name, address, shop_image)VALUES(?, ?, ?)');
        $query->execute([$nombre, $address, $shopImage]);

        return $this->db->lastInsertId();
    }
}

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

    public function insertShop($nombre, $address, $shopImage, $id_user)
    {
        $query = $this->db->prepare('INSERT INTO shops(name, address, shop_image, id_users)VALUES(?, ?, ?, ?)');
        $query->execute([$nombre, $address, $shopImage, $id_user]);

        return $this->db->lastInsertId();
    }

    public function getAllShopsForUser($user_id)
    {
        $query = $this->db->prepare('SELECT * FROM shops WHERE id_users = ?');
        $query->execute([$user_id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

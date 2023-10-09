<?php
require_once './App/models/generic.model.php';
class ShopModel extends GenericModel
{
    private $genericModel, $getAll, $insert;
    public function __construct()
    {
        parent::__construct();
        $this->genericModel = new GenericModel();
        $this->getAll = 'SELECT * FROM shops';
        $this->insert = 'INSERT INTO shops(name, address, shop_image)VALUES(?, ?, ?)';
    }

    public function getAllShops()
    {
        return $this->genericModel->getAll($this->getAll);
    }

    public function insertShop($array)
    {
        return $this->genericModel->insert($array, $this->insert);
    }
}

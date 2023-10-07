<?php
require_once './App/models/generic.model.php';
class UserModel extends GenericModel
{
    private $insert, $getAll, $genericModel;
    public function __construct()
    {
        $this->insert = "INSERT INTO `users` (`user`, `password`) VALUES (?, ?)";
        $this->getAll = 'SELECT * FROM `users` WHERE ?';
        $this->genericModel = new GenericModel();
    }

    public function getAllDataUser()
    {
        $this->genericModel->getAll($this->getAll);
    }

    public function insertUser($array)
    {
        $this->genericModel->insert($array, $this->insert);
    }
}

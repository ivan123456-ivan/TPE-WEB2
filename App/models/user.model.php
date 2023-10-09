<?php
require_once './App/models/generic.model.php';
class UserModel extends GenericModel
{
    private $insert, $getAll, $genericModel;
    public function __construct()
    {
        parent::__construct();
        $this->insert = "INSERT INTO `users` (`user`, `password`) VALUES (?, ?)";
        $this->getAll = 'SELECT * FROM `users` WHERE ?';
        $this->genericModel = new GenericModel();
    }

    public function getAllDataUser()
    {
        return $this->genericModel->getAll($this->getAll);
    }

    public function insertUser($array)
    {
        return $this->genericModel->insert($array, $this->insert);
    }
}

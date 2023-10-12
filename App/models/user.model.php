<?php
require_once './App/models/generic.model.php';
class UserModel extends GenericModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDataUser($userName)
    {
        $query = $this->db->prepare('SELECT * FROM `user` WHERE user = ?');
        $query->execute([$userName]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertUser($user, $passwordHashed)
    {
        $query = $this->db->prepare("INSERT INTO `user` (`user`, `password`) VALUES (?, ?)");
        $query->execute([$user, $passwordHashed]);

        return $this->db->lastInsertId();
    }
}

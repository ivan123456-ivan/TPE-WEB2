<?php
require_once './App/models/generic.model.php';
class UserModel extends GenericModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDataUser($id)
    {
        $query = $this->db->prepare('SELECT * FROM `users` WHERE id = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertUser($user, $passwordHashed)
    {
        $query = $this->db->prepare("INSERT INTO `users` (`user`, `password`) VALUES (?, ?)");
        $query->execute([$user, $passwordHashed]);

        return $this->db->lastInsertId();
    }
}

<?php
require_once './App/models/generic.model.php';
class UserModel extends GenericModel
{
    private $insert, $getAll, $genericModel;
    public function __construct()
    {
        $this->insert = "INSERT INTO `users` (`user`, `password`) VALUES (?, ?)";
        $this->getAll = '';
        $this->genericModel = new GenericModel();
    }

    public function getAll($ad)
    {
    }

    public function insertUser($array)
    {
        $user = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

        if ($password === $passwordConfirm) { //controller hasta acá.
            $query = $this->db->prepare($this->insert);
            $query->execute($array); //eliminar $query
            header('Location: ' . BASE_URL . 'signup'); //tambien en el controller (misma function)
        }
        $this->genericModel->insert($array, $this->insert); // esto se queda aca
    }
}

<?php
require_once './config.php';
class GenericModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';' . 'dbname=' . DB_NAME . ';' . 'charset=' . DB_CHARSET, DB_USER, DB_PASSWORD);
    }

    public function insert($array, $SQLcondition)
    {
        $query = $this->db->prepare($SQLcondition);
        $query->execute($array);

        return $this->db->lastInsertId();
    }

    public function delete($id, $SQLcondition)
    {
        $query = $this->db->prepare($SQLcondition);
        $query->execute([$id]);
    }

    public function update($array, $SQLcondition)
    {
        $query = $this->db->prepare($SQLcondition);
        $query->execute($array);
    }

    public function get($SQLcondition)
    {
        $query = $this->db->prepare($SQLcondition);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAll($SQLcondition)
    {
        $query = $this->db->prepare($SQLcondition);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

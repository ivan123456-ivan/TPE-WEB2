<?php
require_once './App/models/user.model.php';
class CategoryModel extends UserModel{
    public function getCategories(){
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

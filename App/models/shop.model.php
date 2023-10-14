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

    public function getDataShop($id)
    {
        $query = $this->db->prepare('SELECT * FROM shops WHERE id = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
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
    public function getShopIdForUser($user_id)
    {
        $query = $this->db->prepare('SELECT id FROM shops WHERE id_users = ?');
        $query->execute([$user_id]);

        // Obtener el valor de id_shops (suponiendo que haya solo un resultado)
        $result = $query->fetch(PDO::FETCH_OBJ);

        // Verificar si se encontró un resultado
        if ($result) {
            return $result->id;
        } else {
            // Si no se encuentra un resultado, puedes manejarlo de la manera que prefieras
            // Por ejemplo, lanzar una excepción o devolver un valor predeterminado
            // Aquí se lanza una excepción como ejemplo
            throw new Exception("No commerce was found for the user.");
        }
    }

    public function updateShop($id, $name, $address, $shop_image)
    {
        $query = $this->db->prepare('UPDATE shops SET name = ?, address = ?, shop_image = ? WHERE id = ?');
        $query->execute([$name, $address, $shop_image, $id]);
    }

    public function deleteShop($id)
    {
        $query = $this->db->prepare('DELETE FROM shops WHERE id = ?');
        $query->execute([$id]);
    }
}

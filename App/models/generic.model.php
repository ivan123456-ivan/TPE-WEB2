<?php
require_once './config.php';
class GenericModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new PDO(
            'mysql:host=' . DB_HOST . ';'
                . 'dbname=' . DB_NAME . ';'
                . 'charset=' . DB_CHARSET,
            DB_USER,
            DB_PASSWORD
        );
        $this->_deploy();
    }

    private function _deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) > 0) {
            $sql = <<<END
            
            END;
            $this->db->query($sql);
        }
    }
}

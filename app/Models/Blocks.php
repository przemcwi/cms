<?php 

require_once './core/Database.php';

class Blocks{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getBlocksByPageId(int $id){

        $query = 'SELECT `type`, `data` FROM blocks WHERE page_id=:page_id';
        // $query = 'INSERT INTO users (username, pwd, email) VALUES (:uname, :pwd, :email)';
        $data = [
            ':page_id' => $id
        ];

        $stmt = $this->db->query($query, $data);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as &$row) {
                $row['data'] = json_decode($row['data'], true);
            }
            return $result;
        }

        return null;
        
    }
}
<?php

require_once './core/Database.php';

class Pages{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getPageId(string $slug): ?int{
        $query = 'SELECT id FROM pages WHERE slug=:slug';
        // $query = 'INSERT INTO users (username, pwd, email) VALUES (:uname, :pwd, :email)';
        $data = [
            ':slug' => $slug
        ];

        $stmt = $this->db->query($query, $data);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['id'])) {
            return (int)$result['id'];
        }

        return null;
        
    }
}
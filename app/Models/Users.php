<?php

require_once './core/Database.php';

class Users{
    protected $table = 'users';
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function addUser(){
        
        $stmt = $this->db->query("SELECT * FROM users");
        return $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


}
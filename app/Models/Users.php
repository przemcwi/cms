<?php

require_once './core/Database.php';

class Users{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function addUser(){
        $query = 'INSERT INTO users (username, pwd, email) VALUES (:uname, :pwd, :email)';
        $data = [
            ':uname' => 'ewq',
            ':pwd' => 'fgh',
            ':email' => 'xxx3'
        ];

        $this->db->query($query, $data);

    }
}
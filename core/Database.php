<?php

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=cms', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // public function addUser(){
    //     $stm = $this->pdo->prepare('INSERT INTO users (username, pwd, email) VALUES (:uname, :pwd, :email)');
    //     $stm->execute([
    //         ':uname' => 'xxx',
    //         ':pwd' => 'xxx2',
    //         ':email' => 'xxx3'
    //     ]);
    // }

    // public function getUser(){
    //     $stmt = $this->pdo->prepare('SELECT * FROM users');
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_ABS, 2);
    // }


}
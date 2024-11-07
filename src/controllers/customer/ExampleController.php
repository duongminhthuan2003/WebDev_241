<?php
include_once __DIR__ . '/../../config/config.php';
include_once __DIR__ . '/../../models/customer/Example.php';

class ExampleController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new Example($this->db);
    }

    public function example() {
        $stmt = $this->user->getUsers();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once __DIR__ . '/../../views/customer/example.php';
    }


}

<?php

class Promotion {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM promotions";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

}
?>
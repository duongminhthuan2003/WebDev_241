<?php

class Home {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getOutstanding() {
        $query = "SELECT * FROM outstanding";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getDiscovery(): mixed {
        $query = "SELECT 
                    pi.SKU,
                    pi.quantity_in_stock,
                    pi.product_image,
                    pi.price,
                    p.id AS product_id,
                    p.name AS product_name,
                    p.description AS product_description,
                    c1.category_name AS category_name
                FROM 
                    product_items pi
                JOIN 
                    products p ON pi.product_id = p.id
                JOIN 
                    product_category pc ON p.id = pc.product_id
                JOIN 
                    categories c1 ON pc.category_id = c1.id
                JOIN 
                    categories c2 ON c1.parent_category_id = c2.id
                WHERE 
                    c2.category_name = 'discovery';
                ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
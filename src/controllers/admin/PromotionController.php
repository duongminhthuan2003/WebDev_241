<?php
include_once __DIR__ . '/../../config/config.php';
include_once __DIR__ . '/../../models/admin/Promotion.php';
class PromotionController {
    private $db;
    private $promotionModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->promotionModel = new Promotion($this->db);
    }

    public function getall() { 
        $data = $this->promotionModel->getAll()->fetchAll(PDO::FETCH_ASSOC);

        include_once __DIR__ . '../../../views/admin/admin_discount.php';
    }    
}
?>
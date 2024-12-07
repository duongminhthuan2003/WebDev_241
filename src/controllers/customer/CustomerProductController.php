<?php
include_once __DIR__ . '/../../config/config.php';
include_once __DIR__ . '/../../models/customer/Product.php';

class CustomerProductController {
    private $db;
    
    private $productModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->productModel = new Product($this->db);
    }

    public function products() {
        $data = $this->productModel->getAllProduct()->fetchAll(PDO::FETCH_ASSOC);

        include_once __DIR__ . '/../../views/customer/product_list.php';
    }

    public function detail($product_item_id) {
        $product = $this->productModel->getDetail($product_item_id)->fetch(PDO::FETCH_ASSOC);
        $color = $this->productModel->getColor($product_item_id)->fetchAll(PDO::FETCH_ASSOC);
        $size = $this->productModel->getSize($product_item_id)->fetchAll(PDO::FETCH_ASSOC);
        $description = $this->productModel->getDescription($product_item_id)->fetch(PDO::FETCH_ASSOC);
        $review = $this->productModel->getReview($product_item_id)->fetchAll(PDO::FETCH_ASSOC);

        $data = [
            'product' => $product,
            'color' => $color,
            'size' => $size,
            'description' => $description,
            'review' => $review
        ];

        include_once __DIR__ . '/../../views/customer/product_detail.php';
    }

    public function addToCart() {
        $user_id = $_POST['user_id'] ?? '';
        $product_id = $_POST['product_id'] ?? '';
        $color_id = $_POST['color_id'] ?? '';
        $size_id = $_POST['size_id'] ?? '';
        $quantity = $_POST['quantity'] ?? '';


        if (empty($user_id) || empty($product_id) || empty($size_id) || empty($color_id) || empty($quantity)) {
            $error = "Vui lòng nhập đầy đủ thông tin.";
            
            include_once __DIR__ . '/../../views/customer/product_detail.php';
            return;
        }

        if (!is_numeric($quantity)) {
            $error = "Số lượng phải là số.";
            include_once __DIR__ . '/../../views/customer/product_detail.php';
            return;
        }
        
        
        $result = $this->productModel->addToCart($user_id, $product_id, $color_id, $size_id, $quantity);
        if ($result) {
            header('Location: /product_list/detail/'.$result.'?success=1');
        } else {
            include_once __DIR__ . '/../../views/customer/product_detail.php';
        }
    }
}
<?php
    header('Content-Type: application/json');
    require_once(__DIR__."/../../models/customer/review.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the raw POST data
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $user_id = intval($data['userId'] ?? '');
        $product_item_id = intval($data['productItemId'] ?? '');
        $rating = intval($data['rating'] ?? '');
        $content = $data['content'] ?? '';

        try {
            writeReview($user_id, $product_item_id, $rating, $content);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        
        echo json_encode(['success' => true, 'message' => 'Viết bình luận thành công.']);
    }
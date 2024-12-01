<?php
    header('Content-Type: application/json');
    require_once(__DIR__ . "/../../models/customer/payment.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the raw POST data
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $province = strval($data['province'] ?? '');
        $district = strval($data['district'] ?? '');
        $ward = strval($data['ward'] ?? '');
        $street = strval($data['address'] ?? '');
        $user_id = strval($data['userId'] ?? '');

        // Validate inputs
        if (empty($province) || empty($district) || empty($ward) || empty($street)) {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin cần thiết.']);
            exit;
        }

        try {
            paymentOrder($province, $district, $ward, $street, $user_id);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        
        echo json_encode(['success' => true, 'message' => 'Thanh toán thành công.']);
    }


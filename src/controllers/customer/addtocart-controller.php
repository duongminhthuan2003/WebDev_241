<?php
// Include the model file
require_once(__DIR__ . "/../../models/customer/cart.php");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    //$user_id = intval($_POST['user_id']); // Assuming user_id is passed in the form
    $user_id = intval(1); // Assuming user_id is passed in the form
    $product_item_id = intval($_POST['product_item_id']);
    $color_name = $_POST['color'];
    $size = intval($_POST['size']);
    $quantity = intval(value: $_POST['quantity']);

    // Call the addToCart function
    try {
        addToCart($user_id, $product_item_id, $color_name, $size, $quantity);
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        header('Location: ../../views/customer/product_list.php');
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        
    }
    echo json_encode(['success' => true, 'message' => 'Thêm thành công.']);
}
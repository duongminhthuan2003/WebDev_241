<?php
    // Include the model file
    require_once(__DIR__ . "/../../models/customer/cart.php");
    
    // Set the response header to JSON
    header('Content-Type: application/json');
    
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the raw POST data
        $rawData = file_get_contents("php://input");
        // Decode the JSON data
        $data = json_decode($rawData, true);

        // Check if the required keys are present
        if (isset($data['user_id']) && isset($data['product_item_id'])) {
            $user_id = intval($data['user_id']);
            $product_item_id = intval($data['product_item_id']);

            // Call the function from the model
            deleteOrderItem($user_id, $product_item_id);

            // If deleteOrderItem didn't trigger a die(), assume success
            // Optionally, retrieve the updated total price
            $order_price_json = getOrderPrice($user_id);
            $order_price_data = json_decode($order_price_json, true);
            $new_total_price = isset($order_price_data['total_price']) ? $order_price_data['total_price'] : 0;

            // Send a success response with the updated total price
            echo json_encode([
                'success' => true,
                'message' => 'Product removed from cart.',
                'new_total_price' => $new_total_price
            ]);
        } else {
            // Send an error response for missing data
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data received. Required keys: user_id, product_item_id.']);
        }
    } else {
        // Send an error response for invalid request method
        http_response_code(405);
        echo json_encode(['error' => 'Invalid request method. Please use POST.']);
    }
?>
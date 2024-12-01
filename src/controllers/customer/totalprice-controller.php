<?php
    // Include the model file
    require_once(__DIR__."/../../models/customer/cart.php");

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the raw POST data
        $rawData = file_get_contents("php://input");
        // Decode the JSON data
        $data = json_decode($rawData, true);

        // Check if the required key is present
        if (isset($data['key1'])) {
            $user_id = intval($data['key1']);
            
            // Call the function from the model
            $price = json_decode(getOrderPrice($user_id), true);
            
            if ($price) {
                // Set the response header to JSON
                header('Content-Type: application/json');
                // Send the product data as JSON
                echo json_encode($price);
            } else {
                // Send an error response
                http_response_code(404);
                echo json_encode(['error' => 'Product not found.']);
            }
        } else {
            // Send an error response
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data received.']);
        }
    } else {
        // Send an error response
        http_response_code(405);
        echo json_encode(['error' => 'Invalid request method.']);
    }
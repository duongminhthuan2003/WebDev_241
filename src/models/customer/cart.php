<?php
    function addToCart($user_id, $product_item_id, $color_name, $size, $quantity)
    {   
        require_once(__DIR__."./../connectdb.php");

        // Get product id from product_item_id
        $query = "  SELECT product_id 
                    FROM product_item 
                    WHERE id = $product_item_id";
        $result0 = mysqli_query($DBConnect, $query);
        if ($result0 && mysqli_num_rows($result0) > 0) {
            $row = mysqli_fetch_assoc($result0);
            $product_id = $row['product_id'];
        } else {
            die($product_item_id);
        }

        // Get the order_id for the user
        $query = "  SELECT `order`.id 
                    FROM `order`
                    JOIN order_status ON `order`.id = order_status.order_id
                    WHERE `order`.user_id = $user_id AND order_status.status = 0";
        $result1 = mysqli_query($DBConnect, $query);
        if ($result1 && mysqli_num_rows($result1) > 0) {
            // If an order exists, get the order_id
            $row = mysqli_fetch_assoc($result1);
            $order_id = $row['id'];
        } else {
            // If no order exists, create a new order
            $query = "INSERT INTO `order` (user_id, total_price) VALUES ($user_id, 0)";
            $result = mysqli_query($DBConnect, $query);
    
            if ($result) {
                $order_id = mysqli_insert_id($DBConnect);
                $query = "INSERT INTO order_status (order_id, status) VALUES ($order_id, '0')";
                $result = mysqli_query($DBConnect, $query);
            } else {
                die('Error creating new order: ' . mysqli_error($DBConnect));
            }
        }

        // Get the color_id
        $query = "  SELECT id 
                    FROM color 
                    WHERE color_name = '$color_name'"; 
        $result2 = mysqli_query($DBConnect, $query);
        if ($result2 && mysqli_num_rows($result2) > 0) {
            // If an order exists, get the order_id
            $row = mysqli_fetch_assoc($result2);
            $color_id = $row['id'];
        } else {
            die('Error: Color not found.');
        }

        // Get the size_id
        $query = "  SELECT id 
                    FROM size 
                    WHERE size_value = $size";
        $result3 = mysqli_query($DBConnect, $query);
        if ($result3 && mysqli_num_rows($result3) > 0) {
            // If an order exists, get the order_id
            $row = mysqli_fetch_assoc($result3);
            $size_id = $row['id'];
        } else {
            die('Error: Size not found.');
        }

        // Get the product_item_id
        $query = "  SELECT id 
                    FROM product_item
                    WHERE product_item.product_id = $product_id AND product_item.color_id = $color_id AND product_item.size_id = $size_id";
        $result4 = mysqli_query($DBConnect, $query);
        if ($result4 && mysqli_num_rows($result4) > 0) {
            // If an order exists, get the order_id
            $row = mysqli_fetch_assoc($result4);
            $product_item_id = $row['id'];
        } else {
            die($size_id);
        }

        // Get the price from product_item_id
        $query = "  SELECT price 
                    FROM product_item 
                    WHERE id = $product_item_id";
        $result6 = mysqli_query($DBConnect, $query);
        if ($result6 && mysqli_num_rows($result6) > 0) {
            $row = mysqli_fetch_assoc($result6);
            $price = $row['price'];
        } else {
            die('Error: Price not found.');
        }

        // Check if the product_item_id already exists in the order
        $query = "  SELECT id 
                    FROM order_item 
                    WHERE order_id = $order_id AND product_item_id = $product_item_id";
        $result7 = mysqli_query($DBConnect, $query);
        if ($result7 && mysqli_num_rows($result7) > 0) {
            // If the product_item_id already exists, update the quantity
            $query = "  UPDATE order_item 
                        SET quantity = quantity + $quantity, price = price + ($price * $quantity) 
                        WHERE order_id = $order_id AND product_item_id = $product_item_id";
            $result8 = mysqli_query($DBConnect, $query);
            if (!$result8) {
                die('Error updating quantity: ' . mysqli_error($DBConnect));
            }
        } else {
            // If the product_item_id does not exist, insert a new record
            $query = "  INSERT INTO order_item (order_id, product_item_id, quantity, price) 
                        VALUES ($order_id, $product_item_id, $quantity, ($price * $quantity))";
            $result9 = mysqli_query($DBConnect, $query);
            if (!$result9) {
                die('Error inserting new record: ' . mysqli_error($DBConnect));
            }
        }

        $update_query = "UPDATE `order` SET total_price = total_price + ($price * $quantity) WHERE id = $order_id";
        $update_result = mysqli_query($DBConnect, $update_query);
        if (!$update_result) {
            die('Error updating total price: ' . mysqli_error($DBConnect));
        }
    }


    function getOrderItem($user_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT 
                        product_item.product_image, 
                        product.name AS `name`, 
                        color.color_name AS color_name, 
                        `size`.size_value AS `size`,
                        order_item.quantity,
                        order_item.price,
                        product_item.id AS product_item_id
                    FROM 
                        (((((product 
                        JOIN product_item ON product.id = product_item.product_id) 
                        JOIN color ON product_item.color_id = color.id)
                        JOIN `size` ON product_item.size_id = `size`.id)
                        JOIN order_item ON product_item.id = order_item.product_item_id)
                        JOIN `order` ON order_item.order_id = `order`.id)
                        JOIN order_status ON `order`.id = order_status.order_id
                    WHERE `order`.user_id = $user_id AND order_status.status = 0";
        $product_info = mysqli_query(mysql: $DBConnect, query: $query);
        if (!$product_info) 
        {
            $message = 'Invalid query: ' . mysqli_error(mysql: $DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $data = array();
        while ($row = mysqli_fetch_assoc(result: $product_info)) 
        {
            $data[] = $row;
        }
        return json_encode(value: $data);
    }

    function getOrderPrice($user_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT `order`.total_price
                    FROM `order`
                    JOIN order_status ON `order`.id = order_status.order_id
                    WHERE `order`.user_id = $user_id AND order_status.status = 0";
        $result = mysqli_query($DBConnect, $query);
        if (!$result) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect);
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $data = mysqli_fetch_assoc($result);
        return json_encode($data);
    }

    function deleteOrderItem($user_id, $product_item_id)
    {
        require_once(__DIR__ . "./../connectdb.php");
    
        // Begin transaction to ensure atomicity
        mysqli_begin_transaction($DBConnect);
    
        try {
            // Step 1: Retrieve the active order_id for the user
            $stmt = $DBConnect->prepare("
                SELECT `order`.id 
                FROM `order`
                JOIN order_status ON `order`.id = order_status.order_id
                WHERE `order`.user_id = ?
                  AND order_status.status = '0'
                LIMIT 1
            ");
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . mysqli_error($DBConnect));
            }
    
            $stmt->bind_param("i", $user_id);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
    
            $result = $stmt->get_result();
            if ($result->num_rows === 0) {
                throw new Exception('Error: Order not found.');
            }
    
            $row = $result->fetch_assoc();
            $order_id = $row['id'];
            $stmt->close();
    
            // Step 2: Retrieve the price and quantity of the order_item to be deleted
            $stmt = $DBConnect->prepare("
                SELECT price, quantity 
                FROM order_item 
                WHERE order_id = ? 
                  AND product_item_id = ?
                LIMIT 1
            ");
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . mysqli_error($DBConnect));
            }
    
            $stmt->bind_param("ii", $order_id, $product_item_id);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
    
            $result = $stmt->get_result();
            if ($result->num_rows === 0) {
                throw new Exception('Error: Order item not found.');
            }
    
            $row = $result->fetch_assoc();
            $price = $row['price'];
            $quantity = $row['quantity'];
            $stmt->close();
    
            // Step 3: Delete the order_item
            $stmt = $DBConnect->prepare("
                DELETE FROM order_item 
                WHERE order_id = ? 
                  AND product_item_id = ?
            ");
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . mysqli_error($DBConnect));
            }
    
            $stmt->bind_param("ii", $order_id, $product_item_id);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
    
            if ($stmt->affected_rows === 0) {
                throw new Exception('Error: Failed to delete order item.');
            }
            $stmt->close();
    
            // Step 4: Calculate the total deduction
            $total_deduction = $price;
    
            // Step 5: Update the total_price in the order
            $stmt = $DBConnect->prepare("
                UPDATE `order` 
                SET total_price = total_price - ? 
                WHERE id = ?
            ");
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . mysqli_error($DBConnect));
            }
    
            $stmt->bind_param("di", $total_deduction, $order_id);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
    
            if ($stmt->affected_rows === 0) {
                throw new Exception('Error: Failed to update total price.');
            }
            $stmt->close();
    
            // Commit the transaction
            mysqli_commit($DBConnect);
        } catch (Exception $e) {
            // Rollback the transaction on error
            mysqli_rollback($DBConnect);
            die($e->getMessage());
        }
    }


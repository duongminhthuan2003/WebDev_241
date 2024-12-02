<?php
    function paymentOrder( $province, $district, $ward, $street, $user_id) {
        require_once(__DIR__."./../connectdb.php");

        // Get the order_id for the user
        $query = "  SELECT `orders`.order_id 
                    FROM `orders`
                    JOIN order_status ON `orders`.order_id = order_status.order_id
                    WHERE `orders`.user_id = $user_id AND order_status.status = 0";
        try {
            $result1 = mysqli_query($DBConnect, $query);
            if ($result1 && mysqli_num_rows($result1) > 0) {
                $row = mysqli_fetch_assoc($result1);
                $order_id = $row['order_id'];
            } 
        }
        catch (Exception $e) {
            die('Error get order');
        }


        try {
            // Get the address_id for the user
            $query = "  SELECT `address`.address_id
                        FROM `address`
                        WHERE `address`.province = '$province' AND `address`.district = '$district' AND `address`.ward = '$ward' AND `address`.detail = '$street'";
            $result2 = mysqli_query($DBConnect, $query);
            if ($result2 && mysqli_num_rows($result2) > 0) {
                // If an order exists, get the order_id
                $row = mysqli_fetch_assoc($result2);
                $address_id = $row['address_id'];
            } else {
                // If no address exists, create a new address
                $query = "INSERT INTO `address` (province, district, ward, detail) VALUES ('$province', '$district', '$ward', '$street')";
                $result = mysqli_query(mysql: $DBConnect, query: $query);
        
                if ($result) {
                    $address_id = mysqli_insert_id($DBConnect);
                } 
            }
        }
        catch (Exception $e) {
            die('Error get address: ');
        }
        
        try {
            // Update the order with the address_id
            $query = "  UPDATE `orders`
                        SET shipping_address_id = 5
                        WHERE order_id = $order_id";
            $result = mysqli_query($DBConnect, $query);
        }
        catch (Exception $e) {
            die('Error update order: ');
        }

        // Update the order with the shipping price
        try {
            $query = "  UPDATE `orders`
                        SET total_price = total_price + 30000
                        WHERE order_id = $order_id";
            $result = mysqli_query($DBConnect, $query);
        }
        catch (Exception $e) {
            die('Error update order status: ');
        }

        
        try {
            // Update the order status to 1
            $query = "  UPDATE order_status
                        SET `status` = 1
                        WHERE order_id = $order_id";
            $result = mysqli_query($DBConnect, $query);
        }
        catch (Exception $e) {
            die('Error update order status: ');
        }
        return true;
    }


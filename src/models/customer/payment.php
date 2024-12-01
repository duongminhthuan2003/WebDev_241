<?php
    function paymentOrder( $province, $district, $ward, $street, $user_id) {
        require_once(__DIR__."./../connectdb.php");

        // Get the order_id for the user
        $query = "  SELECT `order`.id 
                    FROM `order`
                    JOIN order_status ON `order`.id = order_status.order_id
                    WHERE `order`.user_id = $user_id AND order_status.status = 0";
        $result1 = mysqli_query($DBConnect, $query);
        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
            $order_id = $row['id'];
        } else {
            die('Error get order: ' . mysqli_error($DBConnect));
        }
        
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
            } else {
                die('Error creating new address: ' . mysqli_error($DBConnect));
            }
        }

        // Update the order with the address_id
        $query = "  UPDATE `order`
                    SET shipping_address_id = $address_id
                    WHERE order_id = $order_id";
        $result = mysqli_query($DBConnect, $query);
        if (!$result) {
            die('Error updating order: ' . mysqli_error($DBConnect));
        }

        // Update the order status to 1
        $query = "  UPDATE order_status
                    SET `status` = 1
                    WHERE order_id = $order_id";

        $result = mysqli_query($DBConnect, $query);
        if (!$result) {
            die('Error updating order status: ' . mysqli_error($DBConnect));
        }
    }


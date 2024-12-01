<?php

    function getAllLoveProduct($user_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT 
                        product_item.product_item_id AS product_item_id, 
                        product.name AS name, 
                        color.color_name AS color_name, 
                        product_item.price, 
                        product_item.product_image, 
                        product_item.quantity_in_stock,
                        product.product_id AS product_id
                    FROM 
                        ((product 
                        JOIN product_item ON product.product_id = product_item.product_id) 
                        JOIN color ON product_item.color_id = color.color_id) 
                        JOIN love_item ON product_item.product_item_id = love_item.product_id 
                    WHERE 
                        love_item.user_id = $user_id";
        $product_info = mysqli_query($DBConnect, $query);
        if (!$product_info) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $data = array();
        while ($row = mysqli_fetch_assoc($product_info)) 
        {
            $data[] = $row;
        }
        return json_encode($data);
    }

    function insertLoveProduct($user_id, $product_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "INSERT INTO love_item (user_id, product_id) VALUES ($user_id, $product_id)";
        $result = mysqli_query($DBConnect, $query);
        if (!$result) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        return $result;
    }

    function deleteLoveProduct($user_id, $product_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "DELETE FROM love_item WHERE user_id = $user_id AND product_id = $product_id";
        $result = mysqli_query($DBConnect, $query);
        if (!$result) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        return $result;
    }
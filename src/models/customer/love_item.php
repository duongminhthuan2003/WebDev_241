<?php

    function getAllLoveProduct($user_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT 
                        product_items.product_item_id AS product_item_id, 
                        products.name AS name, 
                        colors.color_name AS color_name, 
                        product_items.price, 
                        product_items.product_image, 
                        product_items.quantity_in_stock,
                        products.product_id AS product_id
                    FROM 
                        ((products 
                        JOIN product_items ON products.product_id = product_items.product_id) 
                        JOIN colors ON product_items.color_id = colors.color_id) 
                        JOIN love_items ON product_items.product_item_id = love_items.product_id 
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
        $query = "INSERT INTO love_items (user_id, product_id) VALUES ($user_id, $product_id)";
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
        $query = "DELETE FROM love_items WHERE user_id = $user_id AND product_id = $product_id";
        $result = mysqli_query($DBConnect, $query);
        if (!$result) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        return $result;
    }
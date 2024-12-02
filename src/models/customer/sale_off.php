<?php
    function getAllSaleProduct()
    {
        require_once(__DIR__."./../connectdb.php");
        $query_category_id = "  SELECT 
                        id AS category_id
                    FROM 
                        categories
                    WHERE category_name LIKE 'Sale Off'";
        $category_info = mysqli_query($DBConnect, $query_category_id);
        if (!$category_info) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $category_id = mysqli_fetch_assoc($category_info)['category_id'];
        $query = "  SELECT 
                        product_items.product_item_id AS product_item_id, 
                        products.name AS name, 
                        colors.color_name AS color_name, 
                        product_items.price, 
                        product_items.product_image, 
                        product_items.quantity_in_stock,
                        products.product_id  AS product_id 
                    FROM 
                        ((products 
                        JOIN product_items ON products.product_id = product_items.product_id) 
                        JOIN colors ON product_items.color_id = colors.color_id)
                        JOIN product_category ON product_items.product_item_id = product_category.product_id
                    WHERE product_category.category_id = $category_id";
        $product_info = mysqli_query($DBConnect, $query);
        if (!$product_info) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect);
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
<?php
    function getAllSaleProduct()
    {
        require_once(__DIR__."./../connectdb.php");
        $query_category_id = "  SELECT 
                        id AS category_id
                    FROM 
                        category
                    WHERE category_name = 'sale_off'";
        $category_info = mysqli_query($DBConnect, $query_category_id);
        if (!$category_info) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $category_id = mysqli_fetch_assoc($category_info)['category_id'];
        $query = "  SELECT 
                        product_item.product_item_id AS product_item_id, 
                        product.name AS name, 
                        color.color_name AS color_name, 
                        product_item.price, 
                        product_item.product_image, 
                        product_item.quantity_in_stock,
                        product.product_id  AS product_id 
                    FROM 
                        ((product 
                        JOIN product_item ON product.product_id = product_item.product_id) 
                        JOIN color ON product_item.color_id = color.color_id)
                        JOIN product_category ON product_item.product_item_id = product_category.product_id
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
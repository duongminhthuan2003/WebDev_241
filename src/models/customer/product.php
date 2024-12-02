<?php
    function getAllProducts()
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
                        (products 
                        JOIN product_items ON products.product_id = product_items.product_id) 
                        JOIN colors ON product_items.color_id = colors.color_id
                    GROUP BY 
                        product_items.product_item_id, color_name";
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

    function getProductsByColor($color_name)
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
                        (products
                        JOIN product_items ON products.product_id = product_items.product_id) 
                        JOIN colors ON product_items.color_id = colors.color_id 
                    WHERE colors.color_name = '$color_name'
                    GROUP BY 
                        product_items.size_id, 
                        product_items.product_item_id";
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

    function getProductsByPrice($min, $max)
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
                        (products 
                        JOIN product_items ON products.product_id = product_items.product_id) 
                        JOIN colors ON product_items.color_id = colors.color_id 
                    WHERE price BETWEEN $min AND $max
                    GROUP BY 
                        product_items.size_id, 
                        product_items.product_item_id";
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



    function getOneProduct($product_item_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT
                        product_items.product_image,
                        products.name AS name, 
                        colors.color_name AS color_name,
                        product_items.price,
                        products.description AS description
                    FROM 
                        (products 
                        JOIN product_items ON products.product_id = product_items.product_id) 
                        JOIN colors ON product_items.color_id = colors.color_id
                    WHERE product_items.product_item_id = $product_item_id";
        $product_info = mysqli_query($DBConnect, $query);
        if (!$product_info) 
        { 
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $data = mysqli_fetch_assoc($product_info);
        return json_encode($data);
    }

    function getReviews($product_item_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT 
                        users.user_name AS user_name,
                        user_reviews.rating AS rating,
                        user_reviews.creat_at AS creat_at,
                        user_reviews.content AS content
                    FROM
                        (user_reviews 
                        JOIN users ON user_reviews.user_id = users.user_id)
                    WHERE 
                        user_reviews.product_item_id = $product_item_id";
        $review_info = mysqli_query(mysql: $DBConnect, query: $query);
        if (!$review_info) 
        {
            $message = 'Invalid query: ' . mysqli_error(mysql: $DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $data = array();
        while ($row = mysqli_fetch_assoc(result: $review_info)) 
        {
            $data[] = $row;
        }
        return json_encode(value: $data);
    }



    
    // !
    function getCategory()
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT * FROM categories WHERE parent_category_id IS NOT NULL";
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

    function getProductReview($product_item_id)
    {
        require_once(__DIR__."./../connectdb.php");
        $query = "  SELECT
                        product_items.product_image,
                        products.name AS name, 
                        product_items.price,
                    FROM 
                        products 
                        JOIN product_items ON products.product_id = product_items.product_id
                    WHERE product_items.product_item_id = $product_item_id";
        $product_info = mysqli_query($DBConnect, $query);
        if (!$product_info) 
        {
            $message = 'Invalid query: ' . mysqli_error($DBConnect) . "<br>";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        $data = mysqli_fetch_assoc($product_info);
        return json_encode($data);
    }



<?php
    function getAllProducts()
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
                        (product 
                        JOIN product_item ON product.product_id = product_item.product_id) 
                        JOIN color ON product_item.color_id = color.color_id
                    GROUP BY 
                        product_item.product_item_id, color_name";
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
                        product_item.product_item_id AS product_item_id,  
                        product.name AS name, 
                        color.color_name AS color_name, 
                        product_item.price, 
                        product_item.product_image, 
                        product_item.quantity_in_stock,
                        product.product_id AS product_id 
                    FROM 
                        (product 
                        JOIN product_item ON product.product_id = product_item.product_id) 
                        JOIN color ON product_item.color_id = color.color_id 
                    WHERE color.color_name = '$color_name'
                    GROUP BY 
                        product_item.size_id, 
                        product_item.product_item_id";
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
                        product_item.product_item_id AS product_item_id, 
                        product.name AS name, 
                        color.color_name AS color_name, 
                        product_item.price, 
                        product_item.product_image, 
                        product_item.quantity_in_stock,
                        product.product_id AS product_id
                    FROM 
                        (product 
                        JOIN product_item ON product.product_id = product_item.product_id) 
                        JOIN color ON product_item.color_id = color.color_id 
                    WHERE price BETWEEN $min AND $max
                    GROUP BY 
                        product_item.size_id, 
                        product_item.product_item_id";
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
                        product_item.product_image,
                        product.name AS name, 
                        color.color_name AS color_name,
                        product_item.price,
                        product.description AS description
                    FROM 
                        (product 
                        JOIN product_item ON product.product_id = product_item.product_id) 
                        JOIN color ON product_item.color_id = color.color_id
                    WHERE product_item.id = $product_item_id";
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
                        user.user_name AS user_name,
                        user_review.rating AS rating,
                        user_review.creat_at AS creat_at,
                        user_review.content AS content
                    FROM
                        (user_review 
                        JOIN user ON user_review.user_id = user.user_id)
                    WHERE 
                        user_review.product_item_id = $product_item_id";
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
        $query = "  SELECT * FROM category WHERE parent_category_id IS NOT NULL";
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
                        product_item.product_image,
                        product.name AS name, 
                        product_item.price,
                    FROM 
                        product 
                        JOIN product_item ON product.product_id = product_item.product_id
                    WHERE product_item.product_item_id = $product_item_id";
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



<?php
    function writeReview($customer_id, $product_id, $rating, $review) {
        require_once(__DIR__."./../connectdb.php");
        $query = "INSERT INTO user_review (user_id, product_item_id, rating, content) VALUES ($customer_id, $product_id, $rating, '$review')";
        $result = mysqli_query($DBConnect, $query);
        if (!$result) {
            $message = 'Invalid query: ' . mysqli_error($DBConnect);
            $message .= 'Whole query: ' . $query;
            die($message);
        }
    }
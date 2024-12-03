<?php

class OrderHistory {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserOrder($user_id) {
        $query = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY order_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt;
    }

    public function getUserOrderItem($user_id) {
        $query = "SELECT 
                        oi.order_item_id,
                        oi.order_id, 
                        oi.product_item_id,
                        oi.quantity, 
                        oi.price, 
                        pd.name,
                        pi.product_image,
                        cl.color_name,
                        sz.size_value,
                        cg.category_name
                    FROM 
                        order_items oi 
                    JOIN 
                        product_items pi ON oi.product_item_id = pi.product_item_id
                    JOIN 
                        products pd ON pi.product_id = pd.product_id 
                    JOIN 
                        orders od ON oi.order_id = od.order_id
                    JOIN
                        product_category pc ON pd.product_id = pc.product_id
                    JOIN
                        categories cg ON pc.category_id = cg.category_id
                    JOIN
                        categories ccg ON cg.parent_category_id = ccg.category_id
                    JOIN
                        colors cl ON pi.color_id = cl.color_id
                    JOIN
                        sizes sz ON pi.size_id = sz.size_id
                    WHERE od.user_id = :user_id AND ccg.category_name = 'Style'
                    ORDER BY od.order_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt;
    }
}
?>
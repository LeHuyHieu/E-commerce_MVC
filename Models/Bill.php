<?php
class Bill {
    function getBillUserOder($order_id, $order_date) {
        $db = new Connect();
        $select = "SELECT title,size_name,color_name,`status`,quantity,unit_price,order_date FROM order_details WHERE order_id = $order_id and order_date = '$order_date'";
        $result = $db->getList($select);
        return $result;
    }

    function getUserOrder($user_id) {
        $db = new Connect();
        $select = "SELECT DISTINCT orders.id,fullname,email_address,shipping_address,phone_number,total_amount,city,district FROM orders WHERE user_id = $user_id";
        $result = $db->getInstance($select);
        return $result;
    }

    function getOrderdate($user_id) {
        $db = new Connect();
        $select = "SELECT order_date FROM order_details LEFT JOIN orders ON orders.id = order_details.order_id WHERE user_id = $user_id GROUP BY (order_date)";
        $result = $db->getList($select);
        return $result;
    }
}
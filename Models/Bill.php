<?php
class Bill {
    function getUserOrder($user_id) {
        $db = new Connect();
        $select = "SELECT *, shipping.shipping_date, shipping.estimated_delivery_date, shipping.shipping_status FROM orders LEFT JOIN shipping ON shipping.order_id = orders.id WHERE user_id = $user_id";
        $result = $db->getList($select);
        return $result;
    }

    function getOrderItem($order_id) {
        $db = new Connect();
        $select = "SELECT * FROM order_details WHERE order_id = $order_id";
        $result = $db->getList($select);
        return $result;
    }

    function getAllUserOrderNotConfirmed() {
        $db = new Connect();
        $select = "SELECT * FROM orders WHERE status = 0";
        $result = $db->getList($select);
        return $result;
    }
}
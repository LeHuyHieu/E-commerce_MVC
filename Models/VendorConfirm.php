<?php
class VendorConfirm {
    function DeleteUserOrder($id) {
        $db = new Connect();
        $query = "DELETE FROM orders WHERE id = $id";
        $result = $db->exec($query);
        return $result;
    }

    function UpdateUserOrder($id, $status) {
        $db = new Connect();
        $query = "UPDATE orders SET status = $status where id = $id";
        $result = $db->exec($query);
        return $result;
    }

    function ListUserOrderConfirm() {
        $db = new Connect();
        $select = "SELECT orders.* FROM orders WHERE STATUS = 1";
        $result = $db->getList($select);
        return $result;
    }

    function InsertShippingOrder($id, $shipping_date, $estimated_delivery_date) {
        $db = new Connect();
        $query = "INSERT INTO shipping (order_id, shipping_date, estimated_delivery_date) VALUES ($id, '$shipping_date', '$estimated_delivery_date')";
        $result = $db->exec($query);
        return $result;
    }

    function UpdateShippingStatus($id, $status) {
        $db = new Connect();
        $query = "UPDATE shipping SET shipping_status = $status WHERE order_id = $id";
        $result = $db->exec($query);
        return $result;
    }

    function GetListShipping($id, $status) {
        $db = new Connect();
        $select = "SELECT DISTINCT order_id FROM shipping where order_id = $id and shipping_status = $status";
        $result = $db->getInstance($select);
        return $result;
    }
}
<?php
class Bill extends DB
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getUserOrder($user_id)
    {
        $select = "SELECT orders.*, shipping.shipping_date, shipping.estimated_delivery_date, shipping.shipping_status FROM orders LEFT JOIN shipping ON shipping.order_id = orders.id WHERE user_id = $user_id AND `hidden` = 0";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getOrderItem($order_id)
    {
        $select = "SELECT * FROM order_details WHERE order_id = $order_id";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllUserOrderNotConfirmed()
    {
        $select = "SELECT * FROM orders WHERE status = 0";
        $result = $this->db->getList($select);
        return $result;
    }
}

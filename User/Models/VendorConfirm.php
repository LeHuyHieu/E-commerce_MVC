<?php
class VendorConfirm extends Connect
{
    private $db;
    public function __construct()
    {
        $this->db = new Connect();
    }

    public function DeleteUserOrder($id)
    {
        $query = "DELETE FROM orders WHERE id = $id";
        $result = $this->db->exec($query);
        return $result;
    }

    public function UpdateUserOrder($id, $status)
    {
        $query = "UPDATE orders SET status = $status where id = $id";
        $result = $this->db->exec($query);
        return $result;
    }

    public function ListUserOrderConfirm()
    {
        $select = "SELECT orders.* FROM orders WHERE STATUS = 1";
        $result = $this->db->getList($select);
        return $result;
    }

    public function InsertShippingOrder($id, $shipping_date, $estimated_delivery_date)
    {
        $query = "INSERT INTO shipping (order_id, shipping_date, estimated_delivery_date) VALUES ($id, '$shipping_date', '$estimated_delivery_date')";
        $result = $this->db->exec($query);
        return $result;
    }

    public function UpdateShippingStatus($id, $status)
    {
        $query = "UPDATE shipping SET shipping_status = $status WHERE order_id = $id";
        $result = $this->db->exec($query);
        return $result;
    }

    public function GetListShipping($id, $status)
    {
        $select = "SELECT DISTINCT order_id FROM shipping where order_id = $id and shipping_status = $status";
        $result = $this->db->getInstance($select);
        return $result;
    }
}

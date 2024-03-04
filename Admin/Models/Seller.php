<?php
class Seller extends DB
{
    private $db;
    public function __construct() {
        $this->db = new DB();
    }

    public function getAllOrders() {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id,user_id,fullname,email_address,shipping_address,city,district,phone_number,order_date,total_amount,`status`,code_order FROM orders WHERE deleted_at IS NULL";
        isset($search) ? $select .= " AND (name like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllOrdersPagination($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id,user_id,fullname,email_address,shipping_address,city,district,phone_number,order_date,total_amount,`status`,code_order FROM orders WHERE deleted_at IS NULL";
        isset($search) ? $select .= " AND (name like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $select .= " ORDER BY id DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getOrderItem($id) {
        $select = "SELECT id,user_id,fullname,email_address,shipping_address,city,district,phone_number,order_date,total_amount,`status`,code_order FROM orders WHERE deleted_at IS NULL AND id = $id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getAllOrderDetail($id) {
        $select = "SELECT note,title,size_name,color_name,quantity,unit_price FROM order_details WHERE order_id = $id";
        $result = $this->db->getList($select);
        return $result;
    }


    public function getAllShipping() {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT shipping.id, shipping.shipping_status, orders.fullname,orders.phone_number,orders.total_amount FROM shipping LEFT JOIN orders ON orders.id = shipping.order_id";
        isset($search) ? $select .= " AND (orders.fullname like '%$search%' OR orders.phone_number like '%$search%' OR orders.total_amount like '%$search%')" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllShippingPagination($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT shipping.id, shipping.shipping_status, orders.fullname,orders.phone_number,orders.total_amount FROM shipping LEFT JOIN orders ON orders.id = shipping.order_id";
        isset($search) ? $select .= " AND (orders.fullname like '%$search%' OR orders.phone_number like '%$search%' OR orders.total_amount like '%$search%')" : "";
        $select .= " ORDER BY id DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

}
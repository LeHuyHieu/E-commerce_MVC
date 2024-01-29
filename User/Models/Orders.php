<?php
class Orders extends DB
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getCity()
    {
        $select = "SELECT id, name from location WHERE city_id = 0";
        $result = $this->db->getList($select)->fetchAll();
        return $result;
    }

    public function getDistrict($id)
    {
        $select = "SELECT id, name from location WHERE city_id = $id";
        $result = $this->db->getList($select)->fetchAll();
        return $result;
    }

    public function getLocation($id)
    {
        $select = "SELECT name from location where id = $id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getUser($user_id)
    {
        $select = "SELECT DISTINCT email,fullname,address,phone FROM users WHERE id = $user_id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getProductOrder($user_id)
    {
        $select = "SELECT title, quantity,total, product_id, size_id, color_id, cart.id as cart_id, size.name AS size_name, color.name AS color_name FROM cart LEFT JOIN size ON size.id = cart.size_id LEFT JOIN color ON color.id = cart.color_id WHERE user_id = $user_id";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getUserOrder($user_id)
    {
        $select = "SELECT id FROM orders WHERE user_id = $user_id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function updateProductDetailQuantity($product_id, $size_id, $color_id, $quantity, $count_quantity)
    {
        $qtity = $count_quantity - $quantity;
        $query = "UPDATE detail_product SET quantity = $qtity WHERE product_id = $product_id AND size_id = $size_id AND color_id = $color_id";
        $result = $this->db->exec($query);
        return $result;
    }

    public function insertOrder($data)
    {
        $data['order_date'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('orders', $data);
        $result = $this->db->lastInsertId();
        return $result;
    }

    public function insertOrderDetail($data)
    {
        $result = $this->db->insert('order_details', $data);
        return $result;
    }
}

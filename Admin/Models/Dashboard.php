<?php
class Dashboard extends DB 
{
    private $db;
    public function __construct() {
        $this->db = new DB();
    }

    public function getTotalOrders() {
        $select = "SELECT COUNT(id) as total_order FROM orders";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getTotalRevenue() {
        $select = "SELECT SUM(total_amount) AS total_revenue FROM orders WHERE `status` = 3";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getCounter() {
        $select = "SELECT cnt FROM counter";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getSiteTraffic() {
        $select = "SELECT COUNT(visitor) AS count_visitor FROM view_page WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) GROUP BY `date` LIMIT 7";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getCountproduct() {
        $select = "SELECT COUNT(id) AS count_product FROM products WHERE deleted_at IS NULL";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getTopProduct () {
        $select = "SELECT title, size_name, color_name, product_id, SUM(quantity) AS total_quantity, SUM(unit_price) AS total_price FROM order_details GROUP BY product_id, size_name, color_name ORDER BY total_price DESC LIMIT 12";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getDetailTopProduct($product_id, $size_name, $color_name) {
        $select = "SELECT image_product, price, color.name AS color_name, size.name AS size_name FROM detail_product LEFT JOIN size ON size.id = detail_product.size_id LEFT JOIN color ON color.id = detail_product.color_id WHERE product_id = $product_id AND size.name = '$size_name' AND color.name = '$color_name'";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getDetailTopProductDiscount($product_id) {
        $select = "SELECT discount_percent FROM products LEFT JOIN discounts ON discounts.id = products.discount_id WHERE products.id = $product_id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getOrderStatus($status) {
        $status_join = join(',', $status);
        $select = "SELECT COUNT(`status`) AS order_status_count, SUM(total_amount) AS total_amount FROM orders WHERE `status` IN($status_join)";
        $result = $this->db->getInstance($select);
        return $result;
    }
}
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
}
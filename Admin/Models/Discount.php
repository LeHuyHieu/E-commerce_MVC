<?php 
class Discount extends DB
{
    private $db;
    public function __construct() {
        $this->db = new DB;
    }

    public function getAllDiscount () {
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = $_GET['title'];
        }
        $select = "SELECT id, name, description, discount_percent, active, created_at FROM discounts ";
        isset($title) ? $select .= " WHERE name like '%$title%'" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllDiscountPagination ($start, $limit) {
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = $_GET['title'];
        }
        $select = "SELECT id, name, description, discount_percent, active, created_at FROM discounts ";
        isset($title) ? $select .= " WHERE name like '%$title%'" : "";
        $select .= " ORDER BY created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getDiscountId ($id) {
        $select = "SELECT name,description,discount_percent,active FROM discounts WHERE id = $id";
        $result = $this->db->getInstance($select);
        return $result;
    }
}

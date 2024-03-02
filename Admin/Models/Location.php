<?php 
class Location extends DB
{
    private $db;
    public function __construct() {
        $this->db = new DB();
    }

    public function getAllLocation () {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id,city_id,name,created_at FROM location WHERE 1";
        isset($search) ? $select .= " AND name like '%$search%'" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllLocationPagination ($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id,city_id,name,created_at FROM location WHERE 1";
        isset($search) ? $select .= " AND name like '%$search%'" : "";
        $select .= " ORDER BY created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getLocationId ($id) {
        $select = "SELECT city_id,name FROM location WHERE id = $id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getParentCity ($city_id) {
        $select = "SELECT `name` FROM location WHERE id = $city_id";
        $result = $this->db->getInstance($select);
        return !empty($result['name']) ? $result['name'] : '';
    }
}
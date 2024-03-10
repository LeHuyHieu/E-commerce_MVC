<?php
class Users extends DB 
{
    private $db;
    public function __construct() {
        $this->db = new DB();
    }

    public function getAllUserIsVisible () {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT fullname, email, address, phone, created_at FROM users WHERE is_visible = 0";
        isset($search) ? $select .= " AND (fullname like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllUserIsVisiblePagination ($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id, fullname, email, address, phone, created_at FROM users WHERE is_visible = 0";
        isset($search) ? $select .= " AND (fullname like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $select .= " ORDER BY created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllUserNotIsVisible () {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT fullname, email, address, phone, created_at FROM users WHERE is_visible = 1";
        isset($search) ? $select .= " AND (fullname like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllUserNotIsVisiblePagination ($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id, fullname, email, address, phone, created_at FROM users WHERE is_visible = 1";
        isset($search) ? $select .= " AND (fullname like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $select .= " ORDER BY created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }
}
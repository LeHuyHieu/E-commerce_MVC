<?php 
class Staff extends DB
{
    private $db;
    public function __construct() {
        $this->db = new DB();
    }

    public function getAllStaff () {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id, name, email, avatar, phone, birthday FROM staff WHERE status = 1 AND role <> 10";
        isset($search) ? $select .= " AND (name like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllStaffPagination ($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id, name, email, avatar, phone, birthday FROM staff WHERE status = 1 AND role <> 10";
        isset($search) ? $select .= " AND (name like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $select .= " ORDER BY created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getStaffId ($id) {
        $select = "SELECT name, email, avatar, phone, birthday FROM staff WHERE status = 1 AND id = $id AND role <> 10";
        $result = $this->db->getInstance($select);
        return $result;
    }
}
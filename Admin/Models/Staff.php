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
        $select = "SELECT id, name, email, avatar, phone, birthday, address FROM staff WHERE status = 1 AND role <> 10";
        isset($search) ? $select .= " AND (name like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllStaffPagination ($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id, name, email, avatar, phone, birthday, address FROM staff WHERE status = 1 AND role <> 10";
        isset($search) ? $select .= " AND (name like '%$search%' OR email like '%$search%' OR phone like '%$search%')" : "";
        $select .= " ORDER BY created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getStaffId ($id) {
        $select = "SELECT name, email, avatar, phone, birthday, address FROM staff WHERE status = 1 AND id = $id AND role <> 10";
        $result = $this->db->getInstance($select);
        return $result;
    }


    //check login
    public function checkLogin ($email, $password) {
        $select = "SELECT `name`, email, avatar, birthday, phone, `role`, token, created_at, id, address FROM staff WHERE email = '$email' AND `password` = '$password' AND status = 1";
        $result = $this->db->getList($select);
        return $result;
    }

    public function editProfile ($user_id) {
        $select = "SELECT `name`, email, avatar, birthday, phone, address FROM staff WHERE id = $user_id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function checkOldPassword ($user_id, $password) {
        $select = "SELECT id FROM staff WHERE id = $user_id AND `password` = '$password'";
        $result = $this->db->getInstance($select);
        return $result;
    }
}
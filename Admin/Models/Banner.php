<?php
class Banner extends DB
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAllBanner () {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id, title, `event`, background, starting_at, created_at FROM banner WHERE 1";
        isset($search) ? $select .= " AND title like '%$search%' OR event  LIKE '%$search%' OR starting_at  LIKE '%$search%'" : "";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllBannerPagination ($start, $limit) {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }
        $select = "SELECT id, title, `event`, background, starting_at, created_at FROM banner WHERE 1";
        isset($search) ? $select .= " AND title like '%$search%' OR event  LIKE '%$search%' OR starting_at  LIKE '%$search%'" : "";
        $select .= " ORDER BY created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getBannerId ($id) {
        $select = "SELECT title,`event`,background,starting_at FROM banner WHERE id = $id";
        $result = $this->db->getInstance($select);
        return $result;
    }
}
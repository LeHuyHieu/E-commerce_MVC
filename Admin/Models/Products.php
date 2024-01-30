<?php
class Products extends DB
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    //product attributes
    public function insertAttrColor($data)
    {
        $result = $this->db->insert('color',$data);
        return $result;
    }

    public function insertAttrSize($data)
    {
        $result = $this->db->insert('size',$data);
        return $result;
    }

    public function getAttrColor()
    {
        $result = $this->db->getList("SELECT * FROM color ORDER BY id DESC");
        return $result;
    }

    public function getAttrSize()
    {
        $result = $this->db->getList("SELECT * FROM size ORDER BY id DESC");
        return $result;
    }
}
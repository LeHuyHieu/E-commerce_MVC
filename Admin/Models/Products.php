<?php
class Products extends DB
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }
}
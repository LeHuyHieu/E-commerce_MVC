<?php
class Banner extends DB
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }
}
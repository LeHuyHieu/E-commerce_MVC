<?php
class Products extends Connect
{
    private $db;
    public function __construct()
    {
        $this->db = new Connect();
    }
}
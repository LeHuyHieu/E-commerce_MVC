<?php

class Connect {
    var $db = null;

    function __construct()
    {
        $dns = 'mysql:host=localhost;dbname=shop';
        $user = 'root';
        $pass = '';

        try {
            $this->db = new PDO($dns, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            // echo 'Kết nối thành công';
        } catch (\Throwable $th) {
            echo 'Kết nối thất bại';
            echo $th;
        }
    }

    function getList ($select) 
    {
        $result = $this->db->query($select);
        return $result;
    }

    function getInstance ($select)
    {
        $results = $this->db->query($select);
        $result = $results->fetch();
        return $result;
    }

    function exec ($query) 
    {
        $result = $this->db->exec($query);
        return $result;
    }

    function execP($query) 
    {
        $statement = $this->db->prepare($query);
        return $statement;
    }
}


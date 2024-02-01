<?php

class DB
{
    private $db = null, $lastQuery = null;

    public function __construct()
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

    public function getList($select)
    {
        $result = $this->db->query($select);
        return $result;
    }

    public function getInstance($select)
    {
        $results = $this->db->query($select);
        $result = $results->fetch();
        return $result;
    }

    public function exec($query)
    {
        $result = $this->db->exec($query);
        return $result;
    }

    public function execP($query)
    {
        $statement = $this->db->prepare($query);
        return $statement;
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }

    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_map(function ($value) {
            return is_numeric($value) ? $value : "'" . $value . "'";
        }, $data));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $this->lastQuery = $query;
        return $this->exec($query);
    }

    public function update($table, $data, $condition)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $value = is_numeric($value) ? $value : "'" . ($value) . "'";
            $set .= "$key = $value, ";
        }
        $set = rtrim($set, ', ');
        $query = "UPDATE $table SET $set WHERE $condition";
        return $this->exec($query);
    }

    public function delete($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->exec($query);
        return $result;
    }

    public function find($id, $table)
    {
        $select = "SELECT * FROM $table WHERE id = $id";
        $result = $this->getInstance($select);
        return $result;
    }

    public function getLastQuery() {
        return $this->lastQuery;
    }

    private function escape($value)
    {
        return $this->db->quote($value);
    }
}

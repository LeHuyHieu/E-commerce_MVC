<?php
class Pagination
{
    public function findPage($count, $limit)
    {
        $page = (($count % $limit) == 0 ? $count / $limit : ceil($count / $limit));
        return $page;
    }

    public function findStart($limit)
    {
        if (!isset($_GET['page']) || $_GET['page'] == 1 || $_GET['page'] == 0) {
            $start = 0;
        } else {
            $start = ($_GET['page'] - 1) * $limit;
        }
        return $start;
    }
}
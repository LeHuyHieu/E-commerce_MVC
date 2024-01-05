<?php
class Category
{
    function getCategory () 
    {
        $db = new Connect();
        $select = 'SELECT name, id, banner_image FROM categories WHERE parent_id = 0';
        $result = $db->getList($select);
        return $result;
    }

    function getSubCategory($id)
    {
        $db = new Connect();
        $select = 'SELECT name, id FROM categories WHERE parent_id = '. $id;
        $result = $db->getList($select);
        return $result;
    }
}

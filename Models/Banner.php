<?php
class Banner 
{
   function getBanner() 
   {
        $db = new Connect();
        $select = 'SELECT * FROM banner ORDER BY id DESC LIMIT 6';
        $result = $db->getList($select);
        return $result;
   }
}
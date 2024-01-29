<?php
class Banner extends DB
{
   private $db;
   public function __construct()
   {
      $this->db = new DB();
   }
   
   public function getBanner()
   {
      $select = 'SELECT * FROM banner ORDER BY id DESC LIMIT 6';
      $result = $this->db->getList($select);
      return $result;
   }
}

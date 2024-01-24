<?php
class Banner extends Connect
{
   private $db;
   public function __construct()
   {
      $this->db = new Connect();
   }
   
   public function getBanner()
   {
      $select = 'SELECT * FROM banner ORDER BY id DESC LIMIT 6';
      $result = $this->db->getList($select);
      return $result;
   }
}

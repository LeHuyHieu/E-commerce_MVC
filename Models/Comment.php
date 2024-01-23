<?php
class Comment extends Connect
{
    private $db;
    public function __construct()
    {
        $this->db = new Connect();
    }

    //insert comment
    public function insertComment($data)
    {
        $result = $this->db->insert('comments', $data);
        return $result;
    }

    //list comments
    public function getListComments($product_id)
    {
        $select = "SELECT comments.comment, comments.comment_id, comments.rating, comments.created_at, users.fullname, comments.id
                    FROM comments
                    LEFT JOIN users ON users.id = comments.user_id
                    WHERE comments.comment_id = 0 AND comments.product_id = $product_id";
        $result = $this->db->getList($select);
        return $result;
    }

    //get list reply comments
    public function getListReplyComments()
    {
        $select = "SELECT comments.comment, comments.comment_id, comments.rating, comments.created_at, users.fullname, comments.id FROM comments LEFT JOIN users ON users.id = comments.user_id WHERE comments.comment_id <> 0";
        $result = $this->db->getList($select);
        return $result;
    }

    //show rating
    public function ratingProduct($product_id)
    {
        $select = "SELECT DISTINCT AVG(rating) as rating FROM comments WHERE product_id = $product_id AND comment_id = 0";
        $result = $this->db->getInstance($select);
        return $result;
    }
}

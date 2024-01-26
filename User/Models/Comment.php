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
        $data['created_at'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('comments', $data);
        return $result;
    }

    //list comments
    public function getListComments($product_id)
    {
        $select = "SELECT comments.comment, comments.comment_id, comments.created_at, users.fullname, comments.id FROM comments LEFT JOIN users ON users.id = comments.user_id WHERE comments.comment_id = 0 AND comments.product_id = $product_id";
        $result = $this->db->getList($select);
        return $result;
    }

    //get list reply comments
    public function getListReplyComments()
    {
        $select = "SELECT comments.comment, comments.comment_id, comments.created_at, users.fullname, comments.id FROM comments LEFT JOIN users ON users.id = comments.user_id WHERE comments.comment_id <> 0";
        $result = $this->db->getList($select);
        return $result;
    }

    //show rating
    public function ratingProduct($product_id)
    {
        $select = "SELECT DISTINCT AVG(rating) as rating FROM reviews WHERE product_id = $product_id AND review_id = 0";
        $result = $this->db->getInstance($select);
        return $result;
    }

    //review
    public function getUserDoneReview($user_id)
    {
        $select = "SELECT DISTINCT reviews.id, COUNT(user_id) AS count_user_review FROM reviews LEFT JOIN users ON users.id = reviews.user_id WHERE review_id = 0 AND user_id = $user_id";
        $result = $this->db->getInstance($select);
        return $result;
    }
    public function insertReview($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $result = $this->db->insert('reviews', $data);
        return $result;
    }

    public function getListReviews($product_id)
    {
        $select = "SELECT reviews.review, reviews.review_id, reviews.rating, reviews.review, reviews.created_at, users.fullname, reviews.id FROM reviews LEFT JOIN users ON users.id = reviews.user_id WHERE reviews.review_id = 0 AND reviews.product_id = $product_id order by reviews.created_at desc";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getListReplyReviews()
    {
        $select = "SELECT reviews.review, reviews.review_id, reviews.created_at, users.fullname, reviews.id FROM reviews LEFT JOIN users ON users.id = reviews.user_id WHERE reviews.review_id <> 0";
        $result = $this->db->getList($select);
        return $result;
    }
}

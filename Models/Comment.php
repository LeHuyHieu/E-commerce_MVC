<?php
class Comment {
    //insert comment
    function insertComment($data) {
        $comment = isset($data['comment']) ? $data['comment'] : null;
        $user_id = isset($data['user_id']) ? $data['user_id'] : 0;
        $product_id = isset($data['product_id']) ? $data['product_id'] : 0;
        $rating = isset($data['rating']) ? $data['rating'] : 0;
        $comment_id = isset($data['comment_id']) ? $data['comment_id'] : 0;
        $currentDateTime = date("Y-m-d H:i:s");
        $db = new Connect();
        $select = "INSERT INTO comments (comment, comment_id, user_id, product_id, rating, created_at, updated_at) VALUES ('$comment', $comment_id, $user_id, $product_id, $rating, '$currentDateTime', '$currentDateTime')";
        $result = $db->exec($select);
        return $result;
    }

    //list comments
    function getListComments ($product_id) {
        $db = new Connect();
        $select = "SELECT comments.comment, comments.comment_id, comments.rating, comments.created_at, users.fullname, comments.id
                    FROM comments
                    LEFT JOIN users ON users.id = comments.user_id
                    WHERE comments.comment_id = 0 AND comments.product_id = $product_id";
        $result = $db->getList($select);
        return $result;
    }

    //get list reply comments
    function getListReplyComments () {
        $db = new Connect();
        $select = "SELECT comments.comment, comments.comment_id, comments.rating, comments.created_at, users.fullname, comments.id
                    FROM comments
                    LEFT JOIN users ON users.id = comments.user_id
                    WHERE comments.comment_id <> 0";
        $result = $db->getList($select);
        return $result;
    }

    function ratingProduct($product_id) {
        $db = new Connect();
        $select = "SELECT DISTINCT AVG(rating) as rating FROM comments WHERE product_id = $product_id AND comment_id = 0";
        $result = $db->getInstance($select);
        return $result;
    }
}

<?php 
$handle = isset($_GET['handle']) ? $_GET['handle'] : '';

switch ($handle) {
    case 'review_product_detail' :
        $rating = isset($_POST['rating']) ? $_POST['rating'] : 1;
        $review = isset($_POST['review']) ? $_POST['review'] : '';
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
        $data = [];
        $data['review'] = $review;
        $data['product_id'] = $product_id;
        $data['user_id'] = $user_id;
        $data['rating'] = $rating;
        if ($rating == 0 || $review == '' || $user_id == 0 || $product_id == 0) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?action=detail_product&id='.$product_id.'&data_empty=1">';
        }else {
            $comment_table = new Comment();
            $comment_table->insertReview($data);
        }
        include_once './Views/pages/ajax/load_review_reply.php';
        break;
    case 'reply_review' :
        $review = isset($_POST['review']) ? $_POST['review'] : '';
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
        $review_id = isset($_POST['review_id']) ? $_POST['review_id'] : 0;
        $data = [];
        $data['review'] = $review;
        $data['product_id'] = $product_id;
        $data['user_id'] = $user_id;
        $data['review_id'] = $review_id;
        if ($review == '' || $user_id == 0 || $product_id == 0 || $review_id == 0) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?action=detail_product&id='.$product_id.'&data_empty=1">';
        }else {
            $comment_table = new Comment();
            $check = $comment_table->insertReview($data);
        }
        include_once './Views/pages/ajax/load_review_reply.php';
        break;
    case 'comment_product_detail':
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
        $data = [];
        $data['comment'] = $comment;
        $data['product_id'] = $product_id;
        $data['user_id'] = $user_id;
        if ($comment == '' || $user_id == 0 || $product_id == 0) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?action=detail_product&id='.$product_id.'&data_empty=1">';
        }else {
            $comment_table = new Comment();
            $comment_table->insertComment($data);
        }
        include_once './Views/pages/ajax/load_comment_reply.php';
        break;
    case 'reply_comment':
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
        $comment_id = isset($_POST['comment_id']) ? $_POST['comment_id'] : 0;
        $data = [];
        $data['comment'] = $comment;
        $data['product_id'] = $product_id;
        $data['user_id'] = $user_id;
        $data['comment_id'] = $comment_id;
        if ($comment == '' || $user_id == 0 || $product_id == 0 || $comment_id == 0) {
            echo '<meta http-equiv="refresh" content="0; url=index.php?action=detail_product&id='.$product_id.'&data_empty=1">';
        }else {
            $comment_table = new Comment();
            $check = $comment_table->insertComment($data);
        }
        include_once './Views/pages/ajax/load_comment_reply.php';
        break;
    default :
        echo '<meta http-equiv="refresh" content="0; url=index.php?action=home">';
        break;
}

?>
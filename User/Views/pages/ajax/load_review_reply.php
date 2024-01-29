<div class="list_review">
    <?php
    include_once './Models/Comment.php';
    $id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
    $list_reviews = new Comment();
    $reviews = $list_reviews->getListReviews($id)->fetchAll();
    if (count($reviews) > 0) {
        foreach ($reviews as $review) {
            $date = date_create($review['created_at']);
    ?>
        <div class="comment-review border-1 border pl-10 pr-10 py-3 rounded mb-25">
            <span class="name"><?php echo $review['fullname']; ?></span>
            <ul class="rating">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <li class="<?php echo ($review['rating'] < $i) ? 'no-star' : ''; ?>"><i class="fa fa-star-o"></i></li>
                <?php } ?>
            </ul>
            <span class="mb-0 float-right" style="font-weight: 400;"><?php echo date_format($date, 'd/m/Y'); ?></span>
            <p class="mb-0"><?php echo $review['review']; ?></p>
            <?php if (isset($_SESSION['user'])) { ?>
                <button class="btn-sm btn float-right replyReview" data-toggle="modal" data-target="#replyReviewModel" data-review-id="<?php echo $review['id']; ?>">Reply</button>
            <?php } ?>
        </div>
        <?php
        $reply_review = $list_reviews->getListReplyReviews();
        if ($reply_review->rowCount() > 0) {
            foreach ($reply_review as $reply) {
                if ($reply['review_id'] == $review['id']) {
                    $date = date_create($reply['created_at']);
        ?>
                    <div class="comment-review border-1 border pl-10 pr-10 py-3 rounded mb-25 ml-auto" style="width: 95%;">
                        <span><?php echo $reply['fullname']; ?></span>
                        <span class="mb-0 float-right" style="font-weight: 400;"><?php echo date_format($date, 'd/m/Y'); ?></span>
                        <p class="mb-0"><?php echo $reply['review']; ?></p>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <button class="btn-sm btn float-right replyReview" data-toggle="modal" data-target="#replyReviewModel" data-review-id="<?php echo $review['id']; ?>">Reply</button>
                        <?php } ?>
                    </div>
        <?php }
            }
        } }
    } ?>
</div>
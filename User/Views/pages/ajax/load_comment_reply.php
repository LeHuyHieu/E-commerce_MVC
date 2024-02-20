<div class="list_comment">
    <?php
    include_once './Models/Comment.php';
    $id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
    $list_comment = new Comment();
    $comments = $list_comment->getListComments($id)->fetchAll();
    if (count($comments) > 0) {
        foreach ($comments as $comment) {
            $date = date_create($comment['created_at']);
            ?>
            <div class="comment-review border-1 border pl-10 pr-10 py-3 rounded position-relative mb-25">
                <span class="name"><?php echo $comment['fullname']; ?></span>
                <span class="mb-0 float-right position-absolute" style="font-weight: 400;right:10px;"><?php echo date_format($date, 'd/m/Y'); ?></span>
                <p class="mb-0"><?php echo $comment['comment']; ?></p>
                <?php if (isset($_SESSION['user'])) { ?>
                    <button class="btn-sm btn float-right position-absolute replyComment" style="right:10px;" data-toggle="modal" data-target="#replyCommentModel" data-comment-id="<?php echo $comment['id']; ?>">Reply</button>
                <?php } ?>
            </div>
            <?php
            $reply_comment = $list_comment->getListReplyComments();
            if ($reply_comment->rowCount() > 0) {
                foreach ($reply_comment as $reply) {
                    if ($reply['comment_id'] == $comment['id']) {
                        $date = date_create($reply['created_at']);
                        ?>
                        <div class="comment-review border-1 border pl-10 pr-10 py-3 rounded mb-25 position-relative ml-auto" style="width: 95%;">
                            <span><?php echo $reply['fullname']; ?></span>
                            <span class="mb-0 float-right position-absolute" style="font-weight: 400;right: 10px;"><?php echo date_format($date, 'd/m/Y'); ?></span>
                            <p class="mb-0"><?php echo $reply['comment']; ?></p>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <button class="btn-sm btn float-right position-absolute replyComment" style="right:10px;" data-toggle="modal" data-target="#replyCommentModel" data-comment-id="<?php echo $comment['id']; ?>">Reply</button>
                            <?php } ?>
                        </div>
                    <?php }
                }
            } }
    } ?>
</div>
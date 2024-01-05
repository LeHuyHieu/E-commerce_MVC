$(document).ready(function () {
    var formReplyComment = $('#formReplyComment');
    var button = formReplyComment.find('button[name="send_comment"]');
    $(document).on('click', '.replyComment',function () {
        formReplyComment.find('input[name="comment_id"]').val($(this).attr('data-comment-id'));
        formReplyComment.find('textarea[name="comment"]').val('@'+$(this).siblings('.name').text());
        console.log($(this).siblings('.name').text());
    })
    button.on('click', function () {
        var commentId = formReplyComment.find('input[name="comment_id"]').val();
        var productId = formReplyComment.find('input[name="product_id"]').val();
        var userId = formReplyComment.find('input[name="user_id"]').val();
        var comment = formReplyComment.find('textarea[name="comment"]').val();
        
        var data = {
            'comment_id': commentId,
            'user_id': userId,
            'comment': comment,
            'product_id': productId,
        };
        console.log(data);
        $.ajax({
            url: "./index.php?action=comment&handle=reply_comment&product_id="+productId,
            type: 'post',
            data: data,
            success: function (response) {
                var responseHtml = $(response);
                var newListComment = responseHtml.filter('.list_comment').html();
                $('.list_comment').html(newListComment);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('button[name="send_comment"]').on('click', function (event) {
        event.preventDefault(); 
        var productId = $('#formComment').find('input[name="product_id"]').val();
        var rating = $('#formComment').find('select[name="rating"]').val();
        var userId = $('#formComment').find('input[name="user_id"]').val();
        var comment = $('#formComment').find('textarea[name="comment"]').val();
        
        var data = {
            'rating': rating,
            'user_id': userId,
            'comment': comment,
            'product_id': productId,
        };
        console.log(data);
        $.ajax({
            url: "./index.php?action=comment&handle=comment_product_detail&product_id=" + productId,
            type: 'post',
            data: data,
            success: function (response) {
                var responseHtml = $(response);
                var newListComment = responseHtml.filter('.list_comment').html();
                $('.list_comment').html(newListComment);
                $('#formComment').find('textarea[name="comment"]').val('');
                $('#formComment').find('select[name="rating"]').val(1);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
})
$(document).ready(function () {
    var formReplyReview = $('#formReplyReview');
    var button = formReplyReview.find('button[name="send_reply_review"]');
    $(document).on('click', '.replyReview',function () {
        formReplyReview.find('input[name="review_id"]').val($(this).attr('data-review-id'));
        formReplyReview.find('textarea[name="review"]').val('@'+$(this).siblings('.name').text());
    })
    button.on('click', function () {
        var reviewId = formReplyReview.find('input[name="review_id"]').val();
        var productId = formReplyReview.find('input[name="product_id"]').val();
        var userId = formReplyReview.find('input[name="user_id"]').val();
        var review = formReplyReview.find('textarea[name="review"]').val();
        
        var data = {
            'review_id': reviewId,
            'user_id': userId,
            'review': review,
            'product_id': productId,
        };
        $.ajax({
            url: "./index.php?action=comment&handle=reply_review&product_id="+productId,
            type: 'post',
            data: data,
            success: function (response) {
                var responseHtml = $(response);
                var newListReview = responseHtml.filter('.list_comment').html();
                $('.list_comment').html(newListReview);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('button[name="send_review"]').on('click', function (event) {
        event.preventDefault(); 
        var productId = $('#formReview').find('input[name="product_id"]').val();
        var rating = $('#formReview').find('select[name="rating"]').val();
        var userId = $('#formReview').find('input[name="user_id"]').val();
        var review = $('#formReview').find('textarea[name="review"]').val();
        
        var data = {
            'rating': rating,
            'user_id': userId,
            'review': review,
            'product_id': productId,
        };
        $.ajax({
            url: "./index.php?action=comment&handle=review_product_detail&product_id=" + productId,
            type: 'post',
            data: data,
            success: function (response) {
                var responseHtml = $(response);
                var newListReview = responseHtml.filter('.list_comment').html();
                $('.list_comment').html(newListReview);
                $('#formReview').find('textarea[name="review"]').val('');
                $('#formReview').find('select[name="rating"]').val(1);
                $('#hidden-btn-review').empty();
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
})
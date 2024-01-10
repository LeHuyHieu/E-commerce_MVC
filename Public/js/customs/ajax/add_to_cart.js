function getCart(title ,alert, message) {
    $.ajax({
        url: 'index.php?action=cart',
        method: 'GET',
        data: '',
        success: (function(response) {
            let new_response = $(response);
            let cart_header = new_response.find('.hm-minicart').html();
            let table_list_cart = new_response.filter('.load-list-cart').html();
            $('.load-list-cart').html(table_list_cart);
            if ($('.hm-minicart-trigger').hasClass('is-active')) {
                $('.hm-minicart').html(cart_header);
                $('.hm-minicart-trigger').addClass('is-active');
                $('.minicart').css('display', 'block');
            }else {
                $('.hm-minicart').html(cart_header);
            }
            $.Toast('', message, alert, {
                has_icon:true,
                has_close_btn:true,
                stack: true,
                timeout:5000,
                sticky:false,
                has_progress:true,
                rtl:false,
                position_class: 'toast-top-right'
            });
        })
    })
}

$(document).ready(function() {
    $(document).on('click', '.btn-add-to-cart',function(e) {
        e.preventDefault();
        var _this = $(this);
        var form = _this.closest('form[action="index.php?action=cart&handel=cart_process"]');
        var product_id = (form.find('input[name="product_id"]').val() == undefined) ? 0 : form.find('input[name="product_id"]').val();
        var quantity = (form.find('input[name="quantity"]').val() == undefined) ? 1 : form.find('input[name="quantity"]').val();
        var color_id = (form.find('input[name="color_id"]').val() == undefined) ? 1 : form.find('input[name="color_id"]').val();
        var size_id = (form.find('input[name="size_id"]').val() == undefined) ? 1 : form.find('input[name="size_id"]').val();
        let data = {'product_id': product_id, 'color_id': color_id, 'size_id': size_id, 'quantity': quantity, 'submit': ''};

        $.ajax({
            url: 'index.php?action=cart&handel=cart_process',
            method: 'POST',
            data: data,
            success: (function(response) {
                let title = 'Success';
                let alert = 'success';
                let message = 'Add to cart successfully <a style="color: #fff; text-decoration: underline;" href="index.php?action=cart">View full cart</a>';
                getCart(title, alert, message)
            })
        })
    });

    $(document).on('click', '.delete-cart-item-product',function(e) {
        e.preventDefault();
        let deleteLink = $(this).attr('href');
        $.confirm({
            theme: 'jconfirm-my-theme',
            title: 'Confirm!',
            content: 'You definitely want to delete!',
            icon: 'fa fa-exclamation-circle', 
            closeIcon: true,
            closeIconClass: 'fa fa-close',
            autoClose: 'cancel|8000',
            buttons: {
                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function () {
                        $.ajax({
                            url: deleteLink,
                            method: 'GET',
                            data: '',
                            success: function (response) {
                                let title = 'Success';
                                let alert = 'success';
                                let message = 'Delete cart item successfully';
                                getCart(title, alert, message);
                            }
                        });
                    }
                },
                cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-primary',
                    action: function () {
                    }
                }
            },
            draggable: false
        });
    });
});

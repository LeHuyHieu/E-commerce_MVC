$(document).ready(function() {
    $('.btn-add-to-cart').on('click', function(e) {
        e.preventDefault();
        var _this = $(this);
        var form = _this.closest('form[action="index.php?action=cart&handel=cart_process"]');
        console.log(form);
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
                console.log(response);
                let new_response = $(response);
                let cart_header = new_response.find('.hm-minicart');
                console.log(cart_header);
            })
        })
    });
});

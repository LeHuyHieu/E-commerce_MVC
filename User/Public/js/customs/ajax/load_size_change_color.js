$(document).ready(function() {
    $(document).on('click', '.change-image-product', function() {
        var _this = $(this);
        var color_id = _this.attr('data-color-id');
        var size_id = _this.attr('data-size-id');
        var product_id = _this.attr('data-id-product');
        var discount_percent = _this.attr('data-discount-percent');
        $('#dataPostProductIdView'+product_id).val(product_id);
        $('#dataPostColorIdView'+product_id).val(color_id);
        $('#dataPostSizeIdView'+product_id).val(size_id);
        $.ajax({
            url: "index.php?action=home&handel=home_process",
            method: 'POST',
            data: {'product_id': product_id, 'color_id': color_id, 'discount_percent': discount_percent},
            success: function(response) {
                var $responseHtml = $(response);
                var newResponse = $responseHtml.find('#selectSizeId'+product_id).html();
                $('#selectSizeId'+product_id).html(newResponse);
            },
            error: function(xhr, status, error) {
              console.error(error);
            }
        })
    })
    $(document).on('change', '.list_size[name="size_id"]', function() {
        var product_id = $(this).find('option:selected').attr('data-id-product');
        var color_id = $(this).find('option:selected').attr('data-color-id');
        var price = $(this).find('option:selected').attr('data-price-size');
        $('#dataPostProductIdView'+product_id).val(product_id);
        $('#dataPostColorIdView'+product_id).val(color_id);
        $('#dataPostSizeIdView'+product_id).val($(this).val());
        $('#showPrice'+product_id).html(price + ' VND');
    });
})
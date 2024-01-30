function select2Load() {
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
}
$(document).ready(function () {
    select2Load()

    $('.btn-delete-item').click(function (e) {
        e.preventDefault();
        let link = $(this).attr('href');
        $.confirm({
            theme: 'bootstrap',
            title: 'Confirm delete!',
            content: 'Simple confirm!',
            buttons: {
                delete: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function () {
                        window.location.href = link
                    }
                },
                cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-secondary',
                }
            }
        });
    })

    $('#changeAttr').on('change', function () {
        console.log($(this).val())
        var attr = $(this).val();
        var htmlColor = $('.color').html();
        var htmlSize = $('.size').html();
        if (attr == 'color') {
            $('.append-input').html(htmlColor)
        }else if (attr == 'size') {
            $('.append-input').html(htmlSize)
        }else {
            $('.append-input').html('')
        }
    })

    if ($('#dataTableAttrProduct').length) {
        $('#dataTableAttrProduct').DataTable();
    }
    if ($('#dataTableAttrProduct2').length) {
        $('#dataTableAttrProduct2').DataTable();
    }
    if ($('#descriptionProduct').length) {
        tinymce.init({
            selector: '#descriptionProduct'
        });
    }
    if ($('#imageUploadListProduct').length) {
        $('#imageUploadListProduct').imageuploadify();
        $('.imageuploadify').css('max-width', '100%');
    }

    //format price
    if ($("#priceProduct[data-type='currency']").length) {
        $("#priceProduct[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });
    }

    function formatNumber(n) {
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }

    function formatCurrency(input, blur) {
        var input_val = input.val();
        if (input_val === "") { return; }
        var original_len = input_val.length;
        var caret_pos = input.prop("selectionStart");
        if (input_val.indexOf(".") >= 0) {
            var decimal_pos = input_val.indexOf(".");
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);
            left_side = formatNumber(left_side);
            right_side = formatNumber(right_side);
            if (blur === "blur") {
                right_side += "00";
            }
            right_side = right_side.substring(0, 2);
            input_val = left_side + "." + right_side + " VND";
        } else {
            input_val = formatNumber(input_val);
            input_val = input_val + " VND";
        }
        input.val(input_val);
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
    //end format price

    //append product details
    if ($('.append-detail-product').length) {
        var appendHtml = $('.append-detail-product');
        var counter = appendHtml.length;
        $('#changeAppendDetailProduct').on('click', function () {
            var clonedItem = appendHtml.first().clone(true);
            clonedItem.insertBefore('#appenDetailProduct');

            clonedItem.find('input, select, img').each(function () {
                var currentId = $(this).attr('id');
                if (currentId) {
                    var newId = currentId.replace(/\d+$/, '') + counter;
                    $(this).attr('id', newId);
                }
            });

            clonedItem.find('label').each(function () {
                var currentFor = $(this).attr('for');
                if (currentFor) {
                    var newFor = currentFor.replace(/\d+$/, '') + counter;
                    $(this).attr('for', newFor);
                }
            });
        });
    }
})
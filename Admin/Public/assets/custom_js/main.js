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
        } else if (attr == 'size') {
            $('.append-input').html(htmlSize)
        } else {
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
    // if ($('#imageUploadListProduct').length) {
    //     $('#imageUploadListProduct[type="file"]').imageuploadify();
    //     $('.imageuploadify').css('max-width', '100%');
    // }
    if ($('.add-image-product').length) {
        var imageProductItem = $('.image-product-item');
        var counter = 1;
        $('.add-image-product').on('click', function () {
            console.log(counter)
            var cloneItem = imageProductItem.first().clone(true);
            cloneItem.insertBefore('.image-product-item-append');
            cloneItem.find('img').each(function () {
                $(this).attr('src', 'assets/images/no_image.jpg');
            });
            cloneItem.find('input, label, img').each(function () {
                var id = $(this).attr('id');
                var for_label = $(this).attr('for');
                $(this).val('')
                if (id) {
                    var newId = id.replace(/\d+$/, '') + counter;
                    $(this).attr('id', newId);
                }
                if (for_label) {
                    var newFor = for_label.replace(/\d+$/, '') + counter;
                    $(this).attr('for', newFor);
                }
            });
            counter++;
        })
    }
    function previewImage(input, $image) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $image.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on('click', '.btn-remove-image-item', function () {
        if (!$('.btn-remove-item-list-image').length) {
            $(this).closest('.image-product-item').remove();
        }
    })

    $('.btn-remove-item-list-image').on('click', function () {
        var _this = $(this);
        var id = _this.attr('data-id');
        $.confirm({
            theme: 'bootstrap',
            title: 'Confirm delete!',
            content: 'Simple confirm!',
            buttons: {
                delete: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function () {
                        $.ajax({
                            url: 'index.php?action=products&process=delete_list_image_item',
                            method: 'POST',
                            data: { id: id },
                            success: (function () {
                                _this.closest('.image-product-item').remove();
                            })
                        })
                    }
                },
                cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-secondary',
                }
            }
        });
    })

    $(document).on('change', '.change-image-product', function () {
        var $image = $(this).next().find('img');
        previewImage(this, $image);
    });

    //format price
    if ($("#priceProduct[data-type='currency']").length) {
        $("#priceProduct[data-type='currency']").on({
            keyup: function () {
                formatCurrency($(this));
            },
            blur: function () {
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
        $(document).on('click', '.btn-close-append-detail-product', function () {
            if (!$('.btn-delete-detail-product').length) {
                $(this).closest('.append-detail-product').remove();
            }
        })
        $('#changeAppendDetailProduct').on('click', function () {
            var clonedItem = appendHtml.first().clone(true);
            clonedItem.insertBefore('#appenDetailProduct');

            clonedItem.find('input, select, img').each(function () {
                var currentId = $(this).attr('id');
                $(this).val('')
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

    if ($('.btn-delete-detail-product').length) {
        $('.btn-delete-detail-product').on('click', function () {
            var _this = $(this);
            var id = _this.attr('data-id');
            $.confirm({
                theme: 'bootstrap',
                title: 'Confirm delete!',
                content: 'Simple confirm!',
                buttons: {
                    delete: {
                        text: 'Delete',
                        btnClass: 'btn-danger',
                        action: function () {
                            $.ajax({
                                url: 'index.php?action=products&process=delete_item_detail',
                                method: 'POST',
                                data: { id: id },
                                success: (function (response) {
                                    _this.closest('.append-detail-product').remove();
                                })
                            })
                        }
                    },
                    cancel: {
                        text: 'Cancel',
                        btnClass: 'btn-secondary',
                    }
                }
            });
        })
    }

    if ($('.datepicker_product_sale').length) {
        $('.datepicker_product_sale').pickadate({
            selectMonths: true,
            selectYears: true
        })
    }
    
    if ($('#productSale').length) {
        let html = $('.clone-item-time-sale').clone()
        $('#productSale').on('change', function() {
            if ($(this).prop('checked')) {
                $('.time-sale').append(html)
            }else {
                $('.time-sale').children('.clone-item-time-sale').remove()
            }
        })
        if ($('#productSale').prop('checked')) {
            $('.time-sale').append(html)
        }else {
            $('.time-sale').children('.clone-item-time-sale').remove()
        }
    }
})
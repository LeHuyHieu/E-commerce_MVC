function changeGetColorId(id) {
    $('#color_id').val(id);
}

$(document).ready(function() {
    // change color product
    $(document).on('click', '.change-image-product', function() {
        var _this = $(this);
        let urlChange = _this.attr('src');
        let id = _this.attr('data-id-product');
        $(`.show-image-product${id}`).attr('src', urlChange);
        $('.change-image-product').removeClass('active');
        _this.addClass('active');
        var price = _this.attr('data-price-image');
        $('#showPrice'+id).html(price + ' VND');
    });

    $('.btn__filter').click(function() {
        $('.sidebar-categores-box').toggleClass('active');
    })
});
window.addEventListener("load",function(){
    var load = document.querySelector('.spinner');
    load.style.display = 'none';
});
 
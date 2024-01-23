function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        if (params_arr.length) rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}
function handleLazyLoad () {
    document.querySelectorAll('img[data-src]').forEach(img => {
        img.setAttribute('src', img.getAttribute('data-src'));
    });
}
function loadModalView() {
    $('.product-details-images').each(function(){
        var $this = $(this);
        var $thumb = $this.siblings('.product-details-thumbs, .tab-style-left');
        $this.slick({
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            centerMode: false,
            centerPadding: 0,
            asNavFor: $thumb,
        });
    });
    $('.product-details-thumbs').each(function(){
        var $this = $(this);
        var $details = $this.siblings('.product-details-images');
        $this.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            focusOnSelect: true,
            centerMode: true,
            centerPadding: 0,
            prevArrow: '<span class="slick-prev"><i class="fa fa-angle-left"></i></span>',
            nextArrow: '<span class="slick-next"><i class="fa fa-angle-right"></i></span>',
            asNavFor: $details,
        });
    });
    // handleLazyLoad()
}
function handleFilterChange(filterId, itemClass, dataKey) {
    let data = {};
    let arrCategory = [];
    let arrSize = [];
    let arrColor = [];
    
    $(document).on('change', filterId, function() {
        arrCategory = [];
        arrSize = [];
        arrColor = [];
        let currentURL = window.location.href;
        for (let i = 0; i < itemClass.length; i++) {
            if (itemClass[i] === '.getCategoryItem') {
                $(itemClass[i] + ':checked').each(function() {
                    var value = $(this).val();
                    if (!arrCategory.includes(value)) {
                        arrCategory.push(value);
                    }
                });
                data[dataKey[i].category] = arrCategory.join(',');
            }
            if (itemClass[i] === '.getSizeItem') {
                $(itemClass[i] + ':checked').each(function() {
                    var value = $(this).val();
                    if (!arrSize.includes(value)) {
                        arrSize.push(value);
                    }
                });
                data[dataKey[i].size] = arrSize.join(',');
            }
            if (itemClass[i] === '.getColorItem') {
                $(itemClass[i] + ':checked').each(function() {
                    var value = $(this).val();
                    if (!arrColor.includes(value)) {
                        arrColor.push(value);
                    }
                });
                data[dataKey[i].color] = arrColor.join(',');
            }
            if (itemClass[i] === '#sortByAjax') {
                let check = $(filterId).val();
                switch (check) {
                    case 'name_az':
                        data['condition'] = 'title';
                        data['orderby'] = 'ASC';
                        break;
                    case 'name_za':
                        data['condition'] = 'title';
                        data['orderby'] = 'DESC';
                        break;
                    case 'name_id':
                        data['condition'] = 'id';
                        data['orderby'] = 'DESC';
                        break;
                    case 'price_desc':
                        data['condition'] = 'price';
                        data['orderby'] = 'ASC';
                        break;
                    case 'rating':
                        data['condition'] = 'rating';
                        data['orderby'] = 'DESC';
                        break;
                
                    default:
                        data['condition'] = 'id';
                        data['orderby'] = 'DESC';
                        break;
                }
            }
            if ($(itemClass[i] + ':checked').length > 0) {
                currentURL = removeParam("page", currentURL);
            }
        }
       
        $.ajax({
            url: currentURL,
            method: 'GET',
            data: data,
            success: function(response) {
                var $responseHtml = $(response);
                var dataListProduct = $responseHtml.find('#dataListProduct').html();
                $('#dataListProduct').html(dataListProduct);
                loadModalView();
                // handleLazyLoad();
                for (const key in data) {
                    currentURL = removeParam(key, currentURL);
                }
                window.history.pushState('', '', currentURL + '&arr_category_id=' + data['arr_category_id'] + '&arr_size_id=' + data['arr_size_id'] + '&arr_color_id=' + data['arr_color_id'] + '&condition=' + data['condition'] + '&orderby=' + data['orderby']);
            }
        });
    });
}

//get localStorage list layout and grid layout
function handleViewClick(viewType, removeType) {
    $(document).on('click', `a[aria-controls="${viewType}"]`, function() {
        let data = {};
        if(viewType == 'list-view') {
            data = {view: 'list-view'};
        }else {
            data = {view: 'grid-view'};
        }
        $.ajax({
            url: window.location.href,
            method: 'GET',
            data: data,
            success: function(response) {
                // handleLazyLoad()
                var history_url = removeParam('view', window.location.href);
                window.history.pushState('', '', history_url + '&view=' + data.view);
            },
            error: function(xhr, status, error) {}
        })
        $(`a[aria-controls="${viewType}"],#${viewType}`).addClass('active show');
        $(`a[aria-controls="${removeType}"],#${removeType}`).removeClass('active show');
    });
}

$(document).ready(function() {
    //clear all input checked
    if($('#clearAllInput').length) {
        $('#clearAllInput').on('click', function() {
            $('.getCategoryItem').prop('checked', false);
            $('.getSizeItem').prop('checked', false);
            $('.getColorItem').prop('checked', false);
            var data = ['arr_category_id', 'arr_size_id', 'arr_color_id', 'condition', 'orderby'];
            var currentURL = window.location.href;
            for (value of data) {
                currentURL = removeParam(value, currentURL);
            }
            window.history.pushState('', '', currentURL);
            $.ajax({
                url: currentURL,
                method: 'GET',
                data: '',
                success: function(response) {
                    var $responseHtml = $(response);
                    var newContentCol = $responseHtml.find('.showListProductCol').html();
                    var newContentRow = $responseHtml.find('.showListProductRow').html();
                    var pagination = $responseHtml.find('.paginatoin-area').html();
                    var newModal = $responseHtml.find('.list_modal').html();
                    $('.showListProductCol').html(newContentCol);
                    $('.showListProductRow').html(newContentRow);
                    $('.paginatoin-area').html(pagination);
                    $('.list_modal').html(newModal);
                    loadModalView();
                },
                error: function(xhr, status, error) {
                  console.error(error);
                }
            })
        })
    }

    //filter list product
    if ($('#sortByAjax').length) {
        handleFilterChange('#sortByAjax', ['.getCategoryItem','.getSizeItem','.getColorItem','#sortByAjax'], [{category:'arr_category_id'}, {size:'arr_size_id'}, {color:'arr_color_id'}]);
    }

    if ($('#filterCategoryId').length) {
        handleFilterChange('.getCategoryItem', ['.getCategoryItem','.getSizeItem','.getColorItem','#sortByAjax'], [{category:'arr_category_id'}, {size:'arr_size_id'}, {color:'arr_color_id'}]);
    }

    if ($('#filterSizeId').length) {
        handleFilterChange('.getSizeItem', ['.getCategoryItem','.getSizeItem','.getColorItem','#sortByAjax'], [{category:'arr_category_id'}, {size:'arr_size_id'}, {color:'arr_color_id'}]);
    }

    if ($('#filterColorId').length) {
        handleFilterChange('.getColorItem', ['.getCategoryItem','.getSizeItem','.getColorItem','#sortByAjax'], [{category:'arr_category_id'}, {size:'arr_size_id'}, {color:'arr_color_id'}]);
    }
    
    //view layout
    if ($('a[aria-controls="list-view"]').length) {
        handleViewClick('list-view', 'grid-view');
    }
    
    if ($('a[aria-controls="grid-view"]').length) {
        handleViewClick('grid-view', 'list-view');
    }
});
<?php
$list_sp = new ListProduct();
$pages = new Page();
$comment_db = new Comment();
//get parameters
$where = isset($_GET['where']) ? $_GET['where'] : '';
$curent_page = isset($_GET['page']) ? $_GET['page'] : 1;
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'DESC';
$condition = isset($_GET['condition']) ? $_GET['condition'] : 'id';
$limit = 12;
$start = $pages->findStart($limit);
$title = isset($_GET['title']) ? $_GET['title'] : '';

$data = [
    'where' => $where,
    'start' => $start,
    'limit' => $limit,
    'orderby' => $orderBy,
    'condition' => $condition,
    'title' => $title,
];
$list_query = $list_sp->listProducts($data);
$count = $list_query['count'];
$page = $pages->findPage($count, $limit);
$result = $list_query['list_products']->fetchAll();
$list_categories_filter = $list_query['categories']->fetchAll();

function replaceColor($color)
{
    $result = '';
    switch ($color) {
        case 'Xám':
            $result = 'gray';
            break;
        case 'Đen':
            $result = 'black';
            break;
        case 'Hồng':
            $result = 'pink';
            break;
        case 'Xanh dương':
            $result = 'Blue';
            break;
        case 'Xanh lá':
            $result = 'green';
            break;
        case 'Vàng':
            $result = 'yellow';
            break;
        case 'Cam':
            $result = 'Orange';
            break;
        case 'Tím':
            $result = 'violet';
            break;
        case 'Đỏ':
            $result = 'red';
            break;
        case 'Trắng':
            $result = 'white';
            break;
        default:
            $result = 'gray';
            break;
    }
    return $result;
}
?>

<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Shop Left Sidebar</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60 pt-sm-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="./public/images/bg-banner/2.jpg" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="<?php echo (isset($_COOKIE['view']) && $_COOKIE['view'] == 'grid-view') ? 'active show' : ' ' ?>" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li role="presentation"><a data-toggle="tab" class="<?php echo (isset($_COOKIE['view']) && $_COOKIE['view'] == 'list-view') ? 'active show' : '' ?>" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                        <div class="toolbar-amount">
                            <span>Showing <?php echo $start . '-' . $count . ' of ' . $list_query['list_products']->rowCount() . ' item(s)'; ?></span>
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select" id="sortByAjax">
                                <option value="name_id">Relevance</option>
                                <option value="name_az">Name (A - Z)</option>
                                <option value="name_za">Name (Z - A)</option>
                                <!-- <option value="price_desc">Price (Low &gt; High)</option>
                                <option value="rating">Rating (Lowest)</option> -->
                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade <?php echo (isset($_COOKIE['view']) && $_COOKIE['view'] == 'grid-view') ? 'active show' : '' ?>" role="tabpanel">
                            <div class="product-area shop-product-area my-5">
                                <div class="row showListProductCol">
                                    <?php
                                    foreach ($result as $item) {
                                        $list_color = $list_sp->getColorProduct($item['id'])->fetchAll();
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 col-12 mb-40">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <form action="index.php?action=cart&handel=cart_process" method="post">
                                                    <input type="hidden" name="product_id" id="dataPostProductId<?php echo $item['id'];?>" value="<?php echo $item['id'];?>">
                                                    <input type="hidden" name="color_id" id="dataPostColorId<?php echo $item['id'];?>" value="<?php echo $list_color[0]['color_id'];?>">
                                                    <input type="hidden" name="size_id" id="dataPostSizeId<?php echo $item['id'];?>" value="<?php echo $list_color[0]['size_id'];?>">
                                                    <div class="product-image">
                                                        <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                                            <img data-src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload" alt="Li's Product Image">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">

                                                                </h5>
                                                                <div class="rating-box pb-5">
                                                                    <?php 
                                                                    $rating_comment = $comment_db->ratingProduct($item['id']);
                                                                    $stat = 0;
                                                                    $stat = ($rating_comment['rating'] == '') ? 5 : $rating_comment['rating'];
                                                                    ?>
                                                                    <ul class="rating rating-with-review-item">
                                                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                                            <li class="<?php echo ($stat < $i) ? 'no-star' : '';?>"><i class="fa fa-star-o"></i></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name mb-15" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                                            <?php if (isset($item['discountPercent'])) { ?>
                                                                <div class="featured-price-box">
                                                                    <span class="new-price new-price-2"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100);?></span>
                                                                    <span class="old-price" style="text-decoration: line-through;"><?php echo  number_format($list_color[0]['price']);?> VND</span>
                                                                    <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="featured-price-box">
                                                                    <span class="new-price new-price-2"> <?php echo  number_format($list_color[0]['price']);?> VND</span>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart active"><button type="submit" name="submit" class="btn btn-add-to-cart text-dark p-1" style="background: transparent;">Add to cart</button></li>
                                                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id']?>"><i class="fa fa-eye"></i></a></li>
                                                                <li><a class="links-details" href=""><i class="fa fa-heart-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    <?php }; ?>
                                </div>
                            </div>
                        </div>
                        <div id="list-view" class="tab-pane fade product-list-view <?php echo (isset($_COOKIE['view']) && $_COOKIE['view'] == 'list-view') ? 'active show' : '' ?>" role="tabpanel">
                            <div class="row">
                                <div class="col showListProductRow">
                                    <?php
                                    foreach ($result as $item) {
                                        $list_color = $list_sp->getColorProduct($item['id'])->fetchAll();
                                    ?>
                                        <form action="index.php?action=cart&handel=cart_process" method="post">
                                            <div class="row product-layout-list pb-10">
                                                <input type="hidden" name="product_id" id="dataPostProductId<?php echo $item['id'];?>" value="<?php echo $item['id'];?>">
                                                <input type="hidden" name="color_id" id="dataPostColorId<?php echo $item['id'];?>" value="<?php echo $list_color[0]['color_id'];?>">
                                                <input type="hidden" name="size_id" id="dataPostSizeId<?php echo $item['id'];?>" value="<?php echo $list_color[0]['size_id'];?>">
                                                <div class="col-lg-3 col-md-5 col-sm-5 col-xs-12 col-12">
                                                    <div class="product-image">
                                                        <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                                            <img data-src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload" alt="Li's Product Image">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-7 col-sm-7 col-xs-12 col-12">
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">

                                                                </h5>
                                                                <div class="rating-box pb-5">
                                                                    <?php 
                                                                    $rating_comment = $comment_db->ratingProduct($item['id']);
                                                                    $stat = 0;
                                                                    $stat = ($rating_comment['rating'] == '') ? 5 : $rating_comment['rating'];
                                                                    ?>
                                                                    <ul class="rating rating-with-review-item">
                                                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                                            <li class="<?php echo ($stat < $i) ? 'no-star' : '';?>"><i class="fa fa-star-o"></i></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name mb-15" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                                            <div class="price-box">
                                                                <?php if (isset($item['discountPercent'])) { ?>
                                                                    <span class="new-price new-price-2"><?php echo number_format($list_color[0]['price'] - ($list_color[0]['price'] * ($item['discountPercent'] / 100))); ?></span>
                                                                    <span class="old-price"><?php echo number_format($list_color[0]['price']); ?> VND</span>
                                                                    <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                                                <?php } else { ?>
                                                                    <span class="new-price new-price-2"><?php echo number_format($list_color[0]['price']); ?> VND</span>
                                                                <?php } ?>
                                                            </div>
                                                            <p style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;"><?php echo $item['description']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 col-12">
                                                    <div class="shop-add-action mb-xs-30">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><button type="submit" name="submit" class="btn btn-add-to-cart text-dark p-1" style="background: transparent;">Add to cart</button></li>
                                                            <li class="wishlist"><a href=""><i class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id'] ?>" href="javascript:void(0)"><i class="fa fa-eye"></i>Quick view</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php }; ?>
                                </div>
                            </div>
                        </div>
                        <div class="list_modal">
                            <?php 
                                foreach ($result as $item) { 
                                    $list_color = $list_sp->getColorProduct($item['id'])->fetchAll();
                                    $images = $list_sp->getImageProduct($item['id'])->fetchAll();
                            ?>
                                 <!-- Begin Quick View | Modal Area -->
                                 <div class="modal fade modal-wrapper" id="exampleModalCenter<?php echo $item['id'] ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                                        <!-- Product Details Left -->
                                                        <div class="product-details-left">
                                                            <div class="product-details-images slider-navigation-1">
                                                                <?php 
                                                                    foreach ($list_color as $key => $image_item) {
                                                                    if($key != 0) {
                                                                ?>
                                                                    <div class="lg-image">
                                                                        <img data-src="./Public/images/uploads/<?php echo $image_item['image_product'];?>" alt="product image">
                                                                    </div>
                                                                <?php }else { ?> 
                                                                    <div class="lg-image">
                                                                        <img data-src="./Public/images/uploads/<?php echo $list_color[0]['image_product'];?>" class="show-image-product<?php echo $item['id'];?>" alt="product image">
                                                                    </div>
                                                                <?php } } ?>
                                                                <?php foreach ($images as $key => $image_item) { ?>
                                                                    <div class="lg-image">
                                                                        <img data-src="./Public/images/uploads/<?php echo $image_item['image'];?>" alt="product image">
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="product-details-thumbs slider-thumbs-1">
                                                                <?php foreach ($list_color as $key => $image_item) { ?>
                                                                    <div class="sm-image"><img data-src="./Public/images/uploads/<?php echo $image_item['image_product'];?>" alt="product image thumb"></div>
                                                                <?php } ?>
                                                                <?php foreach ($images as $key => $image_item) { ?>
                                                                    <div class="sm-image"><img data-src="./Public/images/uploads/<?php echo $image_item['image'];?>" alt="product image thumb"></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <!--// Product Details Left -->
                                                    </div>

                                                    <div class="col-lg-7 col-md-6 col-sm-6">
                                                        <div class="product-details-view-content pt-60">
                                                            <div class="product-info">
                                                                <h2 class="mb-5"><?php echo $item['title']; ?></h2>
                                                                <div class="rating-box pt-20">
                                                                    <?php 
                                                                    $rating_comment = $comment_db->ratingProduct($item['id']);
                                                                    $stat = 0;
                                                                    $stat = ($rating_comment['rating'] == '') ? 5 : $rating_comment['rating'];
                                                                    ?>
                                                                    <ul class="rating rating-with-review-item">
                                                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                                            <li class="<?php echo ($stat < $i) ? 'no-star' : '';?>"><i class="fa fa-star-o"></i></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                                <div class="price-box pt-20">
                                                                    <?php if (isset($item['discountPercent'])) { ?>
                                                                        <span class="new-price new-price-2" id="showPrice<?php echo $item['id'];?>"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100);?> VND</span>
                                                                    <?php }else { ?>
                                                                        <span class="new-price new-price-2" id="showPrice<?php echo $item['id'];?>"><?php echo  number_format($list_color[0]['price']);?> VND</span>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="product-desc">
                                                                    <p>
                                                                        <span><?php echo $item['description']; ?></span>
                                                                    </p>
                                                                </div>
                                                                <div class="product-variants">
                                                                    <?php
                                                                        if(count($list_color) > 0) {
                                                                    ?>
                                                                        <div class="produt-variants-size color-product">
                                                                            <label>Color</label>
                                                                            <?php 
                                                                                foreach($list_color as $key => $color_image) {
                                                                                    if ($item['discountPercent'] != 0) {
                                                                            ?>
                                                                                <span class="color-product-image">
                                                                                    <img width="50px" 
                                                                                        onclick="changeGetColorId(<?php echo $color_image['color_id'];?>)" 
                                                                                        data-src="./Public/images/uploads/<?php echo $color_image['image_product'];?>" 
                                                                                        data-size-id="<?php echo $color_image['size_id'];?>" 
                                                                                        data-color-id="<?php echo $color_image['color_id'];?>" 
                                                                                        data-discount-percent="<?php echo $item['discountPercent'];?>"
                                                                                        data-id-product="<?php echo $item['id'];?>" 
                                                                                        data-price-image="<?php echo number_format($color_image['price'] - ($color_image['price'] * $item['discountPercent']) / 100);?>" 
                                                                                        class="change-image-product <?php echo ($key == 0) ? 'product-active active' : '';?>" 
                                                                                    alt="">
                                                                                </span>
                                                                            <?php } else { ?>
                                                                                <span class="color-product-image">
                                                                                    <img width="50px" 
                                                                                        onclick="changeGetColorId(<?php echo $color_image['color_id'];?>)" 
                                                                                        data-src="./Public/images/uploads/<?php echo $color_image['image_product'];?>" 
                                                                                        data-size-id="<?php echo $color_image['size_id'];?>" 
                                                                                        data-color-id="<?php echo $color_image['color_id'];?>" 
                                                                                        data-id-product="<?php echo $item['id'];?>" 
                                                                                        data-price-image="<?php echo number_format($color_image['price']);?>" 
                                                                                        class="change-image-product <?php echo ($key == 0) ? 'product-active active' : '';?>" 
                                                                                    alt="">
                                                                                </span>
                                                                            <?php } } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php 
                                                                    $list_size = $list_sp->getSizeChangeColor($list_color[0]['color_id'],$item['id'])->fetchAll();
                                                                        if(count($list_size) > 0 && $list_size[0]['size_id'] !== 1) {
                                                                    ?>
                                                                        <div class="produt-variants-size">
                                                                            <label>Dimension</label>
                                                                            <select class="list_size" name="size_id" id="selectSizeId<?php echo $item['id'];?>">
                                                                                <?php
                                                                                foreach ($list_size as $size) {
                                                                                    if (!isset($item['discountPercent']) && $item['discountPercent'] == 0) {
                                                                                ?>
                                                                                    <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id'];?>" data-price-size="<?php echo number_format($size['price']);?>" data-color-id="<?php echo $list_color[0]['color_id'];?>"><?php echo $size['name']; ?></option>
                                                                                <?php }else  { ?>
                                                                                    <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id'];?>" data-price-size="<?php echo number_format($size['price'] - ($size['price'] * $item['discountPercent']) / 100);?>" data-color-id="<?php echo $list_color[0]['color_id'];?>"><?php echo $size['name']; ?></option>
                                                                                <?php } } ?>
                                                                            </select>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="single-add-to-cart">
                                                                    <form action="index.php?action=cart&handel=cart_process" method="post" class="cart-quantity">
                                                                        <input type="hidden" name="product_id" id="dataPostProductIdView<?php echo $item['id'];?>" value="<?php echo $item['id'];?>">
                                                                        <input type="hidden" name="color_id" id="dataPostColorIdView<?php echo $item['id'];?>" value="<?php echo $list_color[0]['color_id'];?>">
                                                                        <input type="hidden" name="size_id" id="dataPostSizeIdView<?php echo $item['id'];?>" value="<?php echo $list_color[0]['size_id'];?>">
                                                                        <div class="quantity">
                                                                            <label>Quantity</label>
                                                                            <div class="cart-plus-minus">
                                                                                <input class="cart-plus-minus-box" value="1" name="quantity" type="text">
                                                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                                            </div>
                                                                        </div>
                                                                        <button class="add-to-cart btn-add-to-cart" name="submit" type="submit">Add to cart</button>
                                                                    </form>
                                                                </div>
                                                                <div class="product-additional-info pt-25">
                                                                    <a class="wishlist-btn" href=""><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                                                    <div class="product-social-sharing pt-25">
                                                                        <ul>
                                                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quick View | Modal Area End Here -->
                            <?php } ?>
                        </div>
                        <div id="showPagination">
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 pt-xs-15">
                                        <p>Showing <?php echo $start . '-' . $count . ' of ' . $list_query['list_products']->rowCount() . ' item(s)'; ?></p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box pt-xs-20 pb-xs-15">
                                            <?php
                                            if ($curent_page > 1 && $page > 1) {
                                                $prevPageParams = $_GET;
                                                $prevPageParams['page'] = $curent_page - 1;
                                                $prevPageURL = '?' . http_build_query($prevPageParams);
                                            ?>
                                                <li><a href="<?php echo $prevPageURL; ?>" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a></li>
                                            <?php } else { ?>
                                                <li><a href="javascript:void(0)" class="Previous disabled"><i class="fa fa-chevron-left"></i> Previous</a></li>
                                            <?php } ?>

                                            <?php 
                                                for ($i = 1; $i <= $page; $i++) {
                                                $currentPageParams = $_GET;
                                                $currentPageParams['page'] = $i;
                                                $currentPageURL = '?' . http_build_query($currentPageParams);
                                                if ($i <= $curent_page + 2 && $i >= $curent_page - 2) { 
                                            ?>
                                                    <li class="<?php echo ($i == $curent_page) ? 'active' : '';?>"><a href="<?php echo $currentPageURL; ?>"><?php echo $i;?></a></li>
                                            <?php 
                                                    } 
                                                } 
                                            if ($curent_page < $page && $page > 1) {
                                                $nextPageParams = $_GET;
                                                $nextPageParams['page'] = $curent_page + 1;
                                                $nextPageURL = '?' . http_build_query($nextPageParams);
                                            ?>
                                                <li><a href="<?php echo $nextPageURL; ?>" class="Next"> Next <i class="fa fa-chevron-right"></i></a></li>
                                            <?php } else { ?>
                                                <li><a href="javascript:void(0)" class="Next"> Next <i class="fa fa-chevron-right"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <button class="btn btn__filter"><i class="fa fa-filter"></i></button>
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Filter By</h2>
                    </div>
                    <button class="btn-clear-all mb-sm-30 mb-xs-30" id="clearAllInput">Clear all</button>
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Categories</h5>
                        <div class="categori-checkbox" id="filterCategoryId">
                            <ul>
                                <?php
                                foreach ($list_categories_filter as $key => $item) {
                                ?>
                                    <li>
                                        <label for="category_<?php echo $item['id_category'];?>">
                                            <input type="checkbox" value="<?php echo $item['id_category']; ?>" class="getCategoryItem" id="category_<?php echo $item['id_category']; ?>" name="product-categori">
                                            <span class="ml-5"><?php echo $item['categoryName']; ?></span>
                                        </label>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Dimension</h5>
                        <div class="size-checkbox" id="filterSizeId">
                            <ul>
                                <?php
                                $list_size = $list_sp->getSize();
                                while ($size = $list_size->fetch()) :
                                ?>
                                    <li>
                                        <label for="size_<?php echo $size['size_id']; ?>">
                                            <input type="checkbox" value="<?php echo $size['size_id']; ?>" class="getSizeItem" id="size_<?php echo $size['size_id']; ?>" name="product-size">
                                            <span class="ml-5"><?php echo $size['size_name']; ?></span>
                                        </label>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Color</h5>
                        <div class="color-categoriy" id="filterColorId">
                            <ul>
                                <?php
                                $list_color_all = $list_sp->getColor();
                                while ($color = $list_color_all->fetch()) :
                                ?>
                                    <li class="align-items-center">
                                        <input type="checkbox" value="<?php echo $color['color_id']; ?>" class="getColorItem form-check d-inline-block" id="color<?php echo $color['color_id']; ?>" name="product-color" style="height: 13px;width: 13px;">
                                        <label for="color<?php echo $color['color_id']; ?>" class="d-inline-flex align-items-center mb-0">
                                            <span class="<?php echo replaceColor($color['color_name']); ?> ml-5 mt-0"></span>
                                            <a class="ml-10" data-color-id="<?php echo $color['color_id']; ?>"><?php echo $color['color_name']; ?></a>
                                        </label>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->
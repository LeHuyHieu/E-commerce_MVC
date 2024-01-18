<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <?php 
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $detail_product = new DetailProduct();
        $list_product = new ListProduct();
        $list_comments = new Comment();

        $get_detail_product = $detail_product->getDetailProduct($id);
        $category_id = $get_detail_product['category_id'];
        $list_size = $list_product->getSizeProduct($id)->fetchAll();
        $list_color = $list_product->getColorProduct($id)->fetchAll();
        $list_images = $list_product->getImageProduct($id)->fetchAll();
        ?>
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <?php 
                            foreach ($list_color as $key => $image_item) {
                            if($key != 0) {
                        ?>
                            <div class="lg-image">
                                <img src="./Public/images/uploads/<?php echo $image_item['image_product'];?>" alt="product image">
                            </div>
                        <?php }else { ?> 
                            <div class="lg-image">
                                <img src="./Public/images/uploads/<?php echo $list_color[0]['image_product'];?>" class="show-image-product<?php echo $get_detail_product['id'];?>" alt="product image">
                            </div>
                        <?php } } ?>
                        <?php foreach ($list_images as $key => $image_item) { ?>
                            <div class="lg-image">
                                <img src="./Public/images/uploads/<?php echo $image_item['image'];?>" alt="product image">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1">
                        <?php foreach ($list_color as $key => $image_item) { ?>
                            <div class="sm-image"><img src="./Public/images/uploads/<?php echo $image_item['image_product'];?>" alt="product image thumb"></div>
                        <?php } ?>
                        <?php foreach ($list_images as $key => $image_item) { ?>
                            <div class="sm-image"><img src="./Public/images/uploads/<?php echo $image_item['image'];?>" alt="product image thumb"></div>
                        <?php } ?>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <form action="index.php?action=cart&handel=cart_process" method="post" class="cart-quantity">
                            <h2 class="mb-0"><?php echo $get_detail_product['title'];?></h2>
                            <div class="rating-box pt-20">
                                <?php 
                                $rating_comment = $list_comments->ratingProduct($get_detail_product['id']);
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
                                <?php
                                    if ($get_detail_product['discountPercent'] != 0) {
                                        $discountedPrice = $list_color[0]['price'] - ($list_color[0]['price'] * $get_detail_product['discountPercent']) / 100;
                                        echo '<span class="new-price new-price-2" id="showPrice' . $id . '">' . number_format($discountedPrice) . ' VND</span>';
                                    } else {
                                        echo '<span class="new-price new-price-2" id="showPrice' . $id . '">' . number_format($list_color[0]['price']) . ' VND</span>';
                                    }
                                ?>
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span><?php echo $get_detail_product['description'];?></span>
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
                                                if ($get_detail_product['discountPercent'] != 0) {
                                        ?>
                                            <span class="color-product-image">
                                                <img width="50px" 
                                                    onclick="changeGetColorId(<?php echo $color_image['color_id'];?>)" 
                                                    src="./Public/images/uploads/<?php echo $color_image['image_product'];?>" 
                                                    data-size-id="<?php echo $color_image['size_id'];?>" 
                                                    data-color-id="<?php echo $color_image['color_id'];?>" 
                                                    data-discount-percent="<?php echo $get_detail_product['discountPercent'];?>"
                                                    data-id-product="<?php echo $get_detail_product['id'];?>" 
                                                    data-price-image="<?php echo number_format($color_image['price'] - ($color_image['price'] * $get_detail_product['discountPercent']) / 100);?>" 
                                                    class="change-image-product <?php echo ($key == 0) ? 'product-active active' : '';?>" 
                                                alt="">
                                            </span>
                                        <?php } else { ?>
                                            <span class="color-product-image">
                                                <img width="50px" 
                                                    onclick="changeGetColorId(<?php echo $color_image['color_id'];?>)" 
                                                    src="./Public/images/uploads/<?php echo $color_image['image_product'];?>" 
                                                    data-size-id="<?php echo $color_image['size_id'];?>" 
                                                    data-color-id="<?php echo $color_image['color_id'];?>" 
                                                    data-id-product="<?php echo $get_detail_product['id'];?>" 
                                                    data-price-image="<?php echo number_format($color_image['price']);?>" 
                                                    class="change-image-product <?php echo ($key == 0) ? 'product-active active' : '';?>" 
                                                alt="">
                                            </span>
                                        <?php } } ?>
                                    </div>
                                <?php } ?>
                                <?php 
                                    $list_size = $list_product->getSizeChangeColor($list_color[0]['color_id'],$get_detail_product['id'])->fetchAll();
                                        if(count($list_size) > 0 && $list_size[0]['size_id'] !== 1) {
                                ?>
                                    <div class="produt-variants-size">
                                        <label>Dimension</label>
                                        <select class="list_size" name="size_id" id="selectSizeId<?php echo $get_detail_product['id'];?>">
                                            <?php
                                            foreach ($list_size as $size) {
                                                if (!isset($get_detail_product['discountPercent']) && $get_detail_product['discountPercent'] == 0) {
                                            ?>
                                                <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $get_detail_product['id'];?>" data-price-size="<?php echo number_format($size['price']);?>" data-color-id="<?php echo $list_color[0]['color_id'];?>"><?php echo $size['name']; ?></option>
                                            <?php }else  { ?>
                                                <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $get_detail_product['id'];?>" data-price-size="<?php echo number_format($size['price'] - ($size['price'] * $get_detail_product['discountPercent']) / 100);?>" data-color-id="<?php echo $list_color[0]['color_id'];?>"><?php echo $size['name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="single-add-to-cart">
                                <form action="index.php?action=cart&handel=cart_process" method="post" class="cart-quantity">
                                    <input type="hidden" name="product_id" id="dataPostProductIdView<?php echo $get_detail_product['id'];?>" value="<?php echo $get_detail_product['id'];?>">
                                    <input type="hidden" name="color_id" id="dataPostColorIdView<?php echo $get_detail_product['id'];?>" value="<?php echo $list_color[0]['color_id'];?>">
                                    <input type="hidden" name="size_id" id="dataPostSizeIdView<?php echo $get_detail_product['id'];?>" value="<?php echo $list_color[0]['size_id'];?>">
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" name="quantity" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" name="submit" type="submit">Add to cart</button>
                                </form>
                            </div>
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="index.php?action=wishlist"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Security policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Delivery policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p> Return policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="reviews" class="tab-pane active show" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="list_comment">
                        <?php 
                        $comments = $list_comments->getListComments($id)->fetchAll();
                        if (count($comments) > 0) {
                            foreach ($comments as $comment) {
                                $date = date_create($comment['created_at']);
                        ?>
                            <div class="comment-review border-1 border pl-10 pr-10 py-3 rounded mb-25">
                                <span class="name"><?php echo $comment['fullname'];?></span>
                                <ul class="rating">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <li class="<?php echo ($comment['rating'] < $i) ? 'no-star' : '';?>"><i class="fa fa-star-o"></i></li>
                                    <?php } ?>
                                </ul>
                                <span class="mb-0 float-right" style="font-weight: 400;"><?php echo date_format($date, 'd/m/Y');?></span>
                                <p class="mb-0"><?php echo $comment['comment'];?></p>
                                <?php if (isset($_SESSION['user'])) { ?>
                                    <button class="btn-sm btn float-right replyComment" data-toggle="modal" data-target="#replyCommentModel" data-comment-id="<?php echo $comment['id'];?>">Reply</button>
                                <?php } ?>
                            </div>
                            <?php
                            $reply_comment = $list_comments->getListReplyComments();
                            if($reply_comment->rowCount() > 0) {
                                foreach ($reply_comment as $reply) {
                                    if ($reply['comment_id'] == $comment['id']){
                                    $date = date_create($reply['created_at']);
                            ?>
                                <div class="comment-review border-1 border pl-10 pr-10 py-3 rounded mb-25 ml-auto" style="width: 95%;">
                                    <span class="name"><?php echo $reply['fullname']; ?></span>
                                    <span class="mb-0 float-right" style="font-weight: 400;"><?php echo date_format($date, 'd/m/Y'); ?></span>
                                    <p class="mb-0"><?php echo $reply['comment']; ?></p>
                                    <?php if (isset($_SESSION['user'])) { ?>
                                        <button class="btn-sm btn float-right replyComment" data-toggle="modal" data-target="#replyCommentModel" data-comment-id="<?php echo $comment['id']; ?>">Reply</button>
                                    <?php } ?>
                                </div>
                            <?php } } } ?>
                        <?php
                            }
                        }else {
                        ?>
                            <div class="comment-author-infos pt-25">
                                <span>There are no comments yet</span>
                            </div>
                        <?php } ?>
                        </div>
                        <?php if (!isset($_SESSION['user'])) { ?>
                            <div class="review-btn">
                                <a class="review-links" href="index.php?action=login&next_page=detail_product&id=<?php echo $id;?>">Login to comment</a>
                            </div>
                        <?php } else { ?>
                             <!-- Begin Quick View | Modal Area -->
                             <div class="modal fade modal-wrapper" id="replyCommentModel">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="review-page-title">Reply Comment</h3>
                                            <div class="modal-inner-area row">
                                                <div class="col-12">
                                                    <div class="li-review-content">
                                                        <!-- Begin Feedback Area -->
                                                        <div class="feedback-area">
                                                            <div class="feedback">
                                                                <h3 class="feedback-title">Reply</h3>
                                                                <form id="formReplyComment" method="post" action="index.php?action=comment&handle=reply_comment&product_id=<?php echo $id;?>">
                                                                    <input type="hidden" name="product_id" value="<?php echo isset($id) ? $id : 0;?>">
                                                                    <input type="hidden" name="comment_id" value="" />
                                                                    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0;?>">
                                                                    <p class="feedback-form">
                                                                        <label for="feedback">Your Review</label>
                                                                        <textarea name="comment" cols="45" rows="8" aria-required="true" required></textarea>
                                                                    </p>
                                                                    <div class="feedback-input">
                                                                        <div class="feedback-btn pb-15">
                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                            <button type="submit" name="send_comment" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;"><a>Submit</a></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Feedback Area End Here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Quick View | Modal Area End Here -->
                            <div class="review-btn">
                                <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                            </div>
                            <!-- Begin Quick View | Modal Area -->
                            <div class="modal fade modal-wrapper" id="mymodal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="review-page-title">Write Your Review</h3>
                                            <div class="modal-inner-area row">
                                                <div class="col-lg-6">
                                                    <div class="li-review-product">
                                                        <img src="./Public/images/uploads/<?php echo $list_color[0]['image_product'];?>" class="img-fluid" alt="Li's Product">
                                                        <div class="li-review-product-desc">
                                                            <p class="li-product-name"><b><?php echo $get_detail_product['title'];?></b></p>
                                                            <p>
                                                                <span><?php echo $get_detail_product['description'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="li-review-content">
                                                        <!-- Begin Feedback Area -->
                                                        <div class="feedback-area">
                                                            <div class="feedback">
                                                                <h3 class="feedback-title">Our Feedback</h3>
                                                                <form action="index.php?action=comment&handle=comment_product_detail&product_id<?php echo $id;?>" id="formComment" method="post">
                                                                    <input type="hidden" name="product_id" value="<?php echo isset($id) ? $id : 0;?>">
                                                                    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0;?>">
                                                                    <p class="your-opinion">
                                                                        <label>Your Rating</label>
                                                                        <span>
                                                                            <select name="rating" class="star-rating" required>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                            </select>
                                                                        </span>
                                                                    </p>
                                                                    <p class="feedback-form">
                                                                        <label for="feedback">Your Review</label>
                                                                        <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true" required></textarea>
                                                                    </p>
                                                                    <div class="feedback-input">
                                                                        <div class="feedback-btn pb-15">
                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                            <button type="submit" name="send_comment" data-dismiss="modal" aria-label="Close" style="border: none;background: transparent;"><a>Submit</a></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Feedback Area End Here -->
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<?php 
    $list_product_same_category = $detail_product->getListProductGetCategory($category_id, $id);
?>
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <?php 
                    if($list_product_same_category->rowCount() == 0) {
                ?>
                    <div class="li-section-title">
                        <h2><span>There are no other products of the same type:</span></h2>
                    </div>
                <?php } else { ?>
                    <div class="li-section-title">
                        <h2><span><?php echo $list_product_same_category->rowCount();?> other products in the same category:</span></h2>
                    </div>
                    <div class="row">
                        <?php
                            $result = $list_product_same_category->fetchAll();
                            foreach ($result as $item) {
                                $list_size = $list_product->getSizeProduct($item['id'])->fetchAll();
                                $list_color = $list_product->getColorProduct($item['id'])->fetchAll();
                                $images = $list_product->getImageProduct($item['id'])->fetchAll();
                        ?>
                        <div class="col-lg-3 mb-30">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <form action="index.php?action=cart&handel=cart_process" method="post">
                                    <input type="hidden" name="product_id" id="dataPostProductId<?php echo $item['id'];?>" value="<?php echo $item['id'];?>">
                                    <input type="hidden" name="color_id" id="dataPostColorId<?php echo $item['id'];?>" value="<?php echo $list_color[0]['color_id'];?>">
                                    <input type="hidden" name="size_id" id="dataPostSizeId<?php echo $item['id'];?>" value="<?php echo $list_color[0]['size_id'];?>">
                                    <div class="product-image">
                                        <a href="index.php?action=detail_product&id=<?php echo $item['id']?>">
                                            <img src="./Public/images/uploads/<?php echo $list_color[0]['image_product'];?>" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    
                                                </h5>
                                                <div class="rating-box pb-5">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="index.php?action=detail_product&id=<?php echo $item['id']?>"><?php echo $item['title'];?></a></h4>
                                            <?php if (isset($item['discountPercent'])) { ?>
                                                <div class="featured-price-box">
                                                    <span class="new-price new-price-2"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] / $item['discountPercent']));?></span>
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
                                                            foreach ($images as $key => $image_item) {
                                                            if($key != 0) {
                                                        ?>
                                                            <div class="lg-image">
                                                                <img src="./Public/images/uploads/<?php echo $image_item['image'];?>" alt="product image">
                                                            </div>
                                                        <?php }else { ?> 
                                                            <div class="lg-image">
                                                                <img src="./Public/images/uploads/<?php echo $list_color[0]['image_product'];?>" class="show-image-product<?php echo $item['id'];?>" alt="product image">
                                                            </div>
                                                        <?php } } ?>
                                                        <?php foreach ($list_color as $key => $image_item) { ?>
                                                            <div class="lg-image">
                                                                <img src="./Public/images/uploads/<?php echo $image_item['image_product'];?>" alt="product image">
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="product-details-thumbs slider-thumbs-1">
                                                        <?php foreach ($images as $key => $image_item) { ?>
                                                            <div class="sm-image"><img src="./Public/images/uploads/<?php echo $image_item['image'];?>" alt="product image thumb"></div>
                                                        <?php } ?>
                                                        <?php foreach ($list_color as $key => $image_item) { ?>
                                                            <div class="sm-image"><img src="./Public/images/uploads/<?php echo $image_item['image_product'];?>" alt="product image thumb"></div>
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
                                                            <ul class="rating rating-with-review-item">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box pt-20">
                                                            <?php if (isset($item['discountPercent'])) { ?>
                                                                <span class="new-price new-price-2" id="showPrice<?php echo $item['id'];?>"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] / $item['discountPercent']));?> VND</span>
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
                                                                                src="./Public/images/uploads/<?php echo $color_image['image_product'];?>" 
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
                                                                                src="./Public/images/uploads/<?php echo $color_image['image_product'];?>" 
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
                                                                $list_size = $list_product->getSizeChangeColor($list_color[0]['color_id'],$item['id'])->fetchAll();
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
                                                                            <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id'];?>" data-price-size="<?php echo number_format($size['price'] - ($size['price'] * $get_detail_product['discountPercent']) / 100);?>" data-color-id="<?php echo $list_color[0]['color_id'];?>"><?php echo $size['name']; ?></option>
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
                <?php } ?>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Laptop Product Area End Here -->
<?php 
echo (isset($_GET['data_empty']) && $_GET['data_empty'] == 1) ? alert('Warning', 'Content cannot be empty', 'warning') : '';
?>
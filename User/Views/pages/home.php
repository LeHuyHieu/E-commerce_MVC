 <div class="slider-with-banner">
     <div class="container">
         <div class="row">
             <!-- Begin Category Menu Area -->
             <div class="col-lg-3">
                 <!--Category Menu Start-->
                 <div class="category-menu">
                     <div class="category-heading">
                         <h2 class="categories-toggle"><span>categories</span></h2>
                     </div>
                     <div id="cate-toggle" class="category-menu-list">
                         <ul>
                             <?php
                                $list_categories = new Category();
                                $categories = $list_categories->getCategory()->fetchAll();
                                foreach ($categories as $category) {
                                ?>
                                 <li class="right-menu">
                                     <a href="index.php?action=list_product&where=category&category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                                     <ul class="cat-mega-menu">
                                         <?php
                                            $subCategories = $list_categories->getSubCategory($category['id']);
                                            while ($category2 = $subCategories->fetch()) :
                                            ?>
                                             <li class="right-menu cat-mega-title">
                                                 <a href="index.php?action=list_product&where=category&category_id=<?php echo $category2['id']; ?>"><?php echo $category2['name']; ?></a>
                                                 <ul>
                                                     <?php
                                                        $subCategories2 = $list_categories->getSubCategory($category2['id']);
                                                        while ($category3 = $subCategories2->fetch()) :
                                                        ?>
                                                         <li><a href="index.php?action=list_product&where=category&category_id=<?php echo $category3['id']; ?>"><?php echo $category3['name']; ?></a></li>
                                                     <?php endwhile; ?>
                                                 </ul>
                                             </li>
                                         <?php endwhile; ?>
                                     </ul>
                                 </li>
                             <?php } ?>
                         </ul>
                     </div>
                 </div>
                 <!--Category Menu End-->
             </div>
             <!-- Category Menu Area End Here -->
             <!-- Begin Slider Area -->
             <div class="col-lg-9">
                 <div class="slider-area pt-sm-30 pt-xs-30">
                     <div class="slider-active owl-carousel">
                         <!-- Begin Single Slide Area -->
                         <?php
                            $banner = new Banner();
                            $result = $banner->getBanner();
                            while ($item = $result->fetch()) :
                            ?>
                             <div class="single-slide align-center-left animation-style-02 bg-4" style="background-image: url(./public/images/slider/<?php echo $item['background']; ?>) !important;">
                                 <div class="slider-progress"></div>
                                 <div class="slider-content">
                                     <h5>Sale Offer <span><?php echo $item['event']; ?></span> This Week</h5>
                                     <h2><?php echo $item['title']; ?></h2>
                                     <h3>Starting at <span><?php echo number_format($item['starting_at']); ?> VND</span></h3>
                                     <div class="default-btn slide-btn">
                                         <a class="links" href="index.php?action=list_product">Shopping Now</a>
                                     </div>
                                 </div>
                             </div>
                         <?php endwhile; ?>
                     </div>
                 </div>
             </div>
             <!-- Slider Area End Here -->
         </div>
     </div>
 </div>
 <!-- Slider With Category Menu Area End Here -->
 <!-- Begin Li's Static Banner Area -->
 <div class="li-static-banner pt-20 pt-sm-30">
     <div class="container">
         <div class="row">
             <?php
                foreach ($categories as $key => $category_banner) {
                    if ($key < 3) {
                ?>
                     <!-- Begin Single Banner Area -->
                     <div class="col-lg-4 col-md-4 text-center">
                         <div class="single-banner pb-xs-30">
                             <a href="index.php?action=list_product&where=category&category_id=<?php echo $category_banner['id']; ?>">
                                 <img loading="lazy" src="<?php echo $category_banner['banner_image']; ?>" class="lazyload" alt="Li's Static Banner">
                             </a>
                         </div>
                     </div>
                     <!-- Single Banner Area End Here -->
             <?php }
                } ?>
         </div>
     </div>
 </div>
 <!-- Li's Static Banner Area End Here -->
 <?php
    $comment_db = new Comment();
    $hotProduct = new HotProduct();
    $list_sp_item = new ListProduct();
    $result = $hotProduct->getHotProducts();
    ?>
 <?php
    if ($result->rowCount() > 0) {
    ?>
     <!-- Begin Li's Special Product Area -->
     <section class="product-area li-laptop-product Special-product pt-60 pb-45">
         <div class="container">
             <div class="row">
                 <!-- Begin Li's Section Area -->
                 <div class="col-lg-12">
                     <div class="li-section-title">
                         <h2 class="inline">
                             <span>Hot Deals Products</span>
                         </h2>
                         <a href="index.php?action=list_product&where=hot-deal-product" class="float-right">Xem thêm</a>
                     </div>
                     <div class="row py-3">
                         <?php
                            while ($item = $result->fetch()) :
                                $list_color = $list_sp_item->getColorProduct($item['id'])->fetchAll();
                                $images = $list_sp_item->getImageProduct($item['id'])->fetchAll();
                            ?>
                             <div class="col-lg-3 mb-40">
                                 <!-- single-product-wrap start -->
                                 <div class="single-product-wrap">
                                     <form action="index.php?action=cart&handel=cart_process" method="post">
                                         <input type="hidden" name="product_id" id="dataPostProductId<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>">
                                         <input type="hidden" name="color_id" id="dataPostColorId<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['color_id']; ?>">
                                         <input type="hidden" name="size_id" id="dataPostSizeId<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['size_id']; ?>">
                                         <div class="product-image">
                                             <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                                 <img loading="lazy" src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload" alt="Li's Product Image">
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
                                                                 <li class="<?php echo ($stat < $i) ? 'no-star' : ''; ?>"><i class="fa fa-star-o"></i></li>
                                                             <?php } ?>
                                                         </ul>
                                                     </div>
                                                 </div>
                                                 <h4><a class="product_name mb-15" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                                 <?php if (isset($item['discountPercent'])) { ?>
                                                     <div class="featured-price-box">
                                                         <span class="new-price new-price-2"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100); ?></span>
                                                         <span class="old-price" style="text-decoration: line-through;"><?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                         <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                                     </div>
                                                 <?php } else { ?>
                                                     <div class="featured-price-box">
                                                         <span class="new-price new-price-2"> <?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                     </div>
                                                 <?php } ?>
                                                 <div class="countersection">
                                                     <div class="li-countdown" data-timer="<?php echo $item['productSaleTime']; ?>"></div>
                                                 </div>
                                             </div>
                                             <div class="add-actions">
                                                 <ul class="add-actions-link">
                                                     <li class="add-cart active"><button type="submit" name="submit" class="btn btn-add-to-cart text-dark p-1" style="background: transparent;">Add to cart</button></li>
                                                     <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id'] ?>"><i class="fa fa-eye"></i></a></li>
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
                                                                foreach ($list_color as $key => $image_item) {
                                                                    if ($key != 0) {
                                                                ?>
                                                                     <div class="lg-image">
                                                                         <img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image_product']; ?>" class="lazyload" alt="product image">
                                                                     </div>
                                                                 <?php } else { ?>
                                                                     <div class="lg-image">
                                                                         <img loading="lazy" src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload show-image-product<?php echo $item['id']; ?>" alt="product image">
                                                                     </div>
                                                             <?php }
                                                                } ?>
                                                             <?php foreach ($images as $key => $image_item) { ?>
                                                                 <div class="lg-image">
                                                                     <img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image']; ?>" class="lazyload" alt="product image">
                                                                 </div>
                                                             <?php } ?>
                                                         </div>
                                                         <div class="product-details-thumbs slider-thumbs-1">
                                                             <?php foreach ($list_color as $key => $image_item) { ?>
                                                                 <div class="sm-image"><img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image_product']; ?>" class="lazyload" alt="product image thumb"></div>
                                                             <?php } ?>
                                                             <?php foreach ($images as $key => $image_item) { ?>
                                                                 <div class="sm-image"><img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image']; ?>" class="lazyload" alt="product image thumb"></div>
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
                                                                         <li class="<?php echo ($stat < $i) ? 'no-star' : ''; ?>"><i class="fa fa-star-o"></i></li>
                                                                     <?php } ?>
                                                                 </ul>
                                                             </div>
                                                             <div class="price-box pt-20">
                                                                 <?php if (isset($item['discountPercent'])) { ?>
                                                                     <span class="new-price new-price-2" id="showPrice<?php echo $item['id']; ?>"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100); ?> VND</span>
                                                                 <?php } else { ?>
                                                                     <span class="new-price new-price-2" id="showPrice<?php echo $item['id']; ?>"><?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                                 <?php } ?>
                                                             </div>
                                                             <div class="product-desc">
                                                                 <p>
                                                                     <span><?php echo $item['description']; ?></span>
                                                                 </p>
                                                             </div>
                                                             <div class="product-variants">
                                                                 <?php
                                                                    if (count($list_color) > 0 && $list_color[0]['color_id'] !== 1) {
                                                                    ?>
                                                                     <div class="produt-variants-size color-product">
                                                                         <label>Color</label>
                                                                         <?php
                                                                            foreach ($list_color as $key => $color_image) {
                                                                                if ($item['discountPercent'] != 0) {
                                                                            ?>
                                                                                 <span class="color-product-image">
                                                                                     <img loading="lazy" width="50px" onclick="changeGetColorId(<?php echo $color_image['color_id']; ?>)" src="./Public/images/uploads/<?php echo $color_image['image_product']; ?>" data-size-id="<?php echo $color_image['size_id']; ?>" data-color-id="<?php echo $color_image['color_id']; ?>" data-discount-percent="<?php echo $item['discountPercent']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-image="<?php echo number_format($color_image['price'] - ($color_image['price'] * $item['discountPercent']) / 100); ?>" class="change-image-product lazyload <?php echo ($key == 0) ? 'product-active active' : ''; ?>" alt="">
                                                                                 </span>
                                                                             <?php } else { ?>
                                                                                 <span class="color-product-image">
                                                                                     <img loading="lazy" width="50px" onclick="changeGetColorId(<?php echo $color_image['color_id']; ?>)" src="./Public/images/uploads/<?php echo $color_image['image_product']; ?>" data-size-id="<?php echo $color_image['size_id']; ?>" data-color-id="<?php echo $color_image['color_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-image="<?php echo number_format($color_image['price']); ?>" class="change-image-product lazyload <?php echo ($key == 0) ? 'product-active active' : ''; ?>" alt="">
                                                                                 </span>
                                                                         <?php }
                                                                            } ?>
                                                                     </div>
                                                                 <?php } ?>
                                                                 <?php
                                                                    $list_size = $list_sp_item->getSizeChangeColor($list_color[0]['color_id'], $item['id'])->fetchAll();
                                                                    if (count($list_size) > 0 && $list_size[0]['size_id'] !== 1) {
                                                                    ?>
                                                                     <div class="produt-variants-size">
                                                                         <label>Dimension</label>
                                                                         <select class="list_size" name="size_id" id="selectSizeId<?php echo $item['id']; ?>">
                                                                             <?php
                                                                                foreach ($list_size as $size) {
                                                                                    if (!isset($item['discountPercent']) && $item['discountPercent'] == 0) {
                                                                                ?>
                                                                                     <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-size="<?php echo number_format($size['price']); ?>" data-color-id="<?php echo $list_color[0]['color_id']; ?>"><?php echo $size['name']; ?></option>
                                                                                 <?php } else { ?>
                                                                                     <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-size="<?php echo number_format($size['price'] - ($size['price'] * $item['discountPercent']) / 100); ?>" data-color-id="<?php echo $list_color[0]['color_id']; ?>"><?php echo $size['name']; ?></option>
                                                                             <?php }
                                                                                } ?>
                                                                         </select>
                                                                     </div>
                                                                 <?php } ?>
                                                             </div>
                                                             <div class="single-add-to-cart">
                                                                 <form action="index.php?action=cart&handel=cart_process" method="post" class="cart-quantity">
                                                                     <input type="hidden" name="product_id" id="dataPostProductIdView<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>">
                                                                     <input type="hidden" name="color_id" id="dataPostColorIdView<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['color_id']; ?>">
                                                                     <input type="hidden" name="size_id" id="dataPostSizeIdView<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['size_id']; ?>">
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
                         <?php endwhile; ?>
                     </div>
                 </div>
                 <!-- Li's Section Area End Here -->
             </div>
         </div>
     </section>
 <?php } ?>
 <!-- Li's Special Product Area End Here -->
 <div class="li-static-banner pt-20 pt-sm-30">
     <div class="container">
         <div class="row">
             <?php
                foreach ($categories as $key => $category_banner) {
                    if ($key >= 3 && $key < 6) {
                ?>
                     <!-- Begin Single Banner Area -->
                     <div class="col-lg-4 col-md-4 text-center">
                         <div class="single-banner pb-xs-30">
                             <a href="index.php?action=list_product&where=category&category_id=<?php echo $category_banner['id']; ?>">
                                 <img loading="lazy" src="<?php echo $category_banner['banner_image']; ?>" class="lazyload" alt="Li's Static Banner">
                             </a>
                         </div>
                     </div>
                     <!-- Single Banner Area End Here -->
             <?php }
                } ?>
         </div>
     </div>
 </div>
 <!-- Li's Static Banner Area End Here -->
 <?php
    $result = $hotProduct->getFeaturedProducts();
    if ($result->rowCount() > 0) {
    ?>
     <!-- Begin Featured Product With Banner Area -->
     <div class="featured-pro-with-banner mt-sm-5 pb-sm-10 mt-xs-5 pb-xs-10">
         <div class="container">
             <div class="row">
                 <!-- Begin Featured Product Area -->
                 <div class="col-lg-12">
                     <div class="featured-product pt-sm-30 pt-xs-30">
                         <div class="li-section-title">
                             <h2>
                                 <span>Featured Products</span>
                             </h2>
                             <a href="index.php?action=list_product&where=featured-product" class="float-right">Xem thêm</a>
                         </div>
                         <div class="row">
                             <?php
                                while ($item = $result->fetch()) :
                                    $list_color = $list_sp_item->getColorProduct($item['id'])->fetchAll();
                                    $images = $list_sp_item->getImageProduct($item['id'])->fetchAll();
                                ?>
                                 <div class="col-lg-6">
                                     <form action="index.php?action=cart&handel=cart_process" method="post">
                                         <input type="hidden" name="product_id" id="dataPostProductId<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>">
                                         <input type="hidden" name="color_id" id="dataPostColorId<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['color_id']; ?>">
                                         <input type="hidden" name="size_id" id="dataPostSizeId<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['size_id']; ?>">
                                         <div class="featured-product-bundle">
                                             <div class="featured-pro-wrapper mb-30 mb-sm-25">
                                                 <div class="product-img">
                                                     <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                                         <img loading="lazy" src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload img-fluid" alt="Li's Product Image">
                                                     </a>
                                                 </div>
                                                 <div class="featured-pro-content">
                                                     <div class="product-review">
                                                         <h5 class="manufacturer">

                                                         </h5>
                                                     </div>
                                                     <div class="rating-box">
                                                         <?php
                                                            $rating_comment = $comment_db->ratingProduct($item['id']);
                                                            $stat = 0;
                                                            $stat = ($rating_comment['rating'] == '') ? 5 : $rating_comment['rating'];
                                                            ?>
                                                         <ul class="rating rating-with-review-item">
                                                             <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                                 <li class="<?php echo ($stat < $i) ? 'no-star' : ''; ?>"><i class="fa fa-star-o"></i></li>
                                                             <?php } ?>
                                                         </ul>
                                                     </div>
                                                     <h4><a class="featured-product-name" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                                     <?php if (isset($item['discountPercent'])) { ?>
                                                         <div class="featured-price-box">
                                                             <span class="new-price new-price-2"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100); ?></span>
                                                             <span class="old-price" style="text-decoration: line-through;"><?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                             <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                                         </div>
                                                     <?php } else { ?>
                                                         <div class="featured-price-box">
                                                             <span class="new-price new-price-2"> <?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                         </div>
                                                     <?php } ?>
                                                     <div class="featured-product-action">
                                                         <ul class="add-actions-link">
                                                             <li class="add-cart active"><button type="submit" name="submit" class="btn btn-add-to-cart text-dark p-1" style="background: transparent;">Add to cart</button></li>
                                                             <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                                             <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id']; ?>" href="#"><i class="fa fa-eye"></i></a></li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </form>
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
                                                                    foreach ($list_color as $key => $image_item) {
                                                                        if ($key != 0) {
                                                                    ?>
                                                                         <div class="lg-image">
                                                                             <img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image_product']; ?>" class="lazyload" alt="product image">
                                                                         </div>
                                                                     <?php } else { ?>
                                                                         <div class="lg-image">
                                                                             <img loading="lazy" src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload show-image-product<?php echo $item['id']; ?>" alt="product image">
                                                                         </div>
                                                                 <?php }
                                                                    } ?>
                                                                 <?php foreach ($images as $key => $image_item) { ?>
                                                                     <div class="lg-image">
                                                                         <img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image']; ?>" class="lazyload" alt="product image">
                                                                     </div>
                                                                 <?php } ?>
                                                             </div>
                                                             <div class="product-details-thumbs slider-thumbs-1">
                                                                 <?php foreach ($list_color as $key => $image_item) { ?>
                                                                     <div class="sm-image"><img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image_product']; ?>" class="lazyload" alt="product image thumb"></div>
                                                                 <?php } ?>
                                                                 <?php foreach ($images as $key => $image_item) { ?>
                                                                     <div class="sm-image"><img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image']; ?>" class="lazyload" alt="product image thumb"></div>
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
                                                                             <li class="<?php echo ($stat < $i) ? 'no-star' : ''; ?>"><i class="fa fa-star-o"></i></li>
                                                                         <?php } ?>
                                                                     </ul>
                                                                 </div>
                                                                 <div class="price-box pt-20">
                                                                     <?php if (isset($item['discountPercent'])) { ?>
                                                                         <span class="new-price new-price-2" id="showPrice<?php echo $item['id']; ?>"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100); ?> VND</span>
                                                                     <?php } else { ?>
                                                                         <span class="new-price new-price-2" id="showPrice<?php echo $item['id']; ?>"><?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                                     <?php } ?>
                                                                 </div>
                                                                 <div class="product-desc">
                                                                     <p>
                                                                         <span><?php echo $item['description']; ?></span>
                                                                     </p>
                                                                 </div>
                                                                 <div class="product-variants">
                                                                     <?php
                                                                        if (count($list_color) > 0 && $list_color[0]['color_id'] !== 1) {
                                                                        ?>
                                                                         <div class="produt-variants-size color-product">
                                                                             <label>Color</label>
                                                                             <?php
                                                                                foreach ($list_color as $key => $color_image) {
                                                                                    if ($item['discountPercent'] != 0) {
                                                                                ?>
                                                                                     <span class="color-product-image">
                                                                                         <img loading="lazy" width="50px" onclick="changeGetColorId(<?php echo $color_image['color_id']; ?>)" src="./Public/images/uploads/<?php echo $color_image['image_product']; ?>" data-size-id="<?php echo $color_image['size_id']; ?>" data-color-id="<?php echo $color_image['color_id']; ?>" data-discount-percent="<?php echo $item['discountPercent']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-image="<?php echo number_format($color_image['price'] - ($color_image['price'] * $item['discountPercent']) / 100); ?>" class="change-image-product lazyload <?php echo ($key == 0) ? 'product-active active' : ''; ?>" alt="">
                                                                                     </span>
                                                                                 <?php } else { ?>
                                                                                     <span class="color-product-image">
                                                                                         <img loading="lazy" width="50px" onclick="changeGetColorId(<?php echo $color_image['color_id']; ?>)" src="./Public/images/uploads/<?php echo $color_image['image_product']; ?>" data-size-id="<?php echo $color_image['size_id']; ?>" data-color-id="<?php echo $color_image['color_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-image="<?php echo number_format($color_image['price']); ?>" class="lazyload change-image-product <?php echo ($key == 0) ? 'product-active active' : ''; ?>" alt="">
                                                                                     </span>
                                                                             <?php }
                                                                                } ?>
                                                                         </div>
                                                                     <?php } ?>
                                                                     <?php
                                                                        $list_size = $list_sp_item->getSizeChangeColor($list_color[0]['color_id'], $item['id'])->fetchAll();
                                                                        if (count($list_size) > 0 && $list_size[0]['size_id'] !== 1) {
                                                                        ?>
                                                                         <div class="produt-variants-size">
                                                                             <label>Dimension</label>
                                                                             <select class="list_size" name="size_id" id="selectSizeId<?php echo $item['id']; ?>">
                                                                                 <?php
                                                                                    foreach ($list_size as $size) {
                                                                                        if (!isset($item['discountPercent']) && $item['discountPercent'] == 0) {
                                                                                    ?>
                                                                                         <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-size="<?php echo number_format($size['price']); ?>" data-color-id="<?php echo $list_color[0]['color_id']; ?>"><?php echo $size['name']; ?></option>
                                                                                     <?php } else { ?>
                                                                                         <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-size="<?php echo number_format($size['price'] - ($size['price'] * $item['discountPercent']) / 100); ?>" data-color-id="<?php echo $list_color[0]['color_id']; ?>"><?php echo $size['name']; ?></option>
                                                                                 <?php }
                                                                                    } ?>
                                                                             </select>
                                                                         </div>
                                                                     <?php } ?>
                                                                 </div>
                                                                 <div class="single-add-to-cart">
                                                                     <form action="index.php?action=cart&handel=cart_process" method="post" class="cart-quantity">
                                                                         <input type="hidden" name="product_id" id="dataPostProductIdView<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>">
                                                                         <input type="hidden" name="color_id" id="dataPostColorIdView<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['color_id']; ?>">
                                                                         <input type="hidden" name="size_id" id="dataPostSizeIdView<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['size_id']; ?>">
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
                             <?php endwhile; ?>
                         </div>
                     </div>
                 </div>
                 <!-- Featured Product Area End Here -->
             </div>
         </div>
     </div>
     <!-- Featured Product With Banner Area End Here -->
 <?php } ?>
 <!-- Li's Special Product Area End Here -->
 <div class="li-static-banner pt-20 pt-sm-30">
     <div class="container">
         <div class="row">
             <?php
                foreach ($categories as $key => $category_banner) {
                    if ($key >= 6) {
                ?>
                     <!-- Begin Single Banner Area -->
                     <div class="col-lg-4 col-md-4 text-center">
                         <div class="single-banner pb-xs-30">
                             <a href="index.php?action=list_product&where=category&category_id=<?php echo $category_banner['id']; ?>">
                                 <img loading="lazy" src="<?php echo $category_banner['banner_image']; ?>" class="lazyload" alt="Li's Static Banner">
                             </a>
                         </div>
                     </div>
                     <!-- Single Banner Area End Here -->
             <?php }
                } ?>
         </div>
     </div>
 </div>
 <!-- Begin Li's Laptop Product Area -->
 <?php
    $titleCategory = $list_categories->getCategory();
    while ($item = $titleCategory->fetch()) :
        $countListProduct = $hotProduct->getCategoryListProduct($item['id'])->rowCount();
        if ($countListProduct > 0) {
    ?>
         <section class="product-area li-laptop-product pt-60 pb-45">
             <div class="container">
                 <div class="row">
                     <!-- Begin Li's Section Area -->
                     <div class="col-lg-12">
                         <div class="li-section-title">
                             <h2>
                                 <span><?php echo $item['name']; ?></span>
                             </h2>
                             <a href="index.php?action=list_product&where=category&category_id=<?php echo $item['id']; ?>" class="float-right">Xem thêm</a>
                         </div>
                         <div class="row">
                             <?php
                                $result = $hotProduct->getCategoryListProduct($item['id']);
                                while ($item = $result->fetch()) :
                                    $list_color = $list_sp_item->getColorProduct($item['id'])->fetchAll();
                                    $images = $list_sp_item->getImageProduct($item['id'])->fetchAll();
                                ?>
                                 <div class="col-lg-3 mb-40">
                                     <!-- single-product-wrap start -->
                                     <form action="index.php?action=cart&handel=cart_process" method="post">
                                         <input type="hidden" name="product_id" id="dataPostProductId<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>">
                                         <input type="hidden" name="color_id" id="dataPostColorId<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['color_id']; ?>">
                                         <input type="hidden" name="size_id" id="dataPostSizeId<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['size_id']; ?>">
                                         <div class="single-product-wrap">
                                             <div class="product-image">
                                                 <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                                     <img loading="lazy" src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload" alt="Li's Product Image">
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
                                                                     <li class="<?php echo ($stat < $i) ? 'no-star' : ''; ?>"><i class="fa fa-star-o"></i></li>
                                                                 <?php } ?>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                     <h4><a class="product_name mb-15" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                                     <?php if (isset($item['discountPercent'])) { ?>
                                                         <div class="featured-price-box">
                                                             <span class="new-price new-price-2"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100); ?></span>
                                                             <span class="old-price" style="text-decoration: line-through;"><?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                             <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                                         </div>
                                                     <?php } else { ?>
                                                         <div class="featured-price-box">
                                                             <span class="new-price new-price-2"> <?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                         </div>
                                                     <?php } ?>
                                                 </div>
                                                 <div class="add-actions">
                                                     <ul class="add-actions-link">
                                                         <li class="add-cart active"><button type="submit" name="submit" class="btn btn-add-to-cart text-dark p-1" style="background: transparent;">Add to cart</button></li>
                                                         <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                                         <li><a class="links-details" href=""><i class="fa fa-heart-o"></i></a></li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         </div>
                                     </form>
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
                                                                    foreach ($list_color as $key => $image_item) {
                                                                        if ($key != 0) {
                                                                    ?>
                                                                         <div class="lg-image">
                                                                             <img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image_product']; ?>" class="lazyload" alt="product image">
                                                                         </div>
                                                                     <?php } else { ?>
                                                                         <div class="lg-image">
                                                                             <img loading="lazy" src="./Public/images/uploads/<?php echo $list_color[0]['image_product']; ?>" class="lazyload show-image-product<?php echo $item['id']; ?>" alt="product image">
                                                                         </div>
                                                                 <?php }
                                                                    } ?>
                                                                 <?php foreach ($images as $key => $image_item) { ?>
                                                                     <div class="lg-image">
                                                                         <img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image']; ?>" class="lazyload" alt="product image">
                                                                     </div>
                                                                 <?php } ?>
                                                             </div>
                                                             <div class="product-details-thumbs slider-thumbs-1">
                                                                 <?php foreach ($list_color as $key => $image_item) { ?>
                                                                     <div class="sm-image"><img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image_product']; ?>" class="lazyload" alt="product image thumb"></div>
                                                                 <?php } ?>
                                                                 <?php foreach ($images as $key => $image_item) { ?>
                                                                     <div class="sm-image"><img loading="lazy" src="./Public/images/uploads/<?php echo $image_item['image']; ?>" class="lazyload" alt="product image thumb"></div>
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
                                                                             <li class="<?php echo ($stat < $i) ? 'no-star' : ''; ?>"><i class="fa fa-star-o"></i></li>
                                                                         <?php } ?>
                                                                     </ul>
                                                                 </div>
                                                                 <div class="price-box pt-20">
                                                                     <?php if (isset($item['discountPercent'])) { ?>
                                                                         <span class="new-price new-price-2" id="showPrice<?php echo $item['id']; ?>"><?php echo  number_format($list_color[0]['price'] - ($list_color[0]['price'] * $item['discountPercent']) / 100); ?> VND</span>
                                                                     <?php } else { ?>
                                                                         <span class="new-price new-price-2" id="showPrice<?php echo $item['id']; ?>"><?php echo  number_format($list_color[0]['price']); ?> VND</span>
                                                                     <?php } ?>
                                                                 </div>
                                                                 <div class="product-desc">
                                                                     <p>
                                                                         <span><?php echo $item['description']; ?></span>
                                                                     </p>
                                                                 </div>
                                                                 <div class="product-variants">
                                                                     <?php
                                                                        if (count($list_color) > 0 && $list_color[0]['color_id'] !== 1) {
                                                                        ?>
                                                                         <div class="produt-variants-size color-product">
                                                                             <label>Color</label>
                                                                             <?php
                                                                                foreach ($list_color as $key => $color_image) {
                                                                                    if ($item['discountPercent'] != 0) {
                                                                                ?>
                                                                                     <span class="color-product-image">
                                                                                         <img loading="lazy" width="50px" onclick="changeGetColorId(<?php echo $color_image['color_id']; ?>)" src="./Public/images/uploads/<?php echo $color_image['image_product']; ?>" data-size-id="<?php echo $color_image['size_id']; ?>" data-color-id="<?php echo $color_image['color_id']; ?>" data-discount-percent="<?php echo $item['discountPercent']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-image="<?php echo number_format($color_image['price'] - ($color_image['price'] * $item['discountPercent']) / 100); ?>" class="change-image-product lazyload <?php echo ($key == 0) ? 'product-active active' : ''; ?>" alt="">
                                                                                     </span>
                                                                                 <?php } else { ?>
                                                                                     <span class="color-product-image">
                                                                                         <img loading="lazy" width="50px" onclick="changeGetColorId(<?php echo $color_image['color_id']; ?>)" src="./Public/images/uploads/<?php echo $color_image['image_product']; ?>" data-size-id="<?php echo $color_image['size_id']; ?>" data-color-id="<?php echo $color_image['color_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-image="<?php echo number_format($color_image['price']); ?>" class="lazyload change-image-product <?php echo ($key == 0) ? 'product-active active' : ''; ?>" alt="">
                                                                                     </span>
                                                                             <?php }
                                                                                } ?>
                                                                         </div>
                                                                     <?php } ?>
                                                                     <?php
                                                                        $list_size = $list_sp_item->getSizeChangeColor($list_color[0]['color_id'], $item['id'])->fetchAll();
                                                                        if (count($list_size) > 0 && $list_size[0]['size_id'] !== 1) {
                                                                        ?>
                                                                         <div class="produt-variants-size">
                                                                             <label>Dimension</label>
                                                                             <select class="list_size" name="size_id" id="selectSizeId<?php echo $item['id']; ?>">
                                                                                 <?php
                                                                                    foreach ($list_size as $size) {
                                                                                        if (!isset($item['discountPercent']) && $item['discountPercent'] == 0) {
                                                                                    ?>
                                                                                         <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-size="<?php echo number_format($size['price']); ?>" data-color-id="<?php echo $list_color[0]['color_id']; ?>"><?php echo $size['name']; ?></option>
                                                                                     <?php } else { ?>
                                                                                         <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $item['id']; ?>" data-price-size="<?php echo number_format($size['price'] - ($size['price'] * $item['discountPercent']) / 100); ?>" data-color-id="<?php echo $list_color[0]['color_id']; ?>"><?php echo $size['name']; ?></option>
                                                                                 <?php }
                                                                                    } ?>
                                                                             </select>
                                                                         </div>
                                                                     <?php } ?>
                                                                 </div>
                                                                 <div class="single-add-to-cart">
                                                                     <form action="index.php?action=cart&handel=cart_process" method="post" class="cart-quantity">
                                                                         <input type="hidden" name="product_id" id="dataPostProductIdView<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>">
                                                                         <input type="hidden" name="color_id" id="dataPostColorIdView<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['color_id']; ?>">
                                                                         <input type="hidden" name="size_id" id="dataPostSizeIdView<?php echo $item['id']; ?>" value="<?php echo $list_color[0]['size_id']; ?>">
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
                             <?php endwhile; ?>
                         </div>
                     </div>
                     <!-- Li's Section Area End Here -->
                 </div>
             </div>
         </section>
         <!-- Li's Laptop Product Area End Here -->
 <?php }
    endwhile;
?>
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
                                                         <?php endwhile;?>
                                                     </ul>
                                                 </li>
                                             <?php endwhile;?>
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
                             <div class="single-slide align-center-left animation-style-02 bg-4" style="background-image: url(public/images/slider/<?php echo $item['background']; ?>) !important;">
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
                        <a href="index.php?action=list_product&where=category&category_id=<?php echo $category_banner['id'];?>">
                            <img src="<?php echo $category_banner['banner_image'];?>" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            <?php } } ?>
         </div>
     </div>
 </div>
 <!-- Li's Static Banner Area End Here -->
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
                        $hotDealProduct = new HotProduct();
                        $list_sp_item = new ListProduct();
                        $result = $hotDealProduct->getHotProducts();
                        while ($item = $result->fetch()) :
                        ?>
                         <div class="col-lg-3 mb-40">
                             <!-- single-product-wrap start -->
                             <div class="single-product-wrap">
                                 <div class="product-image">
                                     <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                         <img data-src="<?php echo json_decode($item['images'])[0]; ?>" class="lazyload show-image-product<?php echo $item['id']; ?>" alt="Li's Product Image">
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
                                         <h4><a class="product_name mb-15" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                         <div class="price-box">
                                             <span class="new-price new-price-2"><?php echo number_format($item['price'] - ($item['price'] * ($item['discountPercent'] / 100))); ?></span>
                                             <span class="old-price"><?php echo number_format($item['price']); ?> VND</span>
                                             <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                         </div>
                                         <div class="countersection">
                                             <div class="li-countdown" data-timer="<?php echo $item['productSaleTime']; ?>"></div>
                                         </div>
                                     </div>
                                     <div class="add-actions">
                                         <ul class="add-actions-link">
                                             <li class="add-cart active"><a href="">Add to cart</a></li>
                                             <li><a class="links-details" href=""><i class="fa fa-heart-o"></i></a></li>
                                             <li><a href="javascript:void(0)" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                         </ul>
                                     </div>
                                 </div>
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
                                                            foreach (json_decode($item['images']) as $key => $image_item) {
                                                                if ($key != 0) {
                                                            ?>
                                                                 <div class="lg-image">
                                                                     <img data-src="<?php echo $image_item; ?>" class="lazyload" alt="product image">
                                                                 </div>
                                                             <?php } else { ?>
                                                                 <div class="lg-image">
                                                                     <img data-src="<?php echo $image_item; ?>" class="lazyload show-image-product<?php echo $item['id']; ?>" alt="product image">
                                                                 </div>
                                                         <?php }
                                                            } ?>
                                                     </div>
                                                     <div class="product-details-thumbs slider-thumbs-1">
                                                         <?php foreach (json_decode($item['images']) as $image_item) { ?>
                                                             <div class="sm-image"><img data-src="<?php echo $image_item; ?>" class="lazyload" alt="product image thumb"></div>
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
                                                             <span class="new-price new-price-2"><span class="new-price new-price-2"><?php echo number_format($item['price'] - ($item['price'] * ($item['discountPercent'] / 100))); ?></span> VND</span>
                                                         </div>
                                                         <div class="product-desc">
                                                             <p>
                                                                 <span><?php echo $item['description']; ?></span>
                                                             </p>
                                                         </div>
                                                         <div class="product-variants">
                                                             <?php
                                                                $listColor = $list_sp_item->getColorProduct($item['id']);
                                                                if ($listColor->rowCount() > 0) {
                                                                ?>
                                                                 <div class="produt-variants-size color-product">
                                                                     <label>Color</label>
                                                                     <span class="color-product-image"><img width="50px" data-src="<?php echo json_decode($item['images'])[0]; ?>" data-id-product="<?php echo $item['id']; ?>" class="lazyload change-image-product product-active active" alt=""></span>
                                                                     <?php
                                                                        foreach ($listColor as $color_image) {
                                                                        ?>
                                                                         <span class="color-product-image"><img width="50px" data-src="<?php echo $color_image['image_product']; ?>" data-id-product="<?php echo $item['id']; ?>" class="lazyload change-image-product" alt=""></span>
                                                                     <?php } ?>
                                                                 </div>
                                                             <?php } ?>
                                                             <?php
                                                                $list_size_product = $list_sp_item->getSizeProduct($item['id']);
                                                                if ($list_size_product->rowCount() > 0) {
                                                                ?>
                                                                 <div class="produt-variants-size">
                                                                     <label>Dimension</label>
                                                                     <select class="form-select select-product" name="size_product">
                                                                         <option value="">Please choose!!</option>
                                                                         <?php
                                                                            while ($size_product = $list_size_product->fetch()) :
                                                                            ?>
                                                                             <option value="<?php echo $size_product['id']; ?>"><?php echo $size_product['name']; ?></option>
                                                                         <?php endwhile; ?>
                                                                     </select>
                                                                 </div>
                                                             <?php } ?>
                                                         </div>
                                                         <div class="single-add-to-cart">
                                                             <form action="#" class="cart-quantity">
                                                                 <div class="quantity">
                                                                     <label>Quantity</label>
                                                                     <div class="cart-plus-minus">
                                                                         <input class="cart-plus-minus-box" value="1" type="text">
                                                                         <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                                         <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                                     </div>
                                                                 </div>
                                                                 <button class="add-to-cart" type="submit">Add to cart</button>
                                                             </form>
                                                         </div>
                                                         <div class="product-additional-info pt-25">
                                                             <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
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
                        <a href="index.php?action=list_product&where=category&category_id=<?php echo $category_banner['id'];?>">
                            <img data-src="<?php echo $category_banner['banner_image'];?>" class="lazyload" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            <?php } } ?>
         </div>
     </div>
 </div>
 <!-- Li's Static Banner Area End Here -->
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
                            $getFeaturedProducts = new HotProduct();
                            $result = $getFeaturedProducts->getFeaturedProducts();
                            while ($item = $result->fetch()) :
                            ?>
                             <div class="col-lg-6">
                                 <div class="featured-product-bundle">
                                     <div class="featured-pro-wrapper mb-30 mb-sm-25">
                                         <div class="product-img">
                                             <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                                 <img data-src="<?php echo json_decode($item['images'])[0]; ?>" class="lazyload img-fluid show-image-product<?php echo $item['id']; ?>" alt="Li's Product Image">
                                             </a>
                                         </div>
                                         <div class="featured-pro-content">
                                             <div class="product-review">
                                                 <h5 class="manufacturer">

                                                 </h5>
                                             </div>
                                             <div class="rating-box">
                                                 <ul class="rating">
                                                     <li><i class="fa fa-star-o"></i></li>
                                                     <li><i class="fa fa-star-o"></i></li>
                                                     <li><i class="fa fa-star-o"></i></li>
                                                     <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                     <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                 </ul>
                                             </div>
                                             <h4><a class="featured-product-name" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                             <?php if (isset($item['discountPercent'])) { ?>
                                                 <div class="featured-price-box">
                                                     <span class="new-price new-price-2"><?php echo number_format($item['price'] - ($item['price'] * ($item['discountPercent'] / 100))); ?></span>
                                                     <span class="old-price" style="text-decoration: line-through;"><?php echo number_format($item['price']); ?> VND</span>
                                                     <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                                 </div>
                                             <?php } else { ?>
                                                 <div class="featured-price-box">
                                                     <span class="new-price new-price-2"><?php echo number_format($item['price']); ?> VND</span>
                                                 </div>
                                             <?php } ?>
                                             <div class="featured-product-action">
                                                 <ul class="add-actions-link">
                                                     <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                     <li><a class="links-details" href=""><i class="fa fa-heart-o"></i></a></li>
                                                     <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id']; ?>" href="#"><i class="fa fa-eye"></i></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
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
                                                                foreach (json_decode($item['images']) as $key => $image_item) {
                                                                    if ($key != 0) {
                                                                ?>
                                                                     <div class="lg-image">
                                                                         <img data-src="<?php echo $image_item; ?>" class="lazyload" alt="product image">
                                                                     </div>
                                                                 <?php } else { ?>
                                                                     <div class="lg-image">
                                                                         <img data-src="<?php echo $image_item; ?>" class="lazyload show-image-product<?php echo $item['id']; ?>" alt="product image">
                                                                     </div>
                                                             <?php }
                                                                } ?>
                                                         </div>
                                                         <div class="product-details-thumbs slider-thumbs-1">
                                                             <?php foreach (json_decode($item['images']) as $image_item) { ?>
                                                                 <div class="sm-image"><img data-src="<?php echo $image_item; ?>" class="lazyload" alt="product image thumb"></div>
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
                                                                 <span class="new-price new-price-2"><span class="new-price new-price-2"><?php echo number_format($item['price'] - ($item['price'] * ($item['discountPercent'] / 100))); ?></span> VND</span>
                                                             </div>
                                                             <div class="product-desc">
                                                                 <p>
                                                                     <span><?php echo $item['description']; ?></span>
                                                                 </p>
                                                             </div>
                                                             <div class="product-variants">
                                                                 <?php
                                                                    $listColor = $list_sp_item->getColorProduct($item['id']);
                                                                    if ($listColor->rowCount() > 0) {
                                                                    ?>
                                                                     <div class="produt-variants-size color-product">
                                                                         <label>Color</label>
                                                                         <span class="color-product-image"><img width="50px" data-src="<?php echo json_decode($item['images'])[0]; ?>" data-id-product="<?php echo $item['id']; ?>" class="lazyload change-image-product product-active active" alt=""></span>
                                                                         <?php
                                                                            foreach ($listColor as $color_image) {
                                                                            ?>
                                                                             <span class="color-product-image"><img width="50px" data-src="<?php echo $color_image['image_product']; ?>" data-id-product="<?php echo $item['id']; ?>" class="lazyload change-image-product" alt=""></span>
                                                                         <?php } ?>
                                                                     </div>
                                                                 <?php } ?>
                                                                 <?php
                                                                    $list_size_product = $list_sp_item->getSizeProduct($item['id']);
                                                                    if ($list_size_product->rowCount() > 0) {
                                                                    ?>
                                                                     <div class="produt-variants-size">
                                                                         <label>Dimension</label>
                                                                         <select class="form-select select-product" name="size_product">
                                                                             <option value="">Please choose!!</option>
                                                                             <?php
                                                                                while ($size_product = $list_size_product->fetch()) :
                                                                                ?>
                                                                                 <option value="<?php echo $size_product['id']; ?>"><?php echo $size_product['name']; ?></option>
                                                                             <?php endwhile; ?>
                                                                         </select>
                                                                     </div>
                                                                 <?php } ?>
                                                             </div>
                                                             <div class="single-add-to-cart">
                                                                 <form action="#" class="cart-quantity">
                                                                     <div class="quantity">
                                                                         <label>Quantity</label>
                                                                         <div class="cart-plus-minus">
                                                                             <input class="cart-plus-minus-box" value="1" type="text">
                                                                             <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                                             <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                                         </div>
                                                                     </div>
                                                                     <button class="add-to-cart" type="submit">Add to cart</button>
                                                                 </form>
                                                             </div>
                                                             <div class="product-additional-info pt-25">
                                                                 <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
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
                        <a href="index.php?action=list_product&where=category&category_id=<?php echo $category_banner['id'];?>">
                            <img data-src="<?php echo $category_banner['banner_image'];?>" class="lazyload" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            <?php } } ?>
         </div>
     </div>
 </div>
 <!-- Begin Li's Laptop Product Area -->
 <?php
    $listProductLaptop = new HotProduct();
    $titleCategory = $list_categories->getCategory();
    while ($item = $titleCategory->fetch()) :
        $countListProduct = $listProductLaptop->getCategoryListProduct($item['id'])->rowCount();
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
                                $result = $listProductLaptop->getCategoryListProduct($item['id']);
                                while ($item = $result->fetch()) :
                            ?>
                                 <div class="col-lg-3">
                                     <!-- single-product-wrap start -->
                                     <div class="single-product-wrap">
                                         <div class="product-image">
                                             <a href="index.php?action=detail_product&id=<?php echo $item['id'] ?>">
                                                 <img data-src="<?php echo json_decode($item['images'])[0]; ?>" class="lazyload img-fluid show-image-product<?php echo $item['id']; ?>" alt="Li's Product Image">
                                             </a>
                                             <span class="sticker">New</span>
                                         </div>
                                         <div class="product_desc">
                                             <div class="product_desc_info">
                                                 <div class="product-review">
                                                     <h5 class="manufacturer">
                                                         <a href="">Graphic Corner</a>
                                                     </h5>
                                                     <div class="rating-box">
                                                         <ul class="rating">
                                                             <li><i class="fa fa-star-o"></i></li>
                                                             <li><i class="fa fa-star-o"></i></li>
                                                             <li><i class="fa fa-star-o"></i></li>
                                                             <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                             <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                                 <h4><a class="product_name mb-5" href="index.php?action=detail_product&id=<?php echo $item['id'] ?>"><?php echo $item['title']; ?></a></h4>
                                                 <?php if (isset($item['discountPercent'])) { ?>
                                                     <div class="featured-price-box">
                                                         <span class="new-price new-price-2"><?php echo number_format($item['price'] - ($item['price'] * ($item['discountPercent'] / 100))); ?></span>
                                                         <span class="old-price" style="text-decoration: line-through;"><?php echo number_format($item['price']); ?> VND</span>
                                                         <span class="discount-percentage">-<?php echo round($item['discountPercent']); ?>%</span>
                                                     </div>
                                                 <?php } else { ?>
                                                     <div class="featured-price-box">
                                                         <span class="new-price new-price-2"><?php echo number_format($item['price']); ?> VND</span>
                                                     </div>
                                                 <?php } ?>
                                             </div>
                                             <div class="add-actions">
                                                 <ul class="add-actions-link">
                                                     <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                     <li><a class="links-details" href=""><i class="fa fa-heart-o"></i></a></li>
                                                     <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter<?php echo $item['id'] ?>" href="#"><i class="fa fa-eye"></i></a></li>
                                                 </ul>
                                             </div>
                                         </div>
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
                                                                    foreach (json_decode($item['images']) as $key => $image_item) {
                                                                        if ($key != 0) {
                                                                    ?>
                                                                         <div class="lg-image">
                                                                             <img data-src="<?php echo $image_item; ?>" class="lazyload" alt="product image">
                                                                         </div>
                                                                     <?php } else { ?>
                                                                         <div class="lg-image">
                                                                             <img data-src="<?php echo $image_item; ?>" class="lazyload show-image-product<?php echo $item['id']; ?>" alt="product image">
                                                                         </div>
                                                                 <?php }
                                                                    } ?>
                                                             </div>
                                                             <div class="product-details-thumbs slider-thumbs-1">
                                                                 <?php foreach (json_decode($item['images']) as $image_item) { ?>
                                                                     <div class="sm-image"><img src="<?php echo $image_item; ?>" alt="product image thumb"></div>
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
                                                                     <span class="new-price new-price-2"><span class="new-price new-price-2"><?php echo number_format($item['price'] - ($item['price'] * ($item['discountPercent'] / 100))); ?></span> VND</span>
                                                                 </div>
                                                                 <div class="product-desc">
                                                                     <p>
                                                                         <span><?php echo $item['description']; ?></span>
                                                                     </p>
                                                                 </div>
                                                                 <div class="product-variants">
                                                                     <?php
                                                                        $listColor = $list_sp_item->getColorProduct($item['id']);
                                                                        if ($listColor->rowCount() > 0) {
                                                                        ?>
                                                                         <div class="produt-variants-size color-product">
                                                                             <label>Color</label>
                                                                             <span class="color-product-image"><img width="50px" src="<?php echo json_decode($item['images'])[0]; ?>" data-id-product="<?php echo $item['id']; ?>" class="change-image-product product-active active" alt=""></span>
                                                                             <?php
                                                                                foreach ($listColor as $color_image) {
                                                                                ?>
                                                                                 <span class="color-product-image"><img width="50px" src="<?php echo $color_image['image_product']; ?>" data-id-product="<?php echo $item['id']; ?>" class="change-image-product" alt=""></span>
                                                                             <?php } ?>
                                                                         </div>
                                                                     <?php } ?>
                                                                     <?php
                                                                        $list_size_product = $list_sp_item->getSizeProduct($item['id']);
                                                                        if ($list_size_product->rowCount() > 0) {
                                                                        ?>
                                                                         <div class="produt-variants-size">
                                                                             <label>Dimension</label>
                                                                             <select class="form-select select-product" name="size_product">
                                                                                 <option value="">Please choose!!</option>
                                                                                 <?php
                                                                                    while ($size_product = $list_size_product->fetch()) :
                                                                                    ?>
                                                                                     <option value="<?php echo $size_product['id']; ?>"><?php echo $size_product['name']; ?></option>
                                                                                 <?php endwhile; ?>
                                                                             </select>
                                                                         </div>
                                                                     <?php } ?>
                                                                 </div>
                                                                 <div class="single-add-to-cart">
                                                                     <form action="#" class="cart-quantity">
                                                                         <div class="quantity">
                                                                             <label>Quantity</label>
                                                                             <div class="cart-plus-minus">
                                                                                 <input class="cart-plus-minus-box" value="1" type="text">
                                                                                 <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                                                 <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                                             </div>
                                                                         </div>
                                                                         <button class="add-to-cart" type="submit">Add to cart</button>
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
<?php
echo (isset($_GET['login_success']) && $_GET['login_success'] == 1) ? alert('Success', 'Logged in successfully', 'success') : '';
echo (isset($_GET['confirm_email_success']) && $_GET['confirm_email_success'] == 1) ? alert('Success', 'Email confirmation successful', 'success') : '';
?>
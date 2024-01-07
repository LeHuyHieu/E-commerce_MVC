<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                <div class="ht-setting-trigger"><span>Setting</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        <li><a href="">Checkout</a></li>
                                        <?php if(isset($_SESSION['user'])) { ?>
                                            <li><a href="index.php?action=login&handle=logout">logout</a></li>
                                            <li><a href="index.php?action=user"><?php echo $_SESSION['user']['fullname'];?></a></li>
                                        <?php }else { ?>
                                            <li><a href="index.php?action=login">Sign In</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>
                            <!-- Setting Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.php?action=home">
                            <img src="./Public/images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="index.php" method="get" class="hm-searchbox">
                        <input type="hidden" name="action" value="list_product">
                        <input type="hidden" name="where" value="<?php echo isset($_GET['where']) ? $_GET['where'] : '';?>">
                        <select class="nice-select select-search-category" name="arr_category_id">
                            <option value="">All</option>
                            <?php
                                $categories = new Category();
                                $result = $categories->getCategory();
                                while($item = $result->fetch()):
                            ?>
                            <option <?php echo (isset($_GET['arr_category_id']) && $_GET['arr_category_id'] == $item['id']) ? 'selected' : '';?> value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                            <?php
                                $subCategories = $categories->getSubCategory($item['id']); 
                                while ($item2 = $subCategories->fetch()):
                            ?>
                                <option <?php echo (isset($_GET['arr_category_id']) && $_GET['arr_category_id'] == $item2['id']) ? 'selected' : '';?> value="<?php echo $item2['id'];?>"><?php echo '-- ' . $item2['name'];?></option>
                                <?php
                                    $subCategories2 = $categories->getSubCategory($item2['id']); 
                                    while ($item3 = $subCategories2->fetch()):
                                ?>
                                <option <?php echo (isset($_GET['arr_category_id']) && $_GET['arr_category_id'] == $item3['id']) ? 'selected' : '';?> value="<?php echo $item3['id'];?>"><?php echo '--- ' . $item3['name'];?></option>
                            <?php 
                                endwhile;
                                endwhile;
                                endwhile;
                            ?>
                        </select>
                        <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title']:'';?>" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="wishlist.html">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">£80.00
                                        <span class="cart-item-count">2</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        <li>
                                            <a href="single-product.html" class="minicart-product-image">
                                                <img src="./Public/images/product/small-size/1.jpg" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="single-product.html" class="minicart-product-image">
                                                <img src="./Public/images/product/small-size/2.jpg" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                                    <div class="minicart-button">
                                        <a href="index.php?action=cart" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="" class="li-button li-button-fullwidth li-button-sm">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom <?php echo (isset($_GET['action']) && $_GET['action'] != 'home') ? 'mb-0' : '';?> header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu hb-menu-2">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="index.php">Home</a>
                                </li>
                                <li class="megamenu-holder"><a href="index.php?action=list_product">Shop</a></li>
                                <li class="dropdown-holder"><a href="blog-left-sidebar.html">Blog</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li class="megamenu-holder active"><a class="align-items-center" href="javascript:void(0)">Pages<i class="fa pl-1 fa-angle-down"></i></a>
                                    <ul class="hb-dropdown">
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
</header>
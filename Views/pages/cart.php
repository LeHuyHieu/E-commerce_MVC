<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<?php 
$cart = new Cart();
$list_cart = [];
if (isset($_SESSION['user'])) {
    $list_cart = $cart->getListCartUser($_SESSION['user']['user_id'])->fetchAll();
}
?>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area load-list-cart pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php 
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 && !isset($_SESSION['user'])) { 
                ?>
                    <div class="table-content table-responsive">
                        <form action="index.php?action=cart&handel=cart_update" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 100px;" class="li-product-remove">Action</th>
                                        <th style="width: 150px;" class="li-product-thumbnail">images</th>
                                        <th style="width: 300px;" class="cart-product-name">Product</th>
                                        <th style="width: 150px;" class="li-product-quantity">Price</th>
                                        <th style="width: 150px;" class="li-product-quantity">Quantity</th>
                                        <th style="width: 150px;" class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($_SESSION['cart'] as $key => $cart_item) {
                                    ?>
                                        <tr>
                                            <td class="li-product-remove">
                                                <a class="btn delete-cart-item-product" href="index.php?action=cart&handel=delete_cart&id=<?php echo $key;?>"><i class="fa fa-times"></i></a> <br />
                                                <button type="submit" name="submit" data-key="<?php echo $key;?>" class="btn btn-save-cart-item btn-sm text-dark" style="background-color: transparent;"><i class="fa fa-save"></i></button>
                                            </td>
                                            <td class="li-product-thumbnail"><a href="index.php?action=detail_product&id=<?php echo $cart_item['product_id'];?>"><img width="100px" src="./public/images/uploads/<?php echo $cart_item['image'];?>" alt="Li's Product Image"></a></td>
                                            <td class="li-product-name"><a href="index.php?action=detail_product&id=<?php echo $cart_item['product_id'];?>"><?php echo $cart_item['title'];?></a></td>
                                            <?php if ($cart_item['discount_percent'] !== null) { ?>
                                                <td class="li-product-price"><span><?php echo formatPrice($cart_item['price'] - ($cart_item['price'] * $cart_item['discount_percent']) / 100);?> VND</span></td>
                                            <?php } else { ?>
                                                <td class="li-product-price"><span><?php echo formatPrice($cart_item['price']);?> VND</span></td>
                                            <?php } ?>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box quantity_input" name="quantity[<?php echo $key;?>][]" value="<?php echo $cart_item['quantity'];?>" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <input type="hidden" class="size_id_input" name="size_id[<?php echo $key;?>][]" value="<?php echo $cart_item['size_id'];?>" />
                                            <input type="hidden" class="color_id_input" name="color_id[<?php echo $key;?>][]" value="<?php echo $cart_item['color_id'];?>" />
                                            <input type="hidden" class="product_id_input" name="product_id[<?php echo $key;?>][]" value="<?php echo $cart_item['product_id'];?>" />
                                            <td class="product-subtotal"><span class="amount"><?php echo formatPrice($cart_item['total']);?> VND</span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span><?php echo formatPrice($cart->subTotal());?> VND</span></li>
                                    <li>Total <span><?php echo formatPrice($cart->subTotal());?> VND</span></li>
                                </ul>
                                <?php if (!isset($_SESSION['user'])) { ?>
                                    <p class="mb-0">Please log in to pay</p>
                                <?php } ?>
                                <a href="<?php echo (isset($_SESSION['user'])) ? 'index.php?action=checkout' : 'index.php?action=login';?>">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                <?php } elseif (count($list_cart) > 0 && isset($_SESSION['user'])) { 
                ?>
                    <div class="table-content table-responsive">
                        <form action="index.php?action=cart&handel=cart_update" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 100px;" class="li-product-remove">Action</th>
                                        <th style="width: 150px;" class="li-product-thumbnail">images</th>
                                        <th style="width: 300px;" class="cart-product-name">Product</th>
                                        <th style="width: 150px;" class="li-product-quantity">Price</th>
                                        <th style="width: 150px;" class="li-product-quantity">Quantity</th>
                                        <th style="width: 150px;" class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                <?php
                                    foreach ($list_cart as $key => $cart_item) {    
                                ?> 
                                        <tr>
                                            <td class="li-product-remove">
                                                <a class="btn delete-cart-item-product" href="index.php?action=cart&handel=delete_cart&id=<?php echo $cart_item['id'];?>"><i class="fa fa-times"></i></a> <br />
                                                <button type="submit" name="submit" data-key="<?php echo $key;?>" class="btn btn-save-cart-item btn-sm text-dark" style="background-color: transparent;"><i class="fa fa-save"></i></button>
                                            </td>
                                            <td class="li-product-thumbnail"><a href="index.php?action=detail_product&id=<?php echo $cart_item['product_id'];?>"><img width="100px" src="./public/images/uploads/<?php echo $cart_item['images'];?>" alt="Li's Product Image"></a></td>
                                            <td class="li-product-name"><a href="index.php?action=detail_product&id=<?php echo $cart_item['product_id'];?>"><?php echo $cart_item['title'];?></a></td>
                                            <?php if ($cart_item['discount_percent'] !== null) { ?>
                                                <td class="li-product-price"><span><?php echo formatPrice($cart_item['price'] - ($cart_item['price'] * $cart_item['discount_percent']) / 100);?> VND</span></td>
                                            <?php } else { ?>
                                                <td class="li-product-price"><span><?php echo formatPrice($cart_item['price']);?> VND</span></td>
                                            <?php } ?>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box quantity_input" name="quantity[<?php echo $key;?>][]" value="<?php echo $cart_item['quantity'];?>" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <input type="hidden" class="size_id_input" name="size_id[<?php echo $key;?>][]" value="<?php echo $cart_item['size_id'];?>" />
                                            <input type="hidden" class="color_id_input" name="color_id[<?php echo $key;?>][]" value="<?php echo $cart_item['color_id'];?>" />
                                            <input type="hidden" class="product_id_input" name="product_id[<?php echo $key;?>][]" value="<?php echo $cart_item['product_id'];?>" />
                                            <td class="product-subtotal"><span class="amount"><?php echo formatPrice($cart_item['total']);?> VND</span></td>
                                        </tr>
                                    <?php } ?> 
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span><?php echo formatPrice($cart->subTotal());?> VND</span></li>
                                    <li>Total <span><?php echo formatPrice($cart->subTotal());?> VND</span></li>
                                </ul>
                                <?php if (!isset($_SESSION['user'])) { ?>
                                    <p class="mb-0">Please log in to pay</p>
                                <?php } ?>
                                <a href="<?php echo (isset($_SESSION['user'])) ? 'index.php?action=checkout' : 'index.php?action=login&next_page=checkout';?>">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <h2>There are no products in the cart</h2>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->
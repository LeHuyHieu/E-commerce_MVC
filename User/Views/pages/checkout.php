<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<?php 
$order_db = new Orders();
$cart_db = new Cart();
$list_city = $order_db->getCity();
$list_product_order = $order_db->getProductOrder($_SESSION['user']['user_id']);
$user = $order_db->getUser($_SESSION['user']['user_id']);
?>
<?php if (isset($_SESSION['user']) && $list_product_order->rowCount() > 0) { ?>
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input placeholder="Coupon code" type="text">
                                    <input value="Apply Coupon" type="submit">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                </div>
            </div>
        </div>
        <form action="index.php?action=checkout&handel=checkout_process" method="post">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="country-select clearfix">
                                    <label>City <span class="required">*</span></label>
                                    <select class="nice-select wide" id="selectCity" name="city" required>
                                        <option value="">Please choose</option>
                                        <?php foreach ($list_city as $city) { ?>
                                            <option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="country-select clearfix district">
                                    <label>District <span class="required">*</span></label>
                                    <select class="nice-select wide" name="district" id="selectDistrict" required>
                                        <option value="">Choose city</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Full Name <span class="required">*</span></label>
                                    <input type="text" name="fullname" value="<?php echo $user['fullname'];?>" placeholder="Full name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="shipping_address" value="<?php echo $user['address'];?>" placeholder="Street address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" name="email_address" value="<?php echo $user['email'];?>" placeholder="Enter your address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone_number" value="<?php echo $user['phone'];?>" placeholder="Enter your phone number" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 40%;" class="cart-product-name">Product</th>
                                        <th style="width: 20%;" class="cart-product-name">Size</th>
                                        <th style="width: 20%;" class="cart-product-name">Color</th>
                                        <th style="width: 20%;" class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if ($list_product_order->rowCount() > 0) {
                                            $list_product = $list_product_order->fetchAll();
                                            foreach ($list_product as $product) {
                                    ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name"> <?php echo $product['title'];?><strong class="product-quantity"> × <?php echo $product['quantity'];?></strong></td>
                                            <td><?php echo $product['size_name'];?></td>
                                            <td><?php echo $product['color_name'];?></td>
                                            <td class="cart-product-total"><span class="amount"><?php echo formatPrice($product['total']);?></span></td>
                                        </tr>
                                    <?php   }
                                        }else { ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name" colspan="2">There are no products in the cart</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <input type="hidden" name="total_amount" value="<?php echo $cart_db->subTotal();?>">
                                    <tr class="cart-subtotal">
                                        <th style="text-align: start;" colspan="2">Cart Subtotal</th>
                                        <td style="text-align: end;" colspan="2"><span class="amount"><?php echo formatPrice($cart_db->subTotal());?> VND</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th style="text-align: start;" colspan="2">Order Total</th>
                                        <td style="text-align: end;" colspan="2"><strong><span class="amount"><?php echo formatPrice($cart_db->subTotal());?> VND</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input value="Place order" name="submit" class="btn-order-product" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Checkout Area End-->
<?php }elseif ($list_product_order->rowCount() == 0) { ?>
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Please add to cart to purchase</h2>
                </div>
            </div>
        </div>
    </div>
<?php }else { ?>
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Please log in</h2>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php 
    $condision = isset($_GET['action']) && $_GET['action'] == 'checkout' && isset($_GET['success']) && $_GET['success'] == 1;
    if ($condision) { 
?>
    <script>
        $(document).ready(function() {
            $.confirm({
                theme: 'jconfirm-my-theme',
                columnClass: 'small',
                title: '<img class="img-fluid" src="./Public/images/uploads/check-success.jpg" alt="" />',
                autoClose: 'Close|8000',
                content: `<h5 class="text-center">Order Success</h5> <p class="text-center">We will send the invoice to your email or you can see details <a href="index.php?action=bill">here</a></p>`,
                buttons: {
                    Home: {
                        btnClass: 'btn-blue',
                        action: function () {
                            window.location.href = "index.php?action=home";
                        }
                    },
                    Bill: {
                        btnClass: 'btn-green',
                        action: function () {
                            window.location.href = "index.php?action=bill";
                        }
                    },
                    Close: {
                        btnClass: 'btn-red',
                    },
                }
            });
        })
    </script>
<?php } ?>
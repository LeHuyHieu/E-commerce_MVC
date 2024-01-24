<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 5){
$bill = new Bill();
$confirm_success = new VendorConfirm();
$order_info = $confirm_success->ListUserOrderConfirm()->fetchAll();
?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Confirm</li>
            </ul>
        </div>
    </div>
</div>
<div class="bill-area pt-30 pb-60">
    <div class="container">
        <div class="row">
            <div class="mb-20 col-12"><h2>Confirm user order <a href="index.php?action=confirm_order" class="float-right">Order confirm</a></h2></div>
            <?php  
                if (count($order_info) > 0) {
                    foreach ($order_info as $order_info_item) {
                    $delivery = $confirm_success->GetListShipping($order_info_item['id'], 0);
                    $delivery = (isset($delivery[0]) && $delivery[0] != '') ? $delivery[0] : '';
                    $delivery_succ = $confirm_success->GetListShipping($order_info_item['id'], 1);
                    $delivery_succ = (isset($delivery_succ[0]) && $delivery_succ[0] != '') ? $delivery_succ[0] : '';
                    $delivery_failed = $confirm_success->GetListShipping($order_info_item['id'], 2);
                        if (!is_array($delivery_failed) && $delivery_failed == '') {
            ?>
            <div class="col-12">
                <div class="bill-detail p-3">
                    <ul>
                        <li>
                            <span><b>Code order</b></span>:
                            <span><?php echo $order_info_item['code_order'];?></span>
                        </li>
                        <li>
                            <span><b>Full name</b></span>:
                            <span><?php echo $order_info_item['fullname'];?></span>
                        </li>
                        <li>
                            <span><b>Email address</b></span>:
                            <span><?php echo $order_info_item['email_address'];?></span>
                        </li>
                        <li>
                            <span><b>Phone number</b></span>:
                            <span><?php echo $order_info_item['phone_number'];?></span>
                        </li>
                        <li>
                            <span><b>City</b></span>:
                            <span><?php echo $order_info_item['city'];?></span>
                        </li>
                        <li>
                            <span><b>District</b></span>:
                            <span><?php echo $order_info_item['district'];?></span>
                        </li>
                        <li>
                            <span><b>Shipping address</b></span>:
                            <span><?php echo $order_info_item['shipping_address'];?></span>
                        </li>
                        <li>
                            <span><b>Order date</b></span>:
                            <span><?php echo $order_info_item['order_date'];?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3">
                    <table class="table table-border table-hover">
                        <thead>
                            <tr>
                                <th style="width: 350px;">Name</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Quantity</th>
                                <th style="width: 200px;">Unit price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $list_order = $bill->getOrderItem($order_info_item['id'])->fetchAll();
                                foreach($list_order as $order_date_item) {
                            ?>
                                <tr>
                                    <td><?php echo $order_date_item['title'];?></td>
                                    <td><?php echo $order_date_item['color_name'];?></td>
                                    <td><?php echo $order_date_item['size_name'];?></td>
                                    <td><?php echo $order_date_item['quantity'];?></td>
                                    <td><?php echo formatPrice($order_date_item['unit_price']);?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-left">
                                    <button class="btn btn-primary btn-sm" <?php echo (isset($delivery) && $delivery == $order_info_item['id'] || $delivery_succ == $order_info_item['id']) ? 'disabled' : '';?> data-toggle="modal" data-target="#delivery">Giao hàng</button>
                                    <a href="<?php echo (isset($delivery_succ) && $delivery_succ == $order_info_item['id']) ? 'javascript:void(0)' : 'index.php?action=confirm_order&handel=delivery_succ&id='.$order_info_item['id'].'';?>" class="btn btn-primary btn-sm">Giao hàng thành công</a>
                                    <a href="index.php?action=confirm_order&handel=delivery_failed&id=<?php echo $order_info_item['id'];?>" class="btn btn-danger btn-sm">Giao hàng thất bại</a>
                                </td>
                                <td colspan="1" class="text-right"><b>Total: <?php echo formatPrice($order_info_item['total_amount']);?></b></td>
                            </tr>
                        </tfoot>
                    </table>
                    <hr class="mt-0 mb-15">
                </div>
            </div>
            <div class="modal fade modal-wrapper" id="delivery">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 class="review-page-title">Delivery</h3>
                            <div class="modal-inner-area row">
                                <div class="col-12">
                                    <div class="li-review-content">
                                        <!-- Begin Feedback Area -->
                                        <div class="feedback-area">
                                            <div class="feedback">
                                                <h3 class="feedback-title">Delivery</h3>
                                                <form method="post" action="index.php?action=confirm_order&handel=delivery&id=<?php echo $order_info_item['id'];?>">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 col-md-6">
                                                            <label for="">Shipping Date</label>
                                                            <input type="date" class="form-control mb-10" name="shipping_date" placeholder="" required>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-6">
                                                            <label for="">Estimated Delivery Date</label>
                                                            <input type="date" class="form-control" name="estimated_delivery_date" placeholder="" required>
                                                        </div>
                                                        <div class="feedback-input col-12">
                                                            <div class="feedback-btn pb-15">
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                <button type="submit" style="border: none;background: transparent;">Submit</button>
                                                            </div>
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
            <?php } } } else { ?>
                <div class="col-12"><h5>There are no applications to confirm</h5></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } else { ?>

<?php } ?>
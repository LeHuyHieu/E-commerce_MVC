<?php 
if (isset($_SESSION['user'])) {
?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Bill</li>
            </ul>
        </div>
    </div>
</div>
<?php 
$bill = new Bill();
$order_info = $bill->getUserOrder($_SESSION['user']['user_id']);
?>
<div class="bill-area pt-30 pb-60">
    <div class="container">
        <div class="row">
            <?php  
                if ($order_info != '') {
            ?>
            <div class="col-12 mb-20"><h2>Orderer information</h2></div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12">
                <div class="bill-detail border p-3">
                    <ul>
                        <li>
                            <span><b>Full name</b></span>:
                            <span><?php echo $order_info['fullname'];?></span>
                        </li>
                        <li>
                            <span><b>Email address</b></span>:
                            <span><?php echo $order_info['email_address'];?></span>
                        </li>
                        <li>
                            <span><b>Phone number</b></span>:
                            <span><?php echo $order_info['phone_number'];?></span>
                        </li>
                        <li>
                            <span><b>City</b></span>:
                            <span><?php echo $order_info['city'];?></span>
                        </li>
                        <li>
                            <span><b>District</b></span>:
                            <span><?php echo $order_info['district'];?></span>
                        </li>
                        <li>
                            <span><b>Shipping address</b></span>:
                            <span><?php echo $order_info['shipping_address'];?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12">
                <div class="border p-3" style="max-height: 300px;overflow-y: scroll;">
                    <?php 
                    $list_order_date = $bill->getOrderdate($_SESSION['user']['user_id'])->fetchAll();
                    foreach($list_order_date as $order_date_item) {
                    ?>
                        <p class="text-right"><b>Created:</b> <?php echo $order_date_item['order_date'];?></p>
                        <table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 200px;">Title</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Unit price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $list_bill_product = $bill->getBillUserOder($order_info['id'], $order_date_item['order_date'])->fetchAll();
                                $total = 0;
                                foreach ($list_bill_product as $item) { 
                                    $total += $item['unit_price'];
                                ?>
                                    <tr>
                                        <td><?php echo $item['title'];?> * <b><?php echo $item['quantity'];?></b></td>
                                        <td><?php echo $item['size_name'];?></td>
                                        <td><?php echo $item['color_name'];?></td>
                                        <td>
                                            <?php 
                                            echo ($item['status'] == 0) ? 'Wait for confirmation' : ''; 
                                            echo ($item['status'] == 1) ? 'Confirmed' : ''; 
                                            echo ($item['status'] == 2) ? 'Delivery failed' : ''; 
                                            echo ($item['status'] == 3) ? 'Successful delivery' : ''; 
                                            ?>
                                        </td>
                                        <td><?php echo formatPrice($item['unit_price'] / $item['quantity']);?></td>
                                        <td><?php echo formatPrice($item['unit_price']);?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-right"><b>Total: <?php echo formatPrice($total);?></b></td>
                                </tr>
                            </tfoot>
                        </table>
                        <hr class="mt-0 mb-15">
                    <?php } ?>
                </div>
            </div>
            <?php } else { ?>
                <h2>You have not ordered any products yet</h2>
            <?php } ?>
        </div>
    </div>
</div>
<?php }else { ?>
    <meta http-equiv="refresh" content="0; url=index.php?action=404">
<?php } ?>
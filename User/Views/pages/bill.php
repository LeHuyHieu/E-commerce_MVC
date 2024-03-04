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
    $order_info = $bill->getUserOrder($_SESSION['user']['user_id'])->fetchAll();
    function replaceStatus($status)
    {
        $return = '';
        switch ($status) {
            case '0':
                $return = 'Chờ xác nhận';
                break;
            case '1':
                $return = 'Đã xác nhận';
                break;
            case '2':
                $return = 'Đơn đã hủy';
                break;
            case '10':
                $return = 'Bạn đã hủy đơn này';
                break;
            default:
                $return = 'Chờ xác nhận';
                break;
        }
        return $return;
    }
    function replaceStatusShipping($status)
    {
        $return = '';
        switch ($status) {
            case '0':
                $return = 'Đang trên đường giao';
                break;
            case '1':
                $return = 'Đã giao';
                break;
            case '2':
                $return = 'Giao thất bại';
                break;
            default:
                $return = 'Đang trên đường giao';
                break;
        }
        return $return;
    }
    ?>
    <div class="bill-area pt-30 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-20">
                    <h2>Orderer information</h2>
                </div>
                <?php
                if (count($order_info) > 0) {
                    foreach ($order_info as $order_info_item) {
                ?>
                        <div class="col-12">
                            <div class="bill-detail p-3">
                                <ul>
                                    <li>
                                        <span><b>Code order</b></span>:
                                        <span><?php echo $order_info_item['code_order']; ?></span>
                                    </li>
                                    <li>
                                        <span><b>Full name</b></span>:
                                        <span><?php echo $order_info_item['fullname']; ?></span>
                                    </li>
                                    <li>
                                        <span><b>Email address</b></span>:
                                        <span><?php echo $order_info_item['email_address']; ?></span>
                                    </li>
                                    <li>
                                        <span><b>Phone number</b></span>:
                                        <span><?php echo $order_info_item['phone_number']; ?></span>
                                    </li>
                                    <li>
                                        <span><b>City</b></span>:
                                        <span><?php echo $order_info_item['city']; ?></span>
                                    </li>
                                    <li>
                                        <span><b>District</b></span>:
                                        <span><?php echo $order_info_item['district']; ?></span>
                                    </li>
                                    <li>
                                        <span><b>Shipping address</b></span>:
                                        <span><?php echo $order_info_item['shipping_address']; ?></span>
                                    </li>
                                    <li>
                                        <span><b>Status</b></span>:
                                        <span><?php echo replaceStatus($order_info_item['status']); ?></span>
                                    </li>
                                    <li>
                                        <span><b>Order date</b></span>:
                                        <span><?php echo $order_info_item['order_date']; ?></span>
                                    </li>
                                    <?php if ($order_info_item['shipping_date'] != '' && $order_info_item['estimated_delivery_date'] != '') { ?>
                                        <li>
                                            <span><b>Shipping date</b></span>:
                                            <span><?php echo $order_info_item['shipping_date']; ?></span>
                                        </li>
                                        <li>
                                            <span><b>Estimated Delivery Date</b></span>:
                                            <span><?php echo $order_info_item['estimated_delivery_date']; ?></span>
                                        </li>
                                        <li>
                                            <span><b>Shipping status</b></span>:
                                            <span><?php echo replaceStatusShipping($order_info_item['shipping_status']); ?></span>
                                        </li>
                                    <?php } ?>
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
                                            <th>Unit price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $list_order = $bill->getOrderItem($order_info_item[0])->fetchAll();
                                        foreach ($list_order as $order_date_item) {
                                        ?>
                                            <tr>
                                                <td><?php echo $order_date_item['title']; ?></td>
                                                <td><?php echo $order_date_item['color_name']; ?></td>
                                                <td><?php echo $order_date_item['size_name']; ?></td>
                                                <td><?php echo $order_date_item['quantity']; ?></td>
                                                <td><?php echo formatPrice($order_date_item['unit_price']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <?php if ($order_info_item['status'] != 10 && $order_info_item['shipping_status'] == '') { ?>
                                                    <a href="index.php?action=bill&handel=cancel-order&id=<?php echo $order_info_item['id']; ?>" class="btn btn-warning">Hủy đơn</a>
                                                <?php } ?>
                                                <a href="index.php?action=bill&handel=delete-order&id=<?php echo $order_info_item['id']; ?>" class="btn btn-danger">Xóa đơn</a>
                                                <?php if (($order_info_item['shipping_status'] == 0 || $order_info_item['shipping_status'] == 1) && $order_info_item['status'] == 1) { ?>
                                                    <a href="index.php?action=bill&handel=confirm&id=<?php echo $order_info_item['id']; ?>" class="btn btn-success">Đã nhận</a>
                                                <?php } ?>
                                            </td>
                                            <td colspan="<?php echo $order_info_item['status'] != 10 ? '4' : '5'; ?>" class="text-right"><b>Total: <?php echo formatPrice($order_info_item['total_amount']); ?></b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <hr class="mt-0 mb-15">
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <h5 class="pl-20">You have not ordered any products yet</h5>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <meta http-equiv="refresh" content="0; url=index.php?action=404">
<?php } ?>
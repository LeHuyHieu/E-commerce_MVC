<?php
$tb_seller = new Seller();
$pages = new Pagination();

function replaceStatusorder($str)
{
    $string = '';
    switch ($str) {
        case '0':
            $string = "Wait for confirmation";
            break;
        case '1':
            $string = "Confirm";
            break;
        case '2':
            $string = "Cancel order";
            break;
        case '3':
            $string = "Success";
            break;
        case '10':
            $string = "User cancels order";
            break;
        default:
            $string = "Wait for confirmation";
            break;
    }
    return $string;
}

function replaceOrderType($str)
{
    $string = '';
    switch ($str) {
        case '0':
            $string = "warning";
            break;
        case '1':
            $string = "info";
            break;
        case '2':
            $string = "danger";
            break;
        case '3':
            $string = "success";
            break;
        case '10':
            $string = "danger";
            break;
        default:
            $string = "warning";
            break;
    }
    return $string;
}

if ($condition) {
    if (isset($_SESSION['staff']) && $_SESSION['staff']['role'] === 10) {
        $limit = 6;
        $start = $pages->findStart($limit);
        $order_count = $tb_seller->getAllOrders()->rowCount();
        $count = $pages->findPage($order_count, $limit);
        $current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
        $orders = $tb_seller->getAllOrdersPagination($start, $limit)->fetchAll();
?>
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Seller</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                            <form action="">
                                <div class="position-relative">
                                    <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order#</th>
                                        <th>Full name</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($orders) > 0) {
                                        foreach ($orders as $order) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-0 font-14"><?php echo $order['code_order']; ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $order['fullname']; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center text-<?php echo replaceOrderType($order['status']); ?>">	<i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                                                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo replaceStatusorder($order['status']); ?></font></font></span>
                                                    </div>
                                                </td>
                                                <td>$<?php echo number_format($order['total_amount']); ?></td>
                                                <td><?php echo !empty($order['order_date']) ? date_format(date_create($order['order_date']), 'd M Y') : ''; ?></td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <?php if ($order['status'] == 0) { ?>
                                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#confirmOrder<?php echo $order['id'];?>" class="me-3"><i class='bx bx-check'></i></a>
                                                        <?php } ?>
                                                        <a href="index.php?action=seller&process=view&id=<?php echo $order['id'];?>" class="me-3"><i class='bx bx-show-alt'></i></a>
                                                        <?php if ($order['status'] != 0) { ?>
                                                            <a href="index.php?action=seller&process=delete&id=<?php echo $order['id'];?>" class="me-3"><i class='bx bx-trash'></i></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="modal fade" id="confirmOrder<?php echo $order['id'];?>" tabindex="-1" aria-labelledby="confirmOrderLabel<?php echo $order['id'];?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="index.php?action=seller&process=confirm-delivery" method="post">
                                                                    <input type="hidden" name="id_order" value="<?php echo $order['id'];?>">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="confirmOrderLabel<?php echo $order['id'];?>">Delivery confirmation</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="shipping-date">Shipping date</label>
                                                                                    <input type="date" name="shipping_date" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="estimated_delivery_date">The day arrives</label>
                                                                                    <input type="date" name="estimated_delivery_date" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="submit" class="btn btn-primary">Delivery</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="7">Không có dữ liệu</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php } else {
        echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=dashboard"  </script>';
    }
} else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
<?php
$tb_seller = new Seller();
$pages = new Pagination();

function replaceStatusorder($str)
{
    $string = '';
    switch ($str) {
        case '0':
            $string = "Is on the way";
            break;
        case '1':
            $string = "Delivered";
            break;
        case '2':
            $string = "Delivery failed";
            break;
        default:
            $string = "Is on the way";
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
            $string = "success";
            break;
        case '2':
            $string = "danger";
            break;
        default:
            $string = "warning";
            break;
    }
    return $string;
}

if ($condition) {
    $limit = 6;
    $start = $pages->findStart($limit);
    $order_count = $tb_seller->getAllShipping()->rowCount();
    $count = $pages->findPage($order_count, $limit);
    $current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
    $shippings = $tb_seller->getAllShippingPagination($start, $limit)->fetchAll();
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
                                if (count($shippings) > 0) {
                                    foreach ($shippings as $key => $shipping) {
                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-0 font-14"><?php echo $key+1; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $shipping['fullname']; ?></td>
                                            <td>
                                                <div class="badge rounded-pill text-<?php echo replaceOrderType($shipping['shipping_status']); ?> bg-light-<?php echo replaceOrderType($shipping['shipping_status']); ?> p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i><?php echo replaceStatusorder($shipping['shipping_status']); ?></div>
                                            </td>
                                            <td>$<?php echo number_format($shipping['total_amount']); ?></td>
                                            <td><?php echo $shipping['phone_number'];?></td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="index.php?action=shipping&process=success&id=<?php echo $shipping['id']; ?>" class="bg-success text-white"><i class='bx bx-check'></i></a>
                                                    <a href="index.php?action=shipping&process=failed&id=<?php echo $shipping['id'];?>" class="ms-3 bg-warning text-white"><i class='bx bx-x'></i></a>
                                                    <a href="index.php?action=shipping&process=delete&id=<?php echo $shipping['id'];?>" class="ms-3 bg-danger text-white"><i class='bx bx-trash'></i></a>
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
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
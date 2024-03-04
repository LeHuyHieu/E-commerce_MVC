<?php
$tb_seller = new Seller();
$id = $_GET['id'] ?? 0;
if ($condition) {
    $order = $tb_seller->getOrderItem($id);
    $order_detail = $tb_seller->getAllOrderDetail($id);
?>
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Applications</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div id="invoice">
                        <div class="toolbar hidden-print">
                            <div class="text-end">
                                <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                            </div>
                            <hr />
                        </div>
                        <div class="invoice overflow-auto">
                            <div style="min-width: 600px">
                                <header>
                                    <div class="row">
                                        <div class="col">
                                            <a href="javascript:;">
                                                <img src="assets/images/logo-icon.png" width="80" alt="" />
                                            </a>
                                        </div>
                                        <div class="col company-details">
                                            <h2 class="name">
                                                <a href="javascript:;">
                                                    Arboshiki
                                                </a>
                                            </h2>
                                            <div>455 Foggy Heights, AZ 85004, US</div>
                                            <div>(123) 456-789</div>
                                            <div>company@example.com</div>
                                        </div>
                                    </div>
                                </header>
                                <main>
                                    <div class="row contacts">
                                        <div class="col invoice-to">
                                            <div class="text-gray-light">ORDER TO:</div>
                                            <h2 class="to">Name: <?php echo $order['fullname'];?></h2>
                                            <div class="phone">Phone: <?php echo $order['phone_number'];?></div>
                                            <div class="address">Address: <?php echo $order['shipping_address'];?>, <?php echo $order['district'];?>, <?php echo $order['city'];?></div>
                                            <div class="email">Email: <a href="<?php echo $order['email_address'];?>"><?php echo $order['email_address'];?></a></div>
                                            <div class="date">Date of Order: <?php echo $order['order_date'];?></div>
                                        </div>
                                    </div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="50px">#</th>
                                                <th width="250px" class="text-left">Title</th>
                                                <th width="350px" class="text-right">Note</th>
                                                <th width="200px" class="text-right">Size, Color, Quantity</th>
                                                <th width="100px" class="text-right">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($order_detail as $item) { ?>
                                                <tr>
                                                    <td class="no">04</td>
                                                    <td class="text-left">
                                                        <h3>
                                                            <?php echo $item['title'];?>
                                                        </h3>
                                                    </td>
                                                    <td class="unit"><?php echo $item['note'];?></td>
                                                    <td class="qty"><?php echo $item['size'] ?? 'No size';?>, <?php echo $item['color'] ?? 'No color';?>, <?php echo $item['quantity'];?></td>
                                                    <td class="total">$<?php echo number_format($item['unit_price']);?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">GRAND TOTAL</td>
                                                <td>$<?php echo number_format($order['total_amount']);?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </main>
                                <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                            </div>
                            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function preview() {
            showImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
<?php } else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
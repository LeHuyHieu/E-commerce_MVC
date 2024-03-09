<?php
$tb_dashboard = new Dashboard();

if ($condition) {
    $getTotalOrder = $tb_dashboard->getTotalOrders();
    $getTotalRevenue = $tb_dashboard->getTotalRevenue();
    $getCounter = $tb_dashboard->getCounter();
    $countProduct = $tb_dashboard->getCountproduct();
    $geSiteTraffic = $tb_dashboard->getSiteTraffic()->fetchAll();
    function getValue($item)
    {
        return $item['count_visitor'];
    }
    $visitorArr = array_map('getValue', $geSiteTraffic);
    $top_order_products = $tb_dashboard->getTopProduct()->fetchAll();
?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?php echo $getTotalOrder['total_order']; ?></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-cart fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total Orders</p>
                                <!-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?php echo number_format($getTotalRevenue['total_revenue']); ?></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-dollar fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total Revenue</p>
                                <!-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 bg-gradient-ohhappiness">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?php echo $getCounter['cnt']; ?></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-group fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Visitors</p>
                                <!-- <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 bg-gradient-ibiza">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?php echo $countProduct['count_product']; ?></h5>
                                <div class="ms-auto">
                                    <!-- <i class='bx bx-envelope fs-3 text-white'></i> -->
                                    <i class="lni lni-shopify fs-3 text-white"></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total Product</p>
                                <!-- <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-6 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Site Traffic</h6>
                                </div>
                                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                                <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Visitor</span>
                                <!-- <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ade2f9"></i>Old Visitor</span> -->
                            </div>
                            <div class="chart-container-1">
                                <canvas id="chartSiteTraffic"></canvas>
                            </div>
                        </div>
                        <!-- <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                            <div class="col">
                                <div class="p-3">
                                    <h5 class="mb-0">45.87M</h5>
                                    <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3">
                                    <h5 class="mb-0">15:48</h5>
                                    <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3">
                                    <h5 class="mb-0">245.65</h5>
                                    <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-6 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1">Top Order Products</h5>
                                    <!-- <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>in last 30 days revenue</p> -->
                                </div>
                                <!-- <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                </div> -->
                            </div>
                        </div>
                        <div class="product-list p-3 mb-3">
                            <?php foreach($top_order_products as $item) { 
                                $detail_order = $tb_dashboard->getDetailTopProduct($item['product_id'], $item['size_name'], $item['color_name']);
                                $discount = $tb_dashboard->getDetailTopProductDiscount($item['product_id']);    
                            ?>
                                <div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
                                    <div class="col-sm-8">
                                        <div class="d-flex align-items-center">
                                            <div class="product-img">
                                                <img src="uploads/products/<?php echo $detail_order['image_product'];?>" alt="" />
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1"><?php echo $item['title'];?></h6>
                                                <p class="mb-0">Total: $<?php echo number_format($detail_order['price']);?>  <?php echo isset($discount['discount_percent']) && !empty($discount['discount_percent']) ? ' <i class="bx bx-down-arrow-alt"></i> '. number_format($discount['discount_percent']) .'%' : '';?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <h6 class="mb-1">$<?php echo number_format($item['total_price']);?></h6>
                                        <p class="mb-0"><?php echo $item['total_quantity'];?> Sales</p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><!--End Row-->
        </div>
    </div>
<?php
} else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
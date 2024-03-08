<?php
$tb_products = new Products();
$tb_categories = new Categories();
$pages = new Pagination();

if ($condition) {
    $all_categories = $tb_categories->getCategory();
    $limit = 10;
    $start = $pages->findStart($limit);
    $product_count = $tb_products->getAllProducts()->rowCount();
    $count = $pages->findPage($product_count, $limit);
    $current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
    $products = $tb_products->getAllProductsPagination($start, $limit)->fetchAll();
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Table Products</h5>
                        </div>
                        <div class="font-22 ms-auto">
                            <a href="index.php?action=products&process=create" class="btn btn-primary btn-sm"><i class="bx bx-plus-circle"></i> Create</a>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <div class="filter-categories container">
                            <form method="get" action="index.php?action=products">
                                <input type="hidden" name="action" value="products">
                                <div class="row justify-content-end">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group mb-3">
                                            <select class="single-select" name="category_id">
                                                <option value="">Choose..</option>
                                                <?php echo $tb_categories->selectCategories($all_categories, $category_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="<?php echo isset($_GET['title']) ? $_GET['title'] : ''; ?>" placeholder="Product name" name="title" autocomplete="off">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="input-group-text" id="basic-addon1"><i class="bx bx-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table align-middle mb-3">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;">Id</th>
                                    <th style="width: 80px;">Image</th>
                                    <th style="width: 300px;">Product Name</th>
                                    <th style="width: 150px;">Category Name</th>
                                    <th style="width: 150px;">Price</th>
                                    <th style="width: 100px;">Product Hot</th>
                                    <th style="width: 150px;">Date Create</th>
                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $key => $product) { ?>
                                    <tr>
                                        <td>#<?php echo $key+1; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="uploads/products/<?php echo (!empty($tb_products->getDetailProductOneRow($product['id'])['image_product'])) ? $tb_products->getDetailProductOneRow($product['id'])['image_product'] : ''; ?>" alt="">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 class="mb-1 font-14"><?php echo $product['title']; ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 class="mb-1 font-14"><?php echo $product['category_name'] ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-1 font-14"><?php echo (!empty($tb_products->getDetailProductOneRow($product['id'])['price'])) ? number_format($tb_products->getDetailProductOneRow($product['id'])['price']) . ' VND' : ''; ?></h6>
                                        </td>
                                        <td>
                                            <div class="badge rounded-pill <?php echo $product['product_hot'] == 1 ? 'bg-light-success text-success' : ' bg-light-danger text-danger'; ?> w-100"><?php echo $product['product_hot'] == 1 ? 'Active' : 'Inactive'; ?></div>
                                        </td>
                                        <td><?php echo date_format(date_create($product['created_at']), 'd M Y'); ?></td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="index.php?action=products&process=edit&id=<?php echo $product['id']; ?>" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                                <a href="index.php?action=products&process=delete&id=<?php echo $product['id']; ?>" class="bg-danger btn-delete-item text-white ms-1"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item <?php echo $current_page > 1 ? '' : 'disabled'; ?>">
                                        <a class="page-link" href="?action=products&page=<?php echo $current_page > 1 ? $current_page - 1 : $current_page; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <?php
                                    for ($i = 1; $i <= $count; $i++) {
                                        if (($i - 4) < $current_page && ($i + 4) > $current_page) {
                                    ?>
                                            <li class="page-item <?php echo $current_page == $i ? 'active' : ''; ?>"><a class="page-link" href="?action=products&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php }
                                    } ?>
                                    <li class="page-item <?php echo $current_page < $count ? '' : 'disabled'; ?>">
                                        <a class="page-link" href="?action=products&page=<?php echo $current_page < $count ? $current_page + 1 : $current_page; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
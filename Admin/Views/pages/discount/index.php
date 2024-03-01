<?php
$tb_discounts = new Discount();
$pages = new Pagination();

$limit = 7;
$start = $pages->findStart($limit);
$discount_count = $tb_discounts->getAllDiscount()->rowCount();
$count = $pages->findPage($discount_count, $limit);
$current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
$discounts = $tb_discounts->getAllDiscountPagination($start, $limit)->fetchAll();
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Table Discount</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <a href="index.php?action=discount&process=create" class="btn btn-primary btn-sm"><i class="bx bx-plus-circle"></i> Create</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <div class="filter-categories container">
                        <form method="get" action="index.php?action=discount">
                            <input type="hidden" name="action" value="discount">
                            <div class="row justify-content-end">
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
                                <th style="width: 200px;">Name</th>
                                <th style="width: 100px;">Discount Percent</th>
                                <th style="width: 150px;">Status</th>
                                <th style="width: 150px;">Date Create</th>
                                <th style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($discounts)) {
                                foreach ($discounts as $key => $item) { ?>
                                    <tr>
                                        <td><?php echo $key;?></td>
                                        <td><?php echo $item['name'];?></td>
                                        <td><?php echo number_format($item['discount_percent']);?>%</td>
                                        <td><?php echo ($item['active'] == 1) ? '<div class="badge rounded-pill  bg-light-success text-success w-100">Active</div>' : '<div class="badge rounded-pill bg-light-danger text-danger w-100">Inactive</div>';?></td>
                                        <td><?php echo date_format(date_create($item['created_at']), 'd M Y') ?></td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="index.php?action=discount&process=edit&id=<?php echo $item['id'];?>" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                                <a href="index.php?action=discount&process=delete&id=<?php echo $item['id'];?>" class="bg-danger btn-delete text-white ms-1"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php }
                            }else { ?>
                                <td colspan="6"></td>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- pagination -->
                    <div class="pagination justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $current_page > 1 ? '' : 'disabled'; ?>">
                                    <a class="page-link" href="?action=discount&page=<?php echo $current_page > 1 ? $current_page - 1 : $current_page; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $count; $i++) {
                                    if (($i - 4) < $current_page && ($i + 4) > $current_page) {
                                ?>
                                        <li class="page-item <?php echo $current_page == $i ? 'active' : ''; ?>"><a class="page-link" href="?action=discount&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php }
                                } ?>
                                <li class="page-item <?php echo $current_page < $count ? '' : 'disabled'; ?>">
                                    <a class="page-link" href="?action=discount&page=<?php echo $current_page < $count ? $current_page + 1 : $current_page; ?>" aria-label="Next">
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
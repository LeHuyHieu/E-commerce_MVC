<?php
$tb_categories = new Categories();
$pages = new Pagination();


$all_categories = $tb_categories->getCategory();
$limit = 8;
$start = $pages->findStart($limit);
$categories_count = $tb_categories->getAllCategoriesPagination($start, $limit)->rowCount();
$count = $pages->findPage($categories_count, $limit);
$current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
$categories = $tb_categories->getAllCategoriesPagination($start, $limit)->fetchAll();

$parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : 0;
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Table Categories</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <a href="index.php?action=categories&process=create" class="btn btn-primary btn-sm"><i class="bx bx-plus-circle"></i> Create</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <div class="filter-categories container">
                        <form method="get" action="index.php?action=categories">
                            <input type="hidden" name="action" value="categories">
                            <div class="row justify-content-end">
                                <div class="col-md-3 col-12">
                                    <div class="form-group mb-3">
                                        <select class="single-select" name="parent_id">
                                            <option value="">Choose..</option>
                                            <?php echo $tb_categories->selectCategories($all_categories, $parent_id);?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '';?>" placeholder="Name category" name="name" autocomplete="off">
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
                                <th>Id</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Parent Name</th>
                                <th>Date Create</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($categories as $category) {
                            ?>
                                <tr>
                                    <td>#<?php echo $category['id'];?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                <img src="<?php echo isset($category['banner_image']) && $category['banner_image'] != '' ? 'uploads/categories/'.$category['banner_image'] : 'assets/images/no_image.jpg';?>" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div><h6 class="mb-1 font-14"><?php echo $category['name'];?></h6></div>
                                    </td>
                                    <td>
                                        <div><h6 class="mb-1 font-14"><?php echo isset($category['parent_name']) && $category['parent_name'] != '' ? $category['parent_name'] : '';?></h6></div>
                                    </td>
                                    <td><?php echo (isset($category['created_at']) && $category['created_at'] != '') ? date_format(date_create($category['created_at']), 'd M Y') : '';?></td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="index.php?action=categories&process=edit&id=<?php echo $category['id'];?>" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                            <a href="index.php?action=categories&process=delete&id=<?php echo $category['id'];?>" class="bg-danger btn-delete-item text-white ms-1"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>
                                </tr
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $current_page > 1 ? '' : 'disabled';?>">
                                    <a class="page-link" href="?action=categories&page=<?php echo $current_page > 1 ? $current_page-1 : $current_page;?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                    for ($i = 1; $i <= $count; $i++) {
                                    if (($i - 4) < $current_page && ($i + 4) > $current_page) {
                                ?>
                                <li class="page-item <?php echo $current_page == $i ? 'active' : '';?>"><a class="page-link" href="?action=categories&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                                <?php } } ?>
                                <li class="page-item <?php echo $current_page < $count ? '' : 'disabled';?>">
                                    <a class="page-link" href="?action=categories&page=<?php echo $current_page < $count ? $current_page+1 : $current_page;?>" aria-label="Next">
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
<?php
$tb_categories = new Categories();
$pages = new Pagination();


$all_categories = $tb_categories->getCategory();
$limit = 8;
$start = $pages->findStart($limit);
//$categories_count = $tb_categories->getAllCategoriesPagination($start, $limit)->rowCount();
//$count = $pages->findPage($categories_count, $limit);
$current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
//$categories = $tb_categories->getAllCategoriesPagination($start, $limit)->fetchAll();

$parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : 0;
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
                                        <input type="text" class="form-control" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '';?>" placeholder="Product name" name="name" autocomplete="off">
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
                            <tr>
                                <td>#1</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src="assets/images/no_image.jpg" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><h6 class="mb-1 font-14">1</h6></div>
                                </td>
                                <td>
                                    <div><h6 class="mb-1 font-14">1</h6></div>
                                </td>
                                <td>26 Dec 2023</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="index.php?action=products&process=edit&id=" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                        <a href="index.php?action=products&process=delete&id=" class="bg-danger btn-delete-item text-white ms-1"><i class="bx bx-trash"></i></a>
                                    </div>
                                </td>
                            </tr
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$tb_banner = new Banner();
$pages = new Pagination();


//$all_categories = $tb_banner->getCategory();
//$limit = 8;
//$start = $pages->findStart($limit);
//$categories_count = $tb_banner->getAllCategories()->rowCount();
//$count = $pages->findPage($categories_count, $limit);
//$current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
//$categories = $tb_banner->getAllCategoriesPagination($start, $limit)->fetchAll();
//
//$parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : 0;
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
                        <form method="get" action="index.php?action=banner">
                            <input type="hidden" name="action" value="banner">
                            <div class="row justify-content-end">
                                <div class="col-md-4 col-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="" placeholder="Title banner" name="title" autocomplete="off">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="input-group-text" id="basic-addon1"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table align-middle table-bordered mb-3">
                        <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">Id</th>
                            <th class="text-center" style="width: 100px;">Background</th>
                            <th class="text-center">Title</th>
                            <th class="text-center" style="width: 200px;">Event</th>
                            <th class="text-center" style="width: 200px;">Stating at</th>
                            <th class="text-center" style="width: 200px;">Created at</th>
                            <th class="text-center" style="width: 120px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">#</td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="recent-product-img">
                                            <img src="assets/images/no_image.jpg" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div><h6 class="mb-1 font-14">1</h6></div>
                                </td>
                                <td class="text-center">
                                    <div><h6 class="mb-1 font-14">1</h6></div>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">
                                    <div class="d-flex order-actions justify-content-center">
                                        <a href="index.php?action=banner&process=edit&id=" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                        <a href="index.php?action=banner&process=delete&id=" class="bg-danger btn-delete-item text-white ms-1"><i class="bx bx-trash"></i></a>
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
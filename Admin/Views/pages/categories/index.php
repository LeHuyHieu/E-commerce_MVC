<?php
$tb_categories = new Categories();
$categories = $tb_categories->getAllCategories()->fetchAll();
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
                    <table class="table align-middle mb-0">
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
                </div>
            </div>
        </div>
    </div>
</div>
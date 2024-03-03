<?php
$tb_products = new Products();

if ($condition) {
    $colors = $tb_products->getAttrColor();
    $sizes = $tb_products->getAttrSize();
?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Table Products attricbute</h5>
                        </div>
                        <div class="font-22 ms-auto">
                            <a href="index.php?action=product_attr&process=create" class="btn btn-primary btn-sm"><i class="bx bx-plus-circle"></i> Create</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="table-responsive mb-3">
                                <table class="table align-middle mb-3" id="dataTableAttrProduct">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Id</th>
                                            <th style="width: 35%">Name</th>
                                            <th style="width: 35%">Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($colors as $color) {
                                        ?>
                                            <tr>
                                                <td><?php echo $color['id']; ?></td>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-1 font-14"><?php echo $color['name']; ?></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-1 font-14"><?php echo $color['value']; ?></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="index.php?action=product_attr&process=edit_color&id=<?php echo $color['id']; ?>" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                                        <a href="index.php?action=product_attr&process=delete_color&id=<?php echo $color['id']; ?>" class="bg-danger btn-delete-item text-white ms-1"><i class="bx bx-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="table-responsive mb-3">
                                <table class="table align-middle mb-3" id="dataTableAttrProduct2">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Id</th>
                                            <th style="width: 70%">Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($sizes as $size) {
                                        ?>
                                            <tr>
                                                <td><?php echo $size['id']; ?></td>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-1 font-14"><?php echo $size['name']; ?></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="index.php?action=product_attr&process=edit_size&id=<?php echo $size['id']; ?>" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                                        <a href="index.php?action=product_attr&process=delete_size&id=<?php echo $size['id']; ?>" class="bg-danger btn-delete-item text-white ms-1"><i class="bx bx-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
<?php
$tb_categories = new Categories();
$tb_product = new Products();

if ($condition) {
    $discounts = $tb_product->getAllDiscount();
    $colors = $tb_product->getAttrColor();
    $sizes = $tb_product->getAttrSize();
    $categories = $tb_categories->getCategory();
?>
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Forms</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Insert Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="mb-4 d-flex justify-content-between align-items-end">
                        <h3>Create Product</h3>
                    </div>
                    <form action="index.php?action=products&process=store" method="POST" enctype="multipart/form-data">
                        <!-- <div class="text-end">
                        <div class="form-check d-inline-block">
                            <input class="form-check-input" type="checkbox" name="product_hot" value="1" id="productHot">
                            <label class="form-check-label" for="productHot">Product hot</label>
                        </div>
                    </div> -->
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="titleProduct" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" id="titleProduct" placeholder="Title product" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="selectCategories" class="form-label">Categories</label>
                                            <select class="single-select" name="categories">
                                                <option value="">Choose category</option>
                                                <?php $tb_categories->selectCategories($categories); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="selectDiscount" class="form-label">Discount</label>
                                            <select class="single-select" id="selectDiscount" name="discont_id">
                                                <option value="">Choose discount</option>
                                                <?php foreach ($discounts as $discount) { ?>
                                                    <option value="<?php echo $discount['id']; ?>"><?php echo $discount['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="descriptionProduct" class="form-label">Description</label>
                                            <textarea id="descriptionProduct" name="description" placeholder="Description product"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                        <div class="form-group mb-3 d-inline-block image-product-item">
                                            <button type="button" class="btn-remove-image-item"><i class="bx bx-trash-alt"></i></button>
                                            <input id="imageUploadListProduct" class="form-control d-none change-image-product" name="product_images[]" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf">
                                            <label for="imageUploadListProduct" class="form-label"><img src="assets/images/no_image.jpg" id="showImage" class="img-fluid rounded" width="100px" alt="Show image" /></label>
                                        </div>
                                        <div class="image-product-item-append"></div>
                                        <button type="button" class="add-image-product btn btn-primary"><i class="bx bx-plus"></i> Add Image</button>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="row">
                                            <div class="form-check d-inline-block col-md-6 col-12">
                                                <input class="form-check-input" type="checkbox" name="product_sale" value="1" id="productSale">
                                                <label class="form-check-label" for="productSale">Product Sale</label>
                                            </div>
                                            <div class="form-check d-inline-block col-md-6 col-12">
                                                <input class="form-check-input" type="checkbox" name="product_hot" value="1" id="productHot">
                                                <label class="form-check-label" for="productHot">Product hot</label>
                                            </div>
                                            <div class="time-sale"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="append-detail-product">
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-header text-end"><button type="button" class="btn btn-primary btn-sm btn-close-append-detail-product"><i class="bx bx-x"></i></button></div>
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group mb-3">
                                                <label for="priceProduct" class="form-label">Price</label>
                                                <input type="text" name="detail_product[price][]" data-type="currency" placeholder="Price" class="form-control" id="priceProduct" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group mb-3">
                                                <label for="quantityProduct" class="form-label">Quantity</label>
                                                <input type="text" name="detail_product[quantity][]" id="quantityProduct" class="form-control" placeholder="Quantity" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="form-group mb-3">
                                                <label for="selectSize" class="form-label">Size</label>
                                                <select class="form-select" name="detail_product[size_id][]" id="selectSize">
                                                    <option value="">Choose size</option>
                                                    <?php foreach ($sizes as $size) { ?>
                                                        <option value="<?php echo $size['id']; ?>"><?php echo $size['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="form-group mb-3">
                                                <label for="selectColor" class="form-label">Color</label>
                                                <select class="form-select" id="selectColor" name="detail_product[color_id][]">
                                                    <option value="">Choose color</option>
                                                    <?php foreach ($colors as $color) { ?>
                                                        <option value="<?php echo $color['id']; ?>"><?php echo $color['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="form-group mb-3">
                                                <input type="file" name="detail_product[image_color_product][]" id="changeImageDetail" class="change-image-product form-control-file mb-3" onchange="preview()">
                                                <label for="changeImageDetail" style="cursor: pointer;"><img src="assets/images/no_image.jpg" id="showImage" class="img-fluid rounded" width="100px" alt="Show image" /></label>
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="appenDetailProduct"></div>
                        <div class="text-end">
                            <button type="button" id="changeAppendDetailProduct" class="btn btn-primary"><i class="bx bx-list-plus"></i> Add detail</button>
                            <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-plus-circle"></i> Create product</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>

    <div class="d-none">
        <div class="col-12 clone-item-time-sale">
            <div class="form-group">
                <label for="" class="form-label">Time sale</label>
                <input type="date" class="form-control" name="time_sale">
            </div>
        </div>
    </div>
<?php } else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
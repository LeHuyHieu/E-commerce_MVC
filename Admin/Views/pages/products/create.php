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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="product_hot" value="1" id="productHot">
                        <label class="form-check-label" for="productHot">Product hot</label>
                    </div>
                </div>
                <form class="" action="index.php?action=products&process=store" method="post" enctype="multipart/form-data">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="titleProduct" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="titleProduct" required placeholder="Title product" autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="selectCategories" class="form-label">Categories</label>
                                        <select class="single-select" name="categories" required>
                                            <option value="">Choose category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="selectDiscount" class="form-label">Discount</label>
                                        <select class="single-select" id="selectDiscount" name="discont_id" required>
                                            <option value="">Choose discount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="descriptionProduct" class="form-label">Description</label>
                                        <textarea id="descriptionProduct" name="description" placeholder="Description product"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="imageUploadListProduct" class="form-label">List image detail</label>
                                        <input id="imageUploadListProduct" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="append-detail-product">
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="priceProduct" class="form-label">Price</label>
                                            <input type="text" name="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="Price" class="form-control" id="priceProduct" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="quantityProduct" class="form-label">Quantity</label>
                                            <input type="text" name="quantity" id="quantityProduct" class="form-control" placeholder="Quantity" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="selectSize" class="form-label">Size</label>
                                            <select class="single-select" name="size_id" id="selectSize" required>
                                                <option value="">Choose size</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="selectColor" class="form-label">Color</label>
                                            <select class="single-select" id="selectColor" name="color_id" required>
                                                <option value="">Choose color</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <input type="file" name="image_product" id="changeImageDetail" class="form-control-file mb-3" onchange="preview()">
                                            <label for="changeImageDetail" style="cursor: pointer;"><img src="assets/images/no_image.jpg" id="showImage" class="img-fluid rounded" width="100px" alt="Show image"/></label>
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
<script>
    function preview() {
        showImage.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
<!--<div class="d-none">-->
<!--    <div class="append-detail-product-item">-->
<!--        <div class="card border-top border-0 border-4 border-primary">-->
<!--            <div class="card-body p-4">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">-->
<!--                        <div class="form-group mb-3">-->
<!--                            <label for="priceProduct_1" class="form-label">Price</label>-->
<!--                            <input type="text" name="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="Price" class="form-control" id="priceProduct_1" autocomplete="off">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">-->
<!--                        <div class="form-group mb-3">-->
<!--                            <label for="quantityProduct_1" class="form-label">Quantity</label>-->
<!--                            <input type="text" name="quantity" id="quantityProduct_1" class="form-control" placeholder="Quantity" autocomplete="off">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">-->
<!--                        <div class="form-group mb-3">-->
<!--                            <label for="selectSize_1" class="form-label">Size</label>-->
<!--                            <select class="single-select" name="size_id" id="selectSize_1" required>-->
<!--                                <option value="">Choose size</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">-->
<!--                        <div class="form-group mb-3">-->
<!--                            <label for="selectColor_1" class="form-label">Color</label>-->
<!--                            <select class="single-select" id="selectColor_1" name="color_id" required>-->
<!--                                <option value="">Choose color</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">-->
<!--                        <div class="form-group mb-3">-->
<!--                            <input type="file" name="image_product" id="changeImageDetail_1" class="form-control-file mb-3" onchange="preview()">-->
<!--                            <label for="changeImageDetail_1" style="cursor: pointer;"><img src="assets/images/no_image.jpg" id="showImage" class="img-fluid rounded" width="100px" alt="Show image"/></label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <hr />-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
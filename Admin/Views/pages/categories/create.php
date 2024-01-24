<?php
$tb_categories = new Categories();
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
                        <li class="breadcrumb-item active" aria-current="page">Insert Categores</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <h3 class="mb-4">Create Category</h3>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form class="row g-3" action="index.php?action=categories&process=store" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputCategoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="name" id="inputCategoryName" placeholder="Category name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="selectParentId" class="form-label">Parent</label>
                                <select class="single-select" id="selectParentId" name="parent_id" required>
                                    <option selected value="0">Choose..</option>
                                    <?php echo $tb_categories->selectCategories($categories);?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="bannerCategory" class="form-label">Banner Image</label>
                                <input type="file" class="form-control mb-3" name="banner_image" onchange="preview()" id="bannerCategory">
                                <img src="assets/images/no_image.jpg" id="showImage" class="img-fluid rounded" width="100px" alt="Show image"/>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary px-5">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
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
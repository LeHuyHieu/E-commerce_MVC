<?php
if ($condition) {
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
                            <li class="breadcrumb-item active" aria-current="page">Insert Discount</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="mb-4 d-flex justify-content-between align-items-end">
                        <h3>Create Discount</h3>
                    </div>
                    <form action="index.php?action=discount&process=store" method="POST">
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="nameDiscount" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="nameDiscount" placeholder="Name discount" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="discountPercent" class="form-label">Discount percent</label>
                                            <input type="text" name="discount_percent" class="form-control" id="discountPercent" placeholder="Discount percent">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-sm-6 col-6">
                                        <div class="form-check d-inline-block h-100 pt-4">
                                            <input class="form-check-input" type="checkbox" name="active" value="1" id="active">
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="descriptionProduct" class="form-label">Description</label>
                                            <textarea id="descriptionProduct" name="description" placeholder="Description product"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-plus-circle"></i> Create discount</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
<?php } else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
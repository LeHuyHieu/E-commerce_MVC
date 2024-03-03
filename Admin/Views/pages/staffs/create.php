<?php
if ($condition) {
    if (isset($_SESSION['staff']) && $_SESSION['staff']['role'] === 10) {
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
                            <li class="breadcrumb-item active" aria-current="page">Insert Staff</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="mb-4 d-flex justify-content-between align-items-end">
                        <h3>Create Staff</h3>
                    </div>
                    <form action="index.php?action=staff&process=store" method="POST">
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Name staff" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="emailStaff" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="emailStaff" placeholder="Email staff">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-plus-circle"></i> Add staff</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <script>
        function preview() {
            showImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
<?php } else {
        echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=dashboard"  </script>';
    } 
} else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
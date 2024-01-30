<?php
$db = new DB();
$id = $_GET['id'] ?? 0;
$data = $db->find($id, 'color');
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Product Attribute</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <h3 class="mb-4">Edit Product Attribute</h3>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form class="row g-3" action="index.php?action=product_attr&process=update_color" method="post">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <div class="col-12">
                                <div class="color">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Color name</label>
                                        <input type="text" name="name_color" value="<?php echo $data['name'];?>" placeholder="Color name" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Color attr</label>
                                        <input type="color" name="value_color" value="<?php echo $data['value'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary px-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>

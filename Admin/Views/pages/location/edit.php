<?php 
$tb_location = new Location();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$locations = $tb_location->getAllLocation();
$location = $tb_location->getLocationId($id);
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
                        <li class="breadcrumb-item active" aria-current="page">Insert Location</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="mb-4 d-flex justify-content-between align-items-end">
                    <h3>Create Location</h3>
                </div>
                <form action="index.php?action=location&process=update" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">City name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="<?php echo !empty($location['name']) ? $location['name'] : '';?>" placeholder="City name" autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="cityId" class="form-label">City name</label>
                                        <select name="city_id" id="cityId" class="single-select">
                                            <option value="0">Choose..</option>
                                            <?php foreach ($locations as $value) { 
                                                if ($value['city_id'] == 0){    
                                            ?>
                                                <option value="<?php echo $value['id'];?>" <?php echo $value['id'] == $location['city_id'] ? 'selected' : '';?> ><?php echo $value['name'];?></option>
                                            <?php }else { ?>
                                                <option value="<?php echo $value['id'];?>" <?php echo $value['id'] == $location['city_id'] ? 'selected' : '';?> > -- <?php echo $value['name'];?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-plus-circle"></i> Update location</button>
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
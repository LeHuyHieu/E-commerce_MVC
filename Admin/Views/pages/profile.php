<?php
$tb_staff = new Staff();
$user_id = isset($_SESSION['staff']['staff_id']) ? $_SESSION['staff']['staff_id'] : 0;
$staff = $tb_staff->editProfile($user_id);
?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?php echo !empty($staff['avatar']) ? 'uploads/avatar/'. $staff['avatar'] : 'assets/images/avatars/avatar-2.png';?>" alt="Admin" class="rounded-circle p-1 border" width="110">
                                    <div class="mt-3">
                                        <h4><?php echo $staff['name'] ?? ''; ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $staff['email'] ?? ''; ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $staff['address'] ?? ''; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-5">
                            <div class="card-body">
                                <form action="index.php?action=auth&process=profile-update" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $user_id;?>">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control" value="<?php echo $staff['name'] ?? ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" name="email" class="form-control" disabled value="<?php echo $staff['email'] ?? ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="phone" class="form-control" value="<?php echo $staff['phone'] ?? ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Birthday</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="date" name="birthday" class="form-control" value="<?php echo $staff['birthday'] ?? ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="address" class="form-control" value="<?php echo $staff['address'] ?? ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Avatar</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="avatar" onchange="preview()" class="form-control mb-2" value="<?php echo $staff['avatar'] ?? ''; ?>" />
                                            <img src="<?php echo !empty($staff['avatar']) ? 'uploads/avatar/'. $staff['avatar'] : 'assets/images/avatars/avatar-2.png';?>" width="100px" class="rounded-circle p-1 border" alt="" id="showImage">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" name="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="index.php?action=auth&process=password-update" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $user_id;?>">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Old password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="old_password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="new_password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" name="submit" class="btn btn-primary px-4" value="Save" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<script>
    function preview() {
        showImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
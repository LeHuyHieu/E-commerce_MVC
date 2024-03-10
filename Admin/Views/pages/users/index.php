<?php
$tb_users = new Users();
$pages = new Pagination();

if ($condition) {
    if (isset($_SESSION['staff']) && $_SESSION['staff']['role'] === 10) {
        $limit = 6;
        $start = $pages->findStart($limit);
        $user_count = $tb_users->getAllUserIsVisible()->rowCount();
        $count = $pages->findPage($user_count, $limit);
        $current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
        $users = $tb_users->getAllUserIsVisiblePagination($start, $limit)->fetchAll();
?>
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Seller</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                            <form action="index.php?action=users">
                                <input type="hidden" name="action" value="users" />
                                <div class="position-relative">
                                    <input type="text" name="search" class="form-control ps-5 radius-30" placeholder="Search Order"> <button class="position-absolute btn btn-sm top-50 product-show translate-middle-y"><i class="bx bx-search"></i></button>
                                </div>
                            </form>
                            <a href="index.php?action=users&process=list-user-delete" class="btn btn-primary ms-auto">List Hidden</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($users) > 0) {
                                        foreach ($users as $key => $user) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-0 font-14"><?php echo $key;?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $user['fullname']; ?></td>
                                                <td>
                                                    <span><?php echo $user['email'];?></span>
                                                </td>
                                                <td><?php echo $user['phone'];?></td>
                                                <td><?php echo !empty($user['created_at']) ? date_format(date_create($user['created_at']), 'd M Y') : ''; ?></td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="index.php?action=users&process=delete&id=<?php echo $user['id'];?>" class="me-3"><i class='bx bx-trash'></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="7">Không có dữ liệu</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php } else {
        echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=dashboard"  </script>';
    }
} else {
    echo '<script>   window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"  </script>';
}
?>
<?php
$tb_location = new Location();
$pages = new Pagination();

$limit = 6;
$start = $pages->findStart($limit);
$banner_count = $tb_location->getAllLocation()->rowCount();
$count = $pages->findPage($banner_count, $limit);
$current_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
$staffs = $tb_location->getAllLocationPagination($start, $limit)->fetchAll();
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Table Banner</h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <a href="index.php?action=location&process=create" class="btn btn-primary btn-sm"><i class="bx bx-plus-circle"></i> Create</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <div class="filter-categories container">
                        <form method="get" action="index.php?action=location&search=<?php echo isset($_GET['search']) ? urlencode($_GET['search']) : ''; ?>">
                            <input type="hidden" name="action" value="location">
                            <div class="row justify-content-end">
                                <div class="col-md-4 col-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="City name" name="search" autocomplete="off">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="input-group-text" id="basic-addon1"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table align-middle table-bordered mb-3">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 50px;">Id</th>
                                <th class="text-center" style="width: 300px;">Name</th>
                                <th class="text-center" style="width: 200px;">City Parent</th>
                                <th class="text-center" style="width: 200px;">Create</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($staffs)) {
                                foreach ($staffs as $key => $value) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $key + 1; ?></td>
                                        <td class="text-center">
                                            <h6 class="mb-1 font-14"><?php echo $value['name']; ?></h6>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $tb_location->getParentCity($value['city_id']);?>
                                        </td>
                                        <td class="text-center"><?php echo !empty($value['created_at']) ? date_format(date_create($value['created_at']), 'd M Y') : ''; ?></td>
                                        <td class="text-center">
                                            <div class="d-flex order-actions justify-content-center">
                                                <a href="index.php?action=location&process=edit&id=<?php echo $value['id']; ?>" class="bg-primary text-white"><i class="bx bx-edit"></i></a>
                                                <a href="index.php?action=location&process=delete&id=<?php echo $value['id']; ?>" class="bg-danger btn-delete-item text-white ms-1"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <td colspan="6">Khong cos du lieu</td>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $current_page > 1 ? '' : 'disabled'; ?>">
                                    <a class="page-link" href="?action=location&search=<?php echo isset($_GET['search']) ? urlencode($_GET['search']) : ''; ?>&page=<?php echo $current_page > 1 ? $current_page - 1 : $current_page; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $count; $i++) {
                                    if (($i - 4) < $current_page && ($i + 4) > $current_page) {
                                ?>
                                        <li class="page-item <?php echo $current_page == $i ? 'active' : ''; ?>"><a class="page-link" href="?action=location&search=<?php echo isset($_GET['search']) ? urlencode($_GET['search']) : ''; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php }
                                } ?>
                                <li class="page-item <?php echo $current_page < $count ? '' : 'disabled'; ?>">
                                    <a class="page-link" href="?action=location&search=<?php echo isset($_GET['search']) ? urlencode($_GET['search']) : ''; ?>&page=<?php echo $current_page < $count ? $current_page + 1 : $current_page; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
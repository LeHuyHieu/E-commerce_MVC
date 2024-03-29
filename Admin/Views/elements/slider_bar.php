<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="index.php?action=dashboard"><i class="bx bx-right-arrow-alt"></i>Dashboard</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Table</li>
        <li>
            <a href="index.php?action=categories">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
                <div class="menu-title">Categories</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li><a href="index.php?action=products"><i class="bx bx-right-arrow-alt"></i>Products</a></li>
                <li><a href="index.php?action=product_attr"><i class="bx bx-right-arrow-alt"></i>Attr product</a></li>
                <li><a href="index.php?action=discount"><i class="bx bx-right-arrow-alt"></i>Discount</a></li>
                <li><a href="index.php?action=banner"><i class="bx bx-right-arrow-alt"></i>Banner</a></li>
            </ul>
        </li>
        <?php if (isset($_SESSION['staff']['role']) && $_SESSION['staff']['role'] == 10) { ?>
            <li>
                <a href="index.php?action=staff">
                    <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
                    <div class="menu-title">Staff</div>
                </a>
            </li>
            <li>
                <a href="index.php?action=users">
                    <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
                    <div class="menu-title">Users</div>
                </a>
            </li>
            <li>
                <a href="index.php?action=seller">
                    <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
                    <div class="menu-title">Seller</div>
                </a>
            </li>
        <?php } ?>
        <li>
            <a href="index.php?action=location">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
                <div class="menu-title">Location</div>
            </a>
        </li>
        <li>
            <a href="index.php?action=shipping">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
                <div class="menu-title">Shipping</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
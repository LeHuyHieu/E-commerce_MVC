<?php if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
    role
<?php } ?>
<?php
spl_autoload_register('myModelClassLoader');
function myModelClassLoader($className) {
    $path = '../Models/';
    include_once $path . $className . '.php';
}
$ctrl = ucfirst('dashboard');
if(isset($_GET['action'])) {
    $ctrl = ucfirst($_GET['action']);
}
$controllerFilePath = "../Controllers/$ctrl"."Controller.php";
?>
<!doctype html>
<html lang="en">
<head>
     <?php include_once '../Views/elements/head.php';?>
</head>
<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php (!file_exists($controllerFilePath)) ? '' : include_once '../Views/elements/slider_bar.php';?>
        <!--end sidebar wrapper -->

        <!--start header -->
        <?php (!file_exists($controllerFilePath)) ? '' : include_once '../Views/elements/header.php';?>
        <!--end header -->
        <!--start page wrapper -->
        <?php
        if(file_exists($controllerFilePath)) {
            include_once $controllerFilePath;
        } else {
            http_response_code(404);
            include_once "../Views/pages/404.php";
        }
        ?>
        <!--end page wrapper -->
    </div>
    <!--start switcher-->
    <?php (!file_exists($controllerFilePath)) ? '' : include_once '../Views/elements/switcher.php';?>
    <!--end switcher-->
    <?php include_once '../Views/elements/js.php';?>
</body>
</html>
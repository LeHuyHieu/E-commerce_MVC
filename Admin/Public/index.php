<?php
session_start();
// unset($_SESSION);
spl_autoload_register('myModelClassLoader');
function myModelClassLoader($className)
{
    $path = '../Models/';
    include_once $path . $className . '.php';
}
$ctrl = ucfirst('dashboard');
if (isset($_GET['action'])) {
    $ctrl = ucfirst($_GET['action']);
}
$controllerFilePath = "../Controllers/$ctrl" . "Controller.php";
$condition = isset($_SESSION['staff']) && ($_SESSION['staff']['role'] === 1 || $_SESSION['staff']['role'] === 10);
?>
<!doctype html>
<html lang="en">

<head>
    <?php include_once '../Views/elements/head.php'; ?>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php if ($condition) {
            (!file_exists($controllerFilePath)) ? '' : include_once '../Views/elements/slider_bar.php';
            (!file_exists($controllerFilePath)) ? '' : include_once '../Views/elements/header.php';
        } ?>
        <!--start page wrapper -->
        <?php
        if (file_exists($controllerFilePath)) {
            include_once $controllerFilePath;
        } else {
            http_response_code(404);
            switch ($_GET['action']) {
                case 'login':
                    include_once "../Views/pages/login.php";
                    break;
                default:
                    include_once "../Views/pages/404.php";
                    break;
            }
        }
        ?>
        <!--end page wrapper -->
    </div>
    <!--start switcher-->
    <?php if ($condition) {
        (!file_exists($controllerFilePath)) ? '' : include_once '../Views/elements/switcher.php';
    } ?>
    <!--end switcher-->
    <?php include_once '../Views/elements/js.php'; ?>
</body>

</html>
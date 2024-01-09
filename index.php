<?php 
    session_start();
    //set layout list_product
    $view_layout = '';
    if(isset($_GET['view'])) {
        $view_layout = $_GET['view'];
    }else {
        $view_layout = 'grid-view';
    }
    setcookie('view', $view_layout, time() + (3600 * 24), "/");
    //end set layout list_product

    //set cookie remember me
    if(isset($_POST['remember_me']) && ((isset($_POST['username']) && $_POST['username'] !== '') || (isset($_POST['password']) && $_POST['password'] !== ''))) {
        $cookie_time = (3600 * 24);
        $value = json_encode(["username" => $_POST['username'], "password" => $_POST['password']]);   
        setcookie('user', $value, time() + $cookie_time);
    }
    //end set cookei remember me


    // auto load class
    spl_autoload_register('myModelClassLoader');
    function myModelClassLoader($className) {
        $path = './Models/';
        include_once $path . $className . '.php';
    }

    //replace price
    function formatPrice($price) {
        if ($price >= 1000000 && $price <= 1000000000) {
            $price = number_format($price / 1000) . " Tr";
        } elseif ($price < 1000000) {
            $price = number_format($price / 1000) . " N";
        } elseif ($price >= 1000000000) {
            $price = number_format($price / 1000000) . " Tỷ ";
        }
        return $price;
    }

    //show alert message
    function alert($title, $message, $method) {
        return "
            <script type='text/javascript'>
                $(document).ready(function() {
                    $.Toast('".$title."', '".$message."', '".$method."', {
                        has_icon:true,
                        has_close_btn:true,
                        stack: true,
                        timeout:3000,
                        sticky:false,
                        has_progress:true,
                        rtl:false,
                        position_class: 'toast-top-right'
                    });
                });
            </script>    
        ";
    }
    //end show alert message
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './Views/layouts/head.php'; ?>
</head>

<body>
    <div class="spinner center" style="display: none;">
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <div class="spinner-blade"></div>
        <span class="text-loading">Loading...</span>
    </div>
    <?php include_once './Views/layouts/header.php'; ?>
    <?php 
        $ctrl = 'home';
        if(isset($_GET['action'])) {
            $ctrl = $_GET['action'];
        }
        // include_once "Controllers/$ctrl.php";
        $controllerFilePath = "Controllers/$ctrl.php";

        if(file_exists($controllerFilePath)) {
            include_once $controllerFilePath;
        } else {
            http_response_code(404);
            include_once "Views/pages/404.php";
        }
    ?>
    <?php include_once './Views/layouts/footer.php'; ?>
    <?php include_once './Views/layouts/js.php'; ?>
</body>

</html>
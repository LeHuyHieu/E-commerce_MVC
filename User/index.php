<?php 
    session_start();
    // auto load class
    spl_autoload_register('myModelClassLoader');
    function myModelClassLoader($className) {
        $path = './Models/';
        include_once $path . $className . '.php';
    }

    //set layout list_product
    $view_layout = '';
    if(isset($_GET['view'])) {
        $view_layout = $_GET['view'];
    }else {
        $view_layout = 'grid-view';
    }
    setcookie('view', $view_layout, time() + (3600 * 24), "/");
    //end set layout list_product

    //token login
    $users = new User();
    if (isset($_POST['remember_me']) && $_POST['remember_me'] == 1) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passleft = '#4$%!!';
        $passright = '!!0$%&';
        $token = md5('*!&'. rand(9999, 999999) . '[}ks');
        setcookie('token_login', $token, time() + (3600 * 24), "/");
        $users->updateTokenLogin($token, $username, md5($passleft.$password.$passright));
    }
    if (isset($_COOKIE['token_login']) && $_COOKIE['token_login'] != '') {
        $token_login = $_COOKIE['token_login'];
        $user = $users->loginToken($token_login);
        $_SESSION['user']['fullname'] = $user['fullname'];
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['user_id'] = $user['id'];
        $_SESSION['user']['role'] = $user['role'];
    }
    $condition_unset_token = isset($_COOKIE['token_login']) && isset($_GET['action']) && $_GET['action'] == 'login' && isset($_GET['handle']) && $_GET['handle'] == 'logout';
    if ($condition_unset_token) {
        setcookie('token_login', '', -1, '/'); 
        unset($_COOKIE['token_login']); 
        session_unset();
    }

    //replace price
    function formatPrice($price) {
        if ($price >= 1000000 && $price <= 1000000000) {
            $price = number_format($price / 1000) . " Tr";
        } elseif ($price < 1000000) {
            $price = number_format($price / 1000) . " K";
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
                    $.Toast('', '".$message."', '".$method."', {
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
    <div class="spinner center">
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
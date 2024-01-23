<?php 
$username_cookie = ''; 
$password_cookie = ''; 
if (isset($_COOKIE['user'])) {
    $data_cookie_user = json_decode($_COOKIE['user']);
    foreach ($data_cookie_user as $key => $item_user) {
        if ($key == 'username') {
            $username_cookie = $item_user;
        }elseif ($key == 'password') {
            $password_cookie = $item_user;
        }
    }
}
$next_page = isset($_GET['next_page']) ? $_GET['next_page'] : '';
$id = isset($_GET['id']) ? '&id='.$_GET['id'] : '';
?>
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area mb-30">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Forgot Password</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mx-auto" id="showFormLogin">
                <!-- Login Form s-->
                <form action="index.php?action=forgot_password&handel=forgot_password_process" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Forgot password</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email*</label>
                                <input class="mb-0" type="email" name="email" placeholder="Email" autocomplete="off">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="register-button mt-0">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login Content Area End Here -->
<?php
echo (isset($_GET['forgot_password_success']) && $_GET['forgot_password_success'] == 1) ? alert('Success', 'Password sent successfully', 'success') : '';
?>
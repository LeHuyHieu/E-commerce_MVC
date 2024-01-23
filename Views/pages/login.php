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
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li class="active">Login Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center mt-3 mb-30">
                    <button type="button" class="register-button show-login mt-0 d-inline-block mr-5 cursor-pointer">Login</button>
                    <button type="button" class="register-button show-rigister mt-0 d-inline-block ml-5 cursor-pointer">Register</button>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mx-auto" id="showFormLogin">
                <!-- Login Form s-->
                <form action="index.php?action=login&handle=login_process&next_page=<?php echo $next_page.$id;?>" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Username*</label>
                                <input class="mb-0" type="text" name="username" placeholder="Username" value="<?php echo $username_cookie;?>">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" name="password" placeholder="Password" value="<?php echo $password_cookie;?>">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" <?php echo isset($_COOKIE['user']) ? 'checked' : '';?> id="remember_me" name="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="index.php?action=forgot_password"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="register-button mt-0">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 mx-auto d-none" id="showFormRegister">
                <form action="index.php?action=login&handle=rigister_process" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-12 mb-20">
                                <label for="userName">Username*</label>
                                <input class="mb-0" type="text" name="username" id="userName" placeholder="Username" required>
                            </div>
                            <div class="col-md-12 mb-20">
                                <label for="fullName">Full Name*</label>
                                <input class="mb-0" type="text" name="full_name" id="fullName" placeholder="Full name" required>
                            </div>
                            <div class="col-md-12 mb-20">
                                <label for="email">Email Address*</label>
                                <input class="mb-0" type="email" name="email" id="email" placeholder="Email Address" required>
                            </div>
                            <div class="col-md-6 mb-20">
                                <label for="password">Password*</label>
                                <input class="mb-0" type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-6 mb-20">
                                <label for="rePassword">Confirm Password</label>
                                <input class="mb-0" type="password" name="re-password" id="rePassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="register-button mt-0">Register</button>
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
echo (isset($_GET['register_send_mail_success']) && $_GET['register_send_mail_success'] == 1) ? alert('Success', 'Account created successfully, please confirm email', 'success') : '';
echo (isset($_GET['register_send_mail_failed']) && $_GET['register_send_mail_failed'] == 1) ? alert('Success', 'Email sending failed', 'warning') : '';
echo (isset($_GET['register_failed']) && $_GET['register_failed'] == 1) ? alert('Error', 'Account creation failed', 'error') : '';
echo (isset($_GET['data_empty']) && $_GET['data_empty'] == 1) ? alert('Warning', 'Content cannot be empty', 'warning') : '';
echo (isset($_GET['register_error']) && $_GET['register_error'] == 1) ? alert('Error', 'Email or Username already exists', 'error') : '';
echo (isset($_GET['login_failed']) && $_GET['login_failed'] == 1) ? alert('Error', 'Login failed because the password account is incorrect or the account has not been activated', 'error') : '';
?>
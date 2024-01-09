<?php
$handle = isset($_GET['handle']) ? $_GET['handle'] : '';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './vendor/autoload.php';

// Tạo một instance của PHPMailer
$mail = new PHPMailer(true);

switch ($handle) {
    case 'rigister_process':
        if (isset($_POST['submit'])) {
            $userName = $_POST['username'];
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passleft = '#4$%!!';
            $passright = '!!0$%&';

            $user = new User();
            $check_user = $user->checkUser($userName, $email);
            if($check_user->rowCount() > 0) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=login&register_error=1">';
            }else {
                $data = [
                    "username" => $userName,
                    "email" => $email,
                    "fullname" => $fullName,
                    "password" => md5($passleft.$password.$passright),
                ];
                $result = $user->insertUser($data);
                $message = "Hello $fullName! <br>"
                            . "Please click the link below to confirm your email and complete the registration process.<br>"
                            . "You will be automatically redirected to a welcome page where you can then sign in.<br><br>"            
                            . "Please click below to activate your account:<br>"
                            . "<a target='_blank' style='display: inline-block;padding: 10px 20px; border-1px solid #222; color: #222;text-decoration:none;background: transparent;border-radius: 5px;box-shadow:0 2px 8px rgba(0,0,0,0,15);' href='http://localhost/ecommerce/index.php?action=login&handle=confirm_email&email=".urlencode($email)."&confirm=1'>Click Here!</a>";
                if ($result) {
                    try {
                        // $htmlContent = file_get_contents('./Public/template_send_mail/send_mail.php');
                        // Cài đặt thông tin SMTP (nếu bạn sử dụng SMTP)
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                        $mail->SMTPDebug = false;    
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'lehuyhieupro06182@gmail.com';
                        $mail->Password   = 'pkkh kzku bqsn wamm';
                        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->SMTPSecure = 'tls';
                        $mail->Port       = 587;

                        // Thiết lập thông tin gửi email
                        $mail->setFrom('lehuyhieupro06182@gmail.com', 'lehuyhieu');//Hiển thị thông tin người gửi khi người nhập mở email
                        $mail->addAddress($email, $fullName);//email người nhận
                        $mail->addReplyTo('lehuyhieupro06182@gmail.com', 'Reply To');//Khai báo email nhận được phản hồi của người nhận, nếu không khai báo nó mặc định gửi lại địa chỉ chúng ta gửi đi

                        // Đính kèm tệp nếu cần
                        // $mail->addAttachment('/path/to/file.pdf');

                        // Thiết lập tiêu đề và nội dung email
                        $mail->isHTML(true);//Khai báo nội dung email hiển thị định dạng html
                        $mail->Subject = 'Please confirm email to log in';
                        $mail->Body    = $message;
                        // $mail->MsgHTML($htmlContent);

                        // Gửi email
                        $mail->send();
                        echo '<meta http-equiv="refresh" content="0; url=index.php?action=login&register_send_mail_success=1">';
                    } catch (Exception $e) {
                        echo '<meta http-equiv="refresh" content="0; url=index.php?action=login&register_send_mail_failed=1">';
                    }
                }else {
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=login&register_failed=1">';
                }
            }
        }
        break;
    case 'login_process':
        if(isset($_POST['submit'])) {
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $passleft = '#4$%!!';
            $passright = '!!0$%&';

            if(empty($_POST['username']) || empty($_POST['password'])) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=login&data_empty=1">';
            }else {
                $user = new User();
                $cart_db = new Cart();
                $check = $user->login($userName, md5($passleft.$password.$passright));
                if($check->rowCount() > 0) {
                    $data_user = $check->fetchAll();
                    foreach ($data_user as $item) {
                        $_SESSION['user']['fullname'] = $item['fullname'];
                        $_SESSION['user']['user_id'] = $item['id'];
                    }
                    $flag = false;
                    if (isset($_SESSION['user']) && isset($_SESSION['cart'])) {
                        $user_id = $_SESSION['user']['user_id'];
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $_SESSION['cart'][$key]['user_id'] = $user_id;
                            $_SESSION['cart'][$key]['discount_percent'] = ($_SESSION['cart'][$key]['discount_percent'] === '') ? 0 : $_SESSION['cart'][$key]['discount_percent'];
                            $cart = $cart_db->getCart($value['product_id'], $value['color_id'], $value['size_id']);
                            // print_r($cart);die;
                            if ($cart->rowCount() == 0) {
                                $check_insert_acrt = $cart_db->insertCart($_SESSION['cart'][$key]);
                                $flag = true;
                            }else {
                                $list_cart = $cart->fetchAll();
                                foreach ($list_cart as $cart_item) {
                                    $check_update_cart = $cart_item['product_id'] == $value['product_id'] && $cart_item['size_id'] == $value['size_id'] && $cart_item['color_id'] == $value['color_id'] && $cart_item['discount_percent'] == $value['discount_percent'] && $cart_item['price'] == $value['price'];
                                    if ($check_update_cart) {
                                        $discount_percent = ($value['discount_percent'] === '') ? 0 : $value['discount_percent'];
                                        $cart_db->updateCartDB($value['quantity'], $value['price'], $discount_percent, $cart_item['id']);
                                        $flag = true;
                                    }
                                }
                            }
                        }
                    }
                    if ($flag == true && isset($_SESSION['cart'])) {
                        unset($_SESSION['cart']);
                    }
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=home&login_success=1">';
                }else {
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=login&login_failed=1">';
                }
            }
        }
        break;
    case 'confirm_email':
        $user = new User();
        $confirm = isset($_GET['confirm']) ? $_GET['confirm'] : '';
        $email_confirm = isset($_GET['email']) ? $_GET['email'] : '';
        //update confirm email
        $confirm_email = $user->confirmEmail(urldecode($email_confirm), $confirm);
        //get user where email
        $get_user = $user->getUser($email_confirm)->fetchAll();
        
        if ($confirm_email == 1) {
            foreach ($get_user as $item) {
                $_SESSION['user']['fullname'] = $item['fullname'];
                $_SESSION['user']['user_id'] = $item['id'];
            }
            echo '<meta http-equiv="refresh" content="0; url=index.php?action=home&confirm_email_success=1">';
        }
        break;
    case 'logout': 
        session_unset();
        echo '<meta http-equiv="refresh" content="0; url=index.php?action=login">';
        break;
    default:
        include_once './Views/pages/login.php';
        break;
}
?>
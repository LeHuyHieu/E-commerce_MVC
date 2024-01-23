<?php
$handel = $_GET['handel'] ?? 'forgot_password';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './vendor/autoload.php';

// Tạo một instance của PHPMailer
$mail = new PHPMailer(true);

switch ($handel) {
    case 'forgot_password':
        @include './Views/pages/forgot_password.php';
        break;

    case 'forgot_password_process':
        $data = [];
        if (isset($_POST['submit'])) {
            $db = new Connect();
            $users = new User();
            $email = $_POST['email'];
            $user = $users->getUser($email);
            $full_name = $user['fullname'];
            $passleft = '#4$%!!';
            $passright = '!!0$%&';
            $password = '&1'.rand(99999, 999999).'as^';
            $password_md = md5($passleft.$password.$passright);
            $message = "Hello $full_name! <br>"
                . "You have just performed the forgot password operation.<br/>"
                . "This is your new login password: $password<br>";
            $condition = "email = '$email'";
            $data['password'] = $password_md;
            $table_name = "users";
            $check = $db->update($table_name, $data, $condition);
            if ($check) {
                try {
                    $mail->SMTPDebug = false;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'lehuyhieupro06182@gmail.com';
                    $mail->Password   = 'pkkh kzku bqsn wamm';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;
    
                    // Thiết lập thông tin gửi email
                    $mail->setFrom('lehuyhieupro06182@gmail.com', 'lehuyhieu'); //Hiển thị thông tin người gửi khi người nhập mở email
                    $mail->addAddress($email, $full_name); //email người nhận
                    $mail->addReplyTo('lehuyhieupro06182@gmail.com', 'Reply To'); //Khai báo email nhận được phản hồi của người nhận, nếu không khai báo nó mặc định gửi lại địa chỉ chúng ta gửi đi
    
                    // Đính kèm tệp nếu cần
                    // $mail->addAttachment('/path/to/file.pdf');
    
                    // Thiết lập tiêu đề và nội dung email
                    $mail->isHTML(true); //Khai báo nội dung email hiển thị định dạng html
                    $mail->Subject = 'This is your new password';
                    $mail->Body    = $message;
    
                    // Gửi email
                    $mail->send();
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=forgot_password&forgot_password_success=1">';
                } catch (Exception $e) {
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=forgot_password&forgot_password_failed=1">';
                }
            }
        }
        break;

    default:
        # code...
        break;
}

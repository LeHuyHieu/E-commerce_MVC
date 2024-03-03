<?php 
$process = isset($_GET['process']) ? $_GET['process'] : 'login-process';
$staffs = new Staff();

switch ($process) {
    case 'login-process':
        if (isset($_POST['submit'])) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $passleft = '#4$%!!';
            $passright = '!!0$%&';
            if (!empty($email) && !empty($password)) {
                $result = $staffs->checkLogin($email, md5($passleft.$password.$passright));
                if ($result->rowCount() > 0) {
                    foreach ($result->fetchAll() as $item) {
                        $_SESSION['staff']['name'] = $item['name'] ?? '';
                        $_SESSION['staff']['email'] = $item['email'] ?? '';
                        $_SESSION['staff']['avatar'] = $item['avatar'] ?? '';
                        $_SESSION['staff']['birthday'] = $item['birthday'] ?? '';
                        $_SESSION['staff']['phone'] = $item['phone'] ?? '';
                        $_SESSION['staff']['token'] = $item['token'] ?? '';
                        $_SESSION['staff']['created_at'] = $item['created_at'] ?? '';
                        $_SESSION['staff']['staff_id'] = $item['id'] ?? '';
                        $_SESSION['staff']['role'] = $item['role'] ?? '';
                    }
                    echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?login-success=1"</script>';
                }else {
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=login&login-success=1"/>';
                }
            }else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=login&login-failed=1"/>';
            }
        }
        break;
    case 'logout':
        session_destroy();
        echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=login"</script>';
        break;
    default:
        
        break;
}
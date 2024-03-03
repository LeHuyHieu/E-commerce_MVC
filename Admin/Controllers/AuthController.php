<?php
$process = isset($_GET['process']) ? $_GET['process'] : 'login-process';
$staffs = new Staff();
$db = new DB();

switch ($process) {
    case 'login-process':
        if (isset($_POST['submit'])) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $passleft = '#4$%!!';
            $passright = '!!0$%&';
            if (!empty($email) && !empty($password)) {
                $result = $staffs->checkLogin($email, md5($passleft . $password . $passright));
                if ($result->rowCount() > 0) {
                    foreach ($result->fetchAll() as $item) {
                        $_SESSION['staff']['name'] = $item['name'] ?? '';
                        $_SESSION['staff']['email'] = $item['email'] ?? '';
                        $_SESSION['staff']['avatar'] = $item['avatar'] ?? '';
                        $_SESSION['staff']['birthday'] = $item['birthday'] ?? '';
                        $_SESSION['staff']['phone'] = $item['phone'] ?? '';
                        $_SESSION['staff']['address'] = $item['address'] ?? '';
                        $_SESSION['staff']['token'] = $item['token'] ?? '';
                        $_SESSION['staff']['created_at'] = $item['created_at'] ?? '';
                        $_SESSION['staff']['staff_id'] = $item['id'] ?? '';
                        $_SESSION['staff']['role'] = $item['role'] ?? '';
                    }
                    echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?login-success=1"</script>';
                } else {
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=login&login-failed=1"/>';
                }
            } else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=login&login-failed=1"/>';
            }
        }
        break;
    case 'profile':
        include_once '../Views/pages/profile.php';
        break;
    case 'profile-update':
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $birthday = $_POST['birthday'] ?? '';
            $address = $_POST['address'] ?? '';
            $id = $_POST['id'] ?? 0;
            $data_profile = [];

            $data_profile += [
                'name' => $name,
                'phone' => $phone,
                'birthday' => $birthday,
                'address' => $address
            ];

            if (isset($_FILES['avatar']) && basename($_FILES["avatar"]["name"]) != '') {
                $staff = $staffs->getStaffId($id);
                $public = 'uploads/avatar/';
                $file_name_db = $staff['avatar'];
                $files = glob($public . '/*');

                foreach ($files as $file) {
                    if (is_file($file) && basename($file) === $file_name_db) {
                        if (unlink($file)) {
                            echo 'File đã được xóa thành công.';
                        } else {
                            echo 'Không thể xóa file.';
                        }
                        break;
                    }
                }

                $target_dir = "uploads/avatar/";
                $fileName = time() . '_' . basename($_FILES["avatar"]["name"]);
                $data_profile += ['avatar' => $fileName];
                $targetFile   = $target_dir . $fileName;
                $allowUpload   = true;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "svg") {
                    echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                    $allowUpload   = false;
                }

                if (file_exists($targetFile)) {
                    echo "Sorry, a file with that name already exists.";
                    $allowUpload = false;
                }
                if ($allowUpload) {
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile)) {
                        echo "The file " . htmlspecialchars(basename($_FILES['avatar']['name'])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            $update = $db->update('staff', $data_profile, "id = $id");
            echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=auth&process=profile"</script>';
        }
        break;
    case 'password-update':
        if (isset($_POST['submit'])) {
            $id = $_POST['id'] ?? 0;
            $old_password = $_POST['old_password'] ?? '';
            $new_password = $_POST['new_password'] ?? '';
            $passleft = '#4$%!!';
            $passright = '!!0$%&';
            $check = $staffs->checkOldPassword($id,md5($passleft.$old_password.$passright));
            if (is_array($check)) {
                $update_password = $db->update('staff', ['password' => md5($passleft.$new_password.$passright)], "id = $id");
                echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=auth&process=profile"</script>';
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

<?php 
$process = isset($_GET['process']) ? $_GET['process'] : 'index';
$db = new DB();

switch ($process) {
    case 'index':
        include_once '../Views/pages/staffs/index.php';
        break;
    case 'create':
        include_once '../Views/pages/staffs/create.php';
        break;
    case 'store':
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $passleft = '#4$%!!';
            $passright = '!!0$%&';

            if (!empty($name) && !empty($email) && !empty($password)) {
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'created_at' => date('Y-m-d H:i:s'),
                    'password' => md5($passleft.$password.$passright)
                ];
                $insert = $db->insert('staff', $data);
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=staff&insert-success=1"/>';
            }else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=staff&process=create&empty=1"/>';
            }
        }
        break;
    case 'edit':
        include_once '../Views/pages/staffs/edit.php';
        break;
    case 'update':
        if (isset($_POST['submit'])) {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $passleft = '#4$%!!';
            $passright = '!!0$%&';

            if (!empty($name) && !empty($email) && !empty($password) && !empty($id)) {
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'created_at' => date('Y-m-d H:i:s'),
                    'password' => md5($passleft.$password.$passright)
                ];
                $insert = $db->update('staff', $data, "id = $id");
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=staff&update-success=1"/>';
            }else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=staff&process=update&empty=1"/>';
            }
        }
        break;
    case 'delete':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $db->update('staff', ['status' => 0], "id = $id");
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=staff&delete-success=1"/>';
        }
        break;
    default:
        include_once '../Views/pages/staffs/index.php';
        break;
}

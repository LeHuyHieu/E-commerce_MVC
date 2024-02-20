<?php
$process = isset($_POST['process']) ? $_POST['process'] : 'index';
$db = new DB();

switch ($process) {
    case 'index':
        include_once '../Views/pages/banner/index.php';
        break;
    case 'create':
        include_once '../Views/pages/banner/create.php';
        break;
    case 'store':
        if (isset($_POST['submit'])) {

        }
        break;
    case 'edit':
        include_once '../Views/pages/banner/edit.php';
        break;
    case 'update':
        if (isset($_POST['submit'])) {

        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $db->delete($id, 'banner');
            if ($delete) {
                echo '<script> window.location.href = document.referrer; </script>';
            }
        }
        break;
    default:
        include_once '../Views/pages/banner/index.php';
        break;
}

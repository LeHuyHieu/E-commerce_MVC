<?php
$handel = isset($_GET['handel']) ? $_GET['handel'] : 'bill';
$db = new DB();

switch ($handel) {
    case 'bill':
        include_once './Views/pages/bill.php';
        break;
    case 'cancel-order':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $update = $db->update('orders', ['status' => 10], "id = $id");
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=bill"/>';
        }
        break;
    case 'confirm':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $update = $db->update('orders', ['status' => 3], "id = $id");
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=bill"/>';
        }
        break;
    case 'delete-order':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $update = $db->update('orders', ['hidden' => 1], "id = $id");
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=bill"/>';
        }
        break;
    default:
        include_once './Views/pages/bill.php';
        break;
}
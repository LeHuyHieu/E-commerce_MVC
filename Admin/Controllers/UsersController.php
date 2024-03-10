<?php
$process = isset($_GET['process']) ? $_GET['process'] : 'index';
$db = new DB();

switch ($process) {
    case 'index':
        include_once '../Views/pages/users/index.php';
        break;
    case 'list-user-delete':
        include_once '../Views/pages/users/list_user_delete.php';
        break;
    case 'is-visible':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $db->update('users', ['is_visible' => 0], "id = $id");
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=users&process=list-user-delete&update-success=1"/>';
        }else {
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=users"/>';
        }
        break;
    case 'delete':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $db->update('users', ['is_visible' => 1], "id = $id");
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=users&delete-success=1"/>';
        }else {
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=users"/>';
        }
        break;
    default:
        include_once '../Views/pages/users/index.php';
        break;
}
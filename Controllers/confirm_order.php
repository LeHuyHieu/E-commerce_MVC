<?php 
$handel = 'confirm_order';
if (isset($_GET['handel'])) {
    $handel = $_GET['handel'];
}

switch ($handel) {
    case 'confirm_order':
        include_once './Views/pages/confirm_order/confirm_order.php';
        break;
    case 'delete':
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $id = $_GET['id'];
            $confirm_delete = new VendorConfirm();
            $check = $confirm_delete->UpdateUserOrder($id, 2);
            if ($check) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=confirm_order&delete_success=1">';
            }
        }
        break;
    case 'confirm':
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $id = $_GET['id'];
            $confirm = new VendorConfirm();
            $check = $confirm->UpdateUserOrder($id, 1);
            if ($check) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=confirm_order&confirm_success=1">';
            }
        }
        break;
    case 'list_confirm':
        include_once './Views/pages/confirm_order/confirm_order_success.php';
        break;
    default:
        include_once './Views/pages/confirm_order/confirm_order.php';
        break;
}


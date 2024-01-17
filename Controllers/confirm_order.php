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
    case 'delivery': 
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $id = $_GET['id'];
            $shipping_date = isset($_POST['shipping_date']) ? $_POST['shipping_date'] : '';
            $estimated_delivery_date = isset($_POST['estimated_delivery_date']) ? $_POST['estimated_delivery_date'] : '';
            if ($shipping_date == '' && $estimated_delivery_date == '') {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=confirm_order&handel=list_confirm">';
            }else {
                $confirm = new VendorConfirm();
                $check = $confirm->InsertShippingOrder($id, $shipping_date, $estimated_delivery_date);
                if ($check) {
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=confirm_order&handel=list_confirm&delivery_success=1">';
                }
            }
        }
        break;
    case 'delivery_succ': 
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $id = $_GET['id'];
            $confirm = new VendorConfirm();
            $check = $confirm->UpdateShippingStatus($id, 1);
            if ($check) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=confirm_order&handel=list_confirm&delivery_succ_success=1">';
            }
        }
        break;
    case 'delivery_failed': 
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $id = $_GET['id'];
            $confirm = new VendorConfirm();
            $check = $confirm->UpdateShippingStatus($id, 2);
            if ($check) {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=confirm_order&handel=list_confirm&delivery_failed=1">';
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


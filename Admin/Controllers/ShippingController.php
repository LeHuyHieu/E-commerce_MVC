<?php
$process = isset($_GET['process']) ? $_GET['process'] : 'index';
$db = new DB();

switch ($process) {
    case 'index':
        include_once '../Views/pages/shipping/index.php';
        break;
    case 'success':
        if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['order_id']) && !empty($_GET['order_id'])) {
            $id = $_GET['id'];
            $order_id = $_GET['order_id'];
            $update_success = $db->update('shipping', ['shipping_status' => 1], "id = $id");
            $update_status_order = $db->update('orders', ['status' => 3], "id = $order_id");
            echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=shipping&success=1"</script>';
        }else {
            echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=shipping&failed=1"</script>';
        }
        break;
    case 'failed':
        if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['order_id']) && !empty($_GET['order_id'])) {
            $id = $_GET['id'];
            $order_id = $_GET['order_id'];
            $update_failed = $db->update('shipping', ['shipping_status' => 2], "id = $id");
            $update_status_order = $db->update('orders', ['status' => 10], "id = $id");
            echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=shipping&success=1"</script>';
        }else {
            echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=shipping&failed=1"</script>';
        }
        break;
    case 'delete':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $db->delete($id, 'shipping');
            if ($delete) {
                echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=shipping&success=1"</script>';
            }
        }else {
            echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=shipping&failed=1"</script>';
        }
        break;
    default:
        include_once '../Views/pages/shipping/index.php';
}
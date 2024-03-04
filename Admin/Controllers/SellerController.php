<?php 
$process = isset($_GET['process']) ? $_GET['process'] : 'index';
$db = new DB();

switch ($process) {
    case 'index':
        include_once '../Views/pages/seller/index.php';
        break;
    case 'view':
        include_once '../Views/pages/seller/view.php';
        break;
    case 'confirm-delivery':
        if (isset($_POST['submit'])) {
            $id_order = $_POST['id_order'] ?? 0;
            $shipping_date = $_POST['shipping_date'] ?? '';
            $estimated_delivery_date = $_POST['estimated_delivery_date'] ?? '';

            if (!empty($id_order) && !empty($shipping_date) && !empty($estimated_delivery_date)) {
                $update_status = $db->update('orders', ['status' => 1], "id = $id_order");
                $data_shipping = [
                    'order_id' => $id_order,
                    'shipping_date' => $shipping_date,
                    'estimated_delivery_date' => $estimated_delivery_date,
                    'shipping_status' => 0,
                ];
                $insert_shipping = $db->insert('shipping', $data_shipping);
                if ($insert_shipping) {
                    echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=seller"</script>';
                }
            }else {
                echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=seller&empty=1"</script>';
            }
        }
        break;
    case 'delete':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $update = $db->update('orders', ['deleted_at' => date('Y-m-d H:i:s')], "id = $id");
            echo '<script>window.location.href = "http://localhost/ecommerce/admin/public/index.php?action=seller"</script>';
        }
        break;
    
    default:
        include_once '../Views/pages/seller/index.php';
        break;
}
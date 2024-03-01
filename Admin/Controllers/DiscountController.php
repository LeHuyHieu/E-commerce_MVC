<?php
$process = $_GET['process'] ?? 'index';
$db = new DB();
$tb_products = new Products();

switch ($process) {
    case 'index':
        include_once '../Views/pages/discount/index.php';
        break;
    case 'create':
        include_once '../Views/pages/discount/create.php';
        break;
    case 'store':
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? '';
            $discount_percent = $_POST['discount_percent'] ?? '';
            $active = $_POST['active'] ?? '';
            $description = $_POST['description'] ?? '';

            if (!empty($name) && !empty($discount_percent) && !empty($description)) {
                $data = [
                    'name' => $name,
                    'discount_percent' => $discount_percent,
                    'active' => !empty($active) ? 1 : 0,
                    'description' => $description,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $insert = $db->insert('discounts', $data);
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=discount&insert-success=1"/>';
            }else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=discount&process=create&empty=1"/>';
            }
        }
        break;
    case 'edit':
        include_once '../Views/pages/discount/edit.php';
        break;
    case 'update':
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? '';
            $discount_percent = $_POST['discount_percent'] ?? '';
            $active = $_POST['active'] ?? '';
            $description = $_POST['description'] ?? '';
            $id = $_POST['id'] ?? '';

            if (!empty($name) && !empty($discount_percent) && !empty($description) && !empty($id)) {
                $data = [
                    'name' => $name,
                    'discount_percent' => $discount_percent,
                    'active' => !empty($active) ? 1 : 0,
                    'description' => $description,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $update = $db->update('discounts', $data, "id = $id");
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=discount&update-success=1"/>';
            }else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=discount&process=edit&empty=1"/>';
            }
        }
        break;
    case 'delete':

        break;
    default:
        include_once '../Views/pages/discount/index.php';
        break;
}

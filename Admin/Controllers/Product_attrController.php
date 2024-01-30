<?php
$process = isset($_GET['process']) ? $_GET['process'] : 'index';
$tb_products = new Products();
$db = new DB();

switch ($process) {
    case 'index':
        include_once '../Views/pages/product_attr/index.php';
        break;
    case 'create':
        include_once '../Views/pages/product_attr/create.php';
        break;
    case 'store':
        if (isset($_POST['submit'])) {
            if ($_POST['table'] == 'size') {
                $name = $_POST['name_size'];
                $data = [
                  'name' => $name
                ];
                $insert = $tb_products->insertAttrSize($data);
                if ($insert) {
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=product_attr"/>';
                }
            }elseif ($_POST['table'] == 'color') {
                $name = $_POST['name_color'];
                $value = $_POST['value_color'];
                $data = [
                    'name' => $name,
                    'value' => $value
                ];
                $insert = $tb_products->insertAttrColor($data);
                if ($insert) {
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=product_attr"/>';
                }
            }
        }
        break;
    case 'edit_color':
        include_once '../Views/pages/product_attr/edit_color.php';
        break;
    case 'edit_size':
        include_once '../Views/pages/product_attr/edit_size.php';
        break;
    case 'update_color':
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name_color'];
            $value = $_POST['value_color'];
            $data = [
                'name' => $name,
                'value' => $value,
            ];
            $update = $db->update('color', $data, "id = $id");
            if ($update) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=product_attr"/>';
            }
        }
        break;
    case 'update_size':
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name_size'];
            $data = [
                'name' => $name,
            ];
            $update = $db->update('size', $data, "id = $id");
            if ($update) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=product_attr"/>';
            }
        }
        break;
    case 'delete_color':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $db->delete($id, 'color');
            if ($delete) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=product_attr"/>';
            }
        }
        break;
    case 'delete_size':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $db->delete($id, 'size');
            if ($delete) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=product_attr"/>';
            }
        }
        break;
    default:
        include_once '../Views/pages/product_attr/index.php';
        break;
}
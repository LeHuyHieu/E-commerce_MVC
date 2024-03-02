<?php
$process = isset($_GET['process']) ? $_GET['process'] : 'index';
$db = new DB();

switch ($process) {
    case 'index':
        include_once '../Views/pages/location/index.php';
        break;
    case 'create':
        include_once '../Views/pages/location/create.php';
        break;
    case 'store':
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? '';
            $city_id = $_POST['city_id'] ?? '';
            $created_at = date('Y-m-d H:i:s');
            if (!empty($name) && !empty($city_id)) {
                $data = [
                    'name' => $name,
                    'city_id' => $city_id,
                    'created_at' => $created_at
                ];
                $insert = $db->insert('location', $data);
                if ($insert) {
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=location&create-success=1"/>';
                }
            }else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=location&process=create&empty=1"/>';
            }
        }
        break;
    case 'edit':
        include_once '../Views/pages/location/edit.php';
        break;
    case 'update':
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? '';
            $city_id = $_POST['city_id'] ?? '';
            $id = $_POST['id'] ?? '';
            if (!empty($name) && !empty($city_id) && !empty($id)) {
                $data = [
                    'name' => $name,
                    'city_id' => $city_id,
                ];
                $update = $db->update('location', $data, "id = $id");
                if ($update) {
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=location&update-success=1"/>';
                }
            }else {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=location&process=edit&empty=1"/>';
            }
        }
        break;
    case 'delete':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $delete = $db->delete($id, "location");
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=location&delete-success=1"/>';
        }
        break;
    default:
        include_once '../Views/pages/location/index.php';
        break;
}
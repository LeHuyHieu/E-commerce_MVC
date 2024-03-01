<?php
$process = isset($_GET['process']) ? $_GET['process'] : 'index';
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
            $title = $_POST['title'] ?? '';
            $event = $_POST['event'] ?? '';
            $starting_at = $_POST['starting_at'] ?? 0;
            $data = [];
            $status = true;
            
            if (isset($_FILES['background']) && basename($_FILES["background"]["name"]) != '') {
                $target_dir = "uploads/banners/";
                $fileName = time() . '_' . basename($_FILES["background"]["name"]);
                $data += ['background' => $fileName];
                $targetFile   = $target_dir . $fileName;
                $allowUpload   = true;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "svg") {
                    echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                    $allowUpload   = false;
                }

                if (file_exists($targetFile)) {
                    echo "Sorry, a file with that name already exists.";
                    $allowUpload = false;
                }
                if ($allowUpload) {
                    if (move_uploaded_file($_FILES['background']['tmp_name'], $targetFile)) {
                        echo "The file " . htmlspecialchars(basename($_FILES['background']['name'])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }

            if (empty($title) || empty($event) || empty($starting_at)) {
                $status = false;
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=banner&process=create&empty=1"/>';
            }else {
                $data += [
                    'title' => $title,
                    'event' => $event,
                    'starting_at' => $starting_at,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            
            if ($status) {
                $insert = $db->insert('banner', $data);
            }
            if ($insert) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=banner&insert-success=1"/>';
            }
        }
        break;
    case 'edit':
        include_once '../Views/pages/banner/edit.php';
        break;
    case 'update':
        if (isset($_POST['submit'])) {
            $title = $_POST['title'] ?? '';
            $event = $_POST['event'] ?? '';
            $starting_at = $_POST['starting_at'] ?? 0;
            $id = $_POST['id'] ?? '';
            $data = [];
            
            if (empty($title) || empty($event) || empty($starting_at) || empty($id)) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=banner&process=create&empty=1"/>';
            }
            if (isset($_FILES['background']) && basename($_FILES["background"]["name"]) != '') {
                $target_dir = "uploads/banners/";
                $fileName = time() . '_' . basename($_FILES["background"]["name"]);
                $data += ['background' => $fileName];
                $targetFile   = $target_dir . $fileName;
                $allowUpload   = true;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "svg") {
                    echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                    $allowUpload   = false;
                }

                if (file_exists($targetFile)) {
                    echo "Sorry, a file with that name already exists.";
                    $allowUpload = false;
                }
                if ($allowUpload) {
                    if (move_uploaded_file($_FILES['background']['tmp_name'], $targetFile)) {
                        echo "The file " . htmlspecialchars(basename($_FILES['background']['name'])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            $data += [
                'title' => $title,
                'event' => $event,
                'starting_at' => $starting_at,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $insert = $db->update('banner', $data, "id = $id");
            if ($insert) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=banner&insert-success=1"/>';
            }
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

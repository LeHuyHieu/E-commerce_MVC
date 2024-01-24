<?php
$process = $_GET['process'] ?? 'categories';

switch ($process) {
    case 'categories':
        include_once '../Views/pages/categories/index.php';
        break;
    case 'create':
        include_once '../Views/pages/categories/create.php';
        break;
    case 'store':
        $data = [];
        $tb_categories = new Categories();
        if (isset($_POST['submit'])) {
            $categoryName = $_POST['name'] ?? '';
            $parentId = $_POST['parent_id'] ?? 0;
            if ($categoryName == '') {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=categories&process=create&data-empty=1"/>';
            }
            if (isset($_FILES['banner_image']) && basename($_FILES["banner_image"]["name"]) != '') {
                $target_dir = "uploads/categories/";
                $fileName = time() . '_' . basename($_FILES["banner_image"]["name"]);
                $data += ['banner_image' => $fileName];
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
                    if (move_uploaded_file($_FILES['banner_image']['tmp_name'], $targetFile)) {
                        echo "The file " . htmlspecialchars(basename($_FILES['banner_image']['name'])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            $data += [
                'name' => $categoryName,
                'parent_id' => $parentId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $insert = $tb_categories->insertCategory($data);
            if ($insert) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=categories&insert-success=1"/>';
            }
        }
        break;
    case 'edit':
        include_once '../Views/pages/categories/edit.php';
        break;
    case 'update':
        $data = [];
        $tb_categories = new Categories();
        if (isset($_POST['submit'])) {
            $nameCategory = $_POST['name'] ?? '';
            $parentId = $_POST['parent_id'] ?? '';
            $id = $_POST['id'] ?? 0;
            if (isset($_FILES['banner_image']) && basename($_FILES["banner_image"]["name"]) != '') {
                //delete file db
                $category = $tb_categories->getCategoryEdit($id);
                $public = 'uploads/categories/';
                $file_name_db = $category['banner_image'];
                $files = glob($public . '/*');

                foreach ($files as $file) {
                    if (is_file($file) && basename($file) === $file_name_db) {
                        if (unlink($file)) {
                            echo 'File đã được xóa thành công.';
                        } else {
                            echo 'Không thể xóa file.';
                        }
                        break;
                    }
                }

                $target_dir = "uploads/categories/";
                $fileName = time() . '_' . basename($_FILES["banner_image"]["name"]);
                $data += ['banner_image' => $fileName];
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
                    if (move_uploaded_file($_FILES['banner_image']['tmp_name'], $targetFile)) {
                        echo "The file " . htmlspecialchars(basename($_FILES['banner_image']['name'])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            $data += [
                'name' => $nameCategory,
                'parent_id' => $parentId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $condition = "id = $id";
            $update = $tb_categories->updateCategory($data, $condition);
            if ($update) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=categories&update-success=1"/>';
            }
        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $tb_categories = new Categories();
            $delete = $tb_categories->deleteCategory($id);
            if ($delete) {
                echo '<script> window.location.href = document.referrer; </script>';
            }
        }
        break;
    default:
        include_once '../Views/pages/categories/index.php';
        break;
}

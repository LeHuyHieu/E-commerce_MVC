<?php
$process = $_GET['process'] ?? 'index';
$db = new DB();

switch ($process){
    case 'index':
        include_once '../Views/pages/products/index.php';
        break;
    case 'create':
        include_once '../Views/pages/products/create.php';
        break;
    case 'store':
        if (isset($_POST['submit'])) {
            $title = $_POST['title'] ?? '';
            $category_id = $_POST['categories'] ?? 0;
            $discount_id = $_POST['discont_id'] ?? 0;
            $description = $_POST['description'] ?? '';
            $product_hot = $_POST['product_hot'] ?? 0;
            $data = [
                'title' => $title,
                'category_id' => $category_id,
                'discount_id' => $discount_id,
                'description' => $description,
                'product_hot' => $product_hot,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $insert_product = $db->insert('products',$data);
            $product_id = $db->lastInsertId();

            $data_image = [];
            $data_detail = [];
            if (isset($_FILES['product_images']) && !empty($_FILES["product_images"]["name"])) {
                $target_dir = "uploads/products/list_image_product/";

                foreach ($_FILES["product_images"]["name"] as $key => $image_name) {
                    $fileName = time() . '_' . $image_name;
                    $data_image = ['image' => $fileName, 'product_id' => $product_id, 'created_at' => date('Y-m-d H:i:s')];
                    $insert_image_product = $db->insert('product_images', $data_image);
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
                        if (move_uploaded_file($_FILES['product_images']['tmp_name'][$key], $targetFile)) {
                            echo "The file has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
            }
            $array_details_product = [];
            if (isset($_POST['detail_product']) && $_POST['detail_product']) {
                foreach ($_POST['detail_product'] as $key => $values) {
                    foreach ($values as $index => $value) {
                        if ($key === 'price') {
                            $value = intval(str_replace(array(',', ' VND'), '', $value));
                        }
                        $array_details_product[$index][$key] = $value;
                        $array_details_product[$index]['product_id'] = $product_id;
                    }
                }
            }
            $data_image = [];
            if (isset($_FILES['detail_product']) && $_FILES["detail_product"]['name']['image_color_product'] != '') {
                $target_dir = "uploads/products/product_color/";
                foreach ($_FILES["detail_product"]['name']['image_color_product'] as $key => $image_color) {
                    $fileName = time() . '_' . $image_color;
                    $data_image[$key] = ['image_product' => $fileName];
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
                        if (move_uploaded_file($_FILES['detail_product']['tmp_name']['image_color_product'][$key], $targetFile)) {
                            echo "The file has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
            }
            $data_details = [];
            foreach ($array_details_product as $key => $item) {
                $data_details[$key] = $data_image[$key] + $item;
            }
            $query = '';
            $flag = false;
            foreach ($data_details as $data_item) {
                $data_item['created_at'] = date('Y-m-d H:i:s');
                $flag = $db->insert('detail_product', $data_item);
            }
            if ($flag) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=products&insert-success=1"/>';
            }
        }
        break;
    case 'edit':
        include_once '../Views/pages/products/edit.php';
        break;
    case 'update':

        break;
    case 'delete':

        break;
    default:
        include_once '../Views/pages/products/index.php';
        break;
}
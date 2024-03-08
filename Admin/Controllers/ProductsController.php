<?php
$process = $_GET['process'] ?? 'index';
$db = new DB();
$tb_products = new Products();

switch ($process) {
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
            $insert_product = $db->insert('products', $data);
            $product_id = $db->lastInsertId();

            //insert product sale
            $time_sale = $_POST['time_sale'] ?? '';
            if (!empty($time_sale)) {
                $active = 1;
                $data_product_sale = [
                    'time_sale' => $time_sale,
                    'product_id' => $product_id,
                    'active' => $active,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $insert_product_sale = $db->insert('product_sale', $data_product_sale);
            }

            $data_image = [];
            $data_detail = [];
            if (isset($_FILES['product_images']) && !empty($_FILES["product_images"]["name"])) {
                $target_dir = "uploads/products/";

                foreach ($_FILES["product_images"]["name"] as $key => $image_name) {
                    $fileName = time() . '_' . $image_name;
                    $data_image = ['image' => $fileName, 'product_id' => $product_id, 'created_at' => date('Y-m-d H:i:s')];
                    $insert_image_product = $db->insert('product_images', $data_image);
                    $targetFile   = $target_dir . $fileName;
                    $targetFileFrontend   = dirname(dirname(dirname(__FILE__))).'/User/Public/images/uploads/'.$fileName;
                    $allowUpload   = true;
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" && $imageFileType != "gif" && $imageFileType != "svg") {
                        echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                        $allowUpload   = false;
                    }

                    if (file_exists($targetFile)) {
                        echo "Sorry, a file with that name already exists.";
                        $allowUpload = false;
                    }

                    if ($allowUpload) {
                        if (move_uploaded_file($_FILES['product_images']['tmp_name'][$key], $targetFile)) {
                            copy($targetFile, $targetFileFrontend);
                            echo "The file has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file." . error_get_last()['message'];
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
                $target_dir = "uploads/products/";
                foreach ($_FILES["detail_product"]['name']['image_color_product'] as $key => $image_color) {
                    $fileName = time() . '_' . $image_color;
                    $data_image[$key] = ['image_product' => $fileName];
                    $targetFile   = $target_dir . $fileName;
                    $targetFileFrontend   = dirname(dirname(dirname(__FILE__))).'/User/Public/images/uploads/'.$fileName;
                    $allowUpload   = true;
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" && $imageFileType != "gif" && $imageFileType != "svg") {
                        echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                        $allowUpload   = false;
                    }

                    if (file_exists($targetFile)) {
                        echo "Sorry, a file with that name already exists.";
                        $allowUpload = false;
                    }

                    if ($allowUpload) {
                        if (move_uploaded_file($_FILES['detail_product']['tmp_name']['image_color_product'][$key], $targetFile)) {
                            copy($targetFile, $targetFileFrontend);
                            echo "The file has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file." . error_get_last()['message'];
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
        if (isset($_POST['submit'])) {
            $id = $_POST['id'] ?? 0;
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
                'product_hot' => $product_hot
            ];
            $insert_product = $db->update('products', $data, "id = $id");

            $time_sale = $_POST['time_sale'] ?? '';
            if (empty($time_sale)) {
                $update_product_sale = $db->update('product_sale', ['active' => 0], "product_id = $id");
            } else {
                $update_product_sale = $db->update('product_sale', ['time_sale' => $time_sale, 'active' => 1], "product_id = $id");
            }

            $data_image = [];
            $data_detail = [];
            $product_images = $_POST['product_images'] ?? array();
            $target_dir = "uploads/products/";
            if (isset($_FILES['product_images'])) {
                foreach ($_FILES["product_images"]["name"] as $key => $image_name) {
                    if (!empty($_FILES["product_images"]["name"][$key])) {
                        $products = $db->find($product_images[$key], 'product_images');
                        $public = 'uploads/products/';
                        $file_name_db = $products['image'];
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

                        $fileName = time() . '_' . $image_name;
                        $data_image = ['image' => $fileName];
                        $insert_image_product = $db->update('product_images', $data_image, "id = $product_images[$key]");
                        $targetFile   = $target_dir . $fileName;
                        $targetFileFrontend   = dirname(dirname(dirname(__FILE__))).'/User/Public/images/uploads/'.$fileName;
                        $allowUpload   = true;
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" && $imageFileType != "gif" && $imageFileType != "svg") {
                            echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                            $allowUpload   = false;
                        }

                        if (file_exists($targetFile)) {
                            echo "Sorry, a file with that name already exists.";
                            $allowUpload = false;
                        }

                        if ($allowUpload) {
                            if (move_uploaded_file($_FILES['product_images']['tmp_name'][$key], $targetFile)) {
                                copy($targetFile, $targetFileFrontend);
                                echo "The file has been uploaded.";
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
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
                        $array_details_product[$index]['product_id'] = $id;
                    }
                }
            }
            $data_image_color_product = [];
            $detail_product_id = $_POST['detail_product']['id'];
            if (isset($_FILES['detail_product'])) {
                $target_dir = "uploads/products/";
                foreach ($_FILES["detail_product"]['name']['image_color_product'] as $key => $image_color) {
                    if (!empty($_FILES["detail_product"]['name']['image_color_product'][$key])) {
                        $products = $db->find($detail_product_id[$key], 'detail_product');
                        $public = 'uploads/products/';
                        $file_name_db = $products['image_product'];
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

                        $fileName = time() . '_' . $image_color;
                        $data_image_color_product[$key] = ['image_product' => $fileName];
                        $targetFile   = $target_dir . $fileName;
                        $targetFileFrontend   = dirname(dirname(dirname(__FILE__))).'/User/Public/images/uploads/'.$fileName;
                        $allowUpload   = true;
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" && $imageFileType != "gif" && $imageFileType != "svg") {
                            echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
                            $allowUpload   = false;
                        }

                        if (file_exists($targetFile)) {
                            echo "Sorry, a file with that name already exists.";
                            $allowUpload = false;
                        }

                        if ($allowUpload) {
                            if (move_uploaded_file($_FILES['detail_product']['tmp_name']['image_color_product'][$key], $targetFile)) {
                                copy($targetFile, $targetFileFrontend);
                                echo "The file has been uploaded.";
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    }
                }
            }
            $data_details = [];
            foreach ($array_details_product as $key => $item) {
                unset($item['id']);
                if (isset($data_image_color_product[$key]) && !empty($data_image_color_product[$key])) {
                    $data_details[$key] = $data_image_color_product[$key] + $item;
                } else {
                    $data_details[$key] = $item;
                }
            }
            $query = '';
            $flag = false;
            foreach ($data_details as $key => $data_item) {
                $flag = $db->update('detail_product', $data_item, "id = $detail_product_id[$key]");
            }
            if ($flag) {
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=products&update-success=1"/>';
            }
        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = [
                'deleted_at' => date('Y-m-d H:i:s'),
            ];
            $update = $db->update('products', $data, "id = $id");
            if ($update) {
                echo '<script> window.location.href = document.referrer; </script>';
            }
        }
        break;
    case 'delete_list_image_item':
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $delete = $db->delete($id, 'product_images');
            if ($delete) {
                echo "Delete successfully";
            }
        }
        break;
    case 'delete_item_detail':
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $delete = $db->delete($id, 'detail_product');
            if ($delete) {
                echo "Delete successfully";
            }
        }
        break;
    default:
        include_once '../Views/pages/products/index.php';
        break;
}

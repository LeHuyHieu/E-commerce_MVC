<?php
$handel = isset($_GET['handel']) ? $_GET['handel'] : 'cart';
// unset($_SESSION['cart']);
// print_r($_SESSION['cart']);

switch ($handel) {
    case 'cart':
        include_once './Views/pages/cart.php';
        break;
    case 'cart_process':
        if (isset($_POST['submit'])) {
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 1;
            $size_id = isset($_POST['size_id']) ? $_POST['size_id'] : 1;
            $color_id = isset($_POST['color_id']) ? $_POST['color_id'] : 1;
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
            $cart_db = new Cart();
            $cart = $cart_db->addCart($product_id, $size_id, $color_id, $quantity);
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=cart"/>';
        }
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=cart"/>';
        break;
    case 'delete_cart':
        if (isset($_GET['id'])) {
            if (!isset($_SESSION['user'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }else {
                $cart_db = new Cart();
                $cart_db->deleteCart($_GET['id']);
            }
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=cart"/>';
        }
        break;
    case 'cart_update':
        if (isset($_POST['submit'])) {
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 1;
            $size_id = isset($_POST['size_id']) ? $_POST['size_id'] : 1;
            $color_id = isset($_POST['color_id']) ? $_POST['color_id'] : 1;
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
            $cart_db = new Cart();
            if (!isset($_SESSION['user'])) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['product_id'] == $product_id && $item['size_id'] == $size_id && $item['color_id'] == $color_id) {
                        $cart_db->updateCart($key, $quantity);
                    }
                }
            }else {
                $cart = $cart_db->getCart($product_id, $color_id, $size_id);
                $list_cart = $cart->fetchAll();
                foreach ($list_cart as $cart_item) {
                    if ($cart_item['product_id'] == $product_id && $cart_item['size_id'] == $size_id && $cart_item['color_id'] == $color_id) {
                        $cart_db->updateCartDB($quantity, $cart_item['price'], $cart_item['discount_percent'] ,$cart_item['id']);
                    }
                }
            }
            echo '<meta http-equiv="refresh" content="0;url=index.php?action=cart"/>';
        }
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=cart"/>';
        break;
    default:
        include_once './Views/pages/cart.php';  
        break;
}
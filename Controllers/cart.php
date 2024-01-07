<?php
$handel = isset($_GET['handel']) ? $_GET['handel'] : 'cart';

switch ($handel) {
    case 'cart':
        include_once './Views/pages/cart.php';
        break;
    case 'cart_process':
        print_r($_POST);
        if (isset($_POST['submit'])) {
            $product_id = $_POST['product_id'];
            $size_id = $_POST['size_id'];
            $color_id = $_POST['color_id'];
            $cart_db = new Cart();
            $cart = $cart_db->addCart($product_id, $size_id, $color_id);
        }
        include_once './Views/pages/cart.php';
        break;
    default:
        include_once './Views/pages/cart.php';  
        break;
}
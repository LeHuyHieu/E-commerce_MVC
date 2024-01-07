<?php 

$handel = isset($_GET['handel']) ? $_GET['handel'] : '';

switch ($handel) {
    case 'home_process':
        if (isset($_POST['product_id']) && isset($_POST['color_id'])) {
            include_once './Views/pages/ajax/load_size_product.php';
        }
        break;
    
    default:
        include_once "./Views/pages/home.php";
        break;
}
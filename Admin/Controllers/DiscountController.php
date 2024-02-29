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

        break;
    case 'edit':
        include_once '../Views/pages/discount/edit.php';
        break;
    case 'update':

        break;
    case 'delete':

        break;
    default:
        include_once '../Views/pages/discount/index.php';
        break;
}
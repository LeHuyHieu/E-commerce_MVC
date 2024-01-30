<?php
$process = $_GET['process'] ?? 'index';

switch ($process){
    case 'index':
        include_once '../Views/pages/products/index.php';
        break;
    case 'create':
        include_once '../Views/pages/products/create.php';
        break;
    case 'store':

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
<?php 
$handel = (isset($_GET['handel'])) ? $_GET['handel'] : 'checkout';

switch ($handel) {
    case 'checkout':
        include_once './Views/pages/checkout.php';
        break;
    
    case 'checkout_process':
        if (isset($_POST['submit'])) {
            $city = $_POST['city'];
            $district = $_POST['district'];
            $fullname = $_POST['fullname'];
            $shipping_address = $_POST['shipping_address'];
            $email_address = $_POST['email_address'];
            $phone_number = $_POST['phone_number'];
            $note = isset($_POST['note']) ? $_POST['note'] : '';
            $total_amount = $_POST['total_amount'];
            $user_id = $_SESSION['user']['user_id'];
            $data = [];
            // print_r($_POST);die;
            if ($city == '' || $district == '' || $fullname == '' || $shipping_address == '' || $email_address == '' || $phone_number == '') {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=checkout&data_empty=1">';
            }else {
                $order_db  = new Orders();
                $cart_db = new Cart();
                $check_isset_order = $order_db->getUserOrder($user_id);
                $data['user_id'] = $user_id;
                $data['fullname'] = $fullname;
                $data['email_address'] = $email_address;
                $data['shipping_address'] = $shipping_address;
                $data['city'] = $city;
                $data['district'] = $district;
                $data['phone_number'] = $phone_number;
                $data['total_amount'] = $total_amount;
                // echo ($check_isset_order == '') ? 1 : 0;die;
                if ($check_isset_order == '') {
                    $order_db->insertOrder($data);
                    $check_insert_order = $order_db->getUserOrder($user_id);
                    if ($check_insert_order != '') {
                        $list_user_order = $order_db->getProductOrder($user_id)->fetchAll();
                        $data_detail['order_id'] = $check_insert_order['id'];
                        foreach ($list_user_order as $item) {
                            $data_detail['title'] = $item['title'];
                            $data_detail['quantity'] = $item['quantity'];
                            $data_detail['unit_price'] = $item['total'];
                            $data_detail['product_id'] = $item['product_id'];
                            $data_detail['size_name'] = $item['size_name'];
                            $data_detail['color_name'] = $item['color_name'];
                            $data_detail['note'] = $note; 
                            $check = $order_db->insertOrderDetail($data_detail);
                            if ($check) {
                                $count_quantity = $cart->getQuantity($item['product_id'], $item['size_id'], $item['color_id']);
                                $order_db->updateProductDetailQuantity($item['product_id'], $item['size_id'], $item['color_id'], $item['quantity'], $count_quantity['quantity']);
                                $cart_db->deleteCart($item['cart_id']);
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0; url=index.php?action=checkout&success=1">';
                    }
                }else {
                    $order_db->updateOrder($data);
                }
            }
        }
        break;

    case 'get_district':
        include_once './Views/pages/ajax/load_district.php';
        break;

    default:
        include_once './Views/pages/checkout.php';
        break;
}
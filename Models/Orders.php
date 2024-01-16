<?php
class Orders {
    function getCity() {
        $db = new Connect();
        $select = "SELECT id, name from location WHERE city_id = 0";
        $result = $db->getList($select)->fetchAll();
        return $result;
    }

    function getDistrict($id) {
        $db = new Connect();
        $select = "SELECT id, name from location WHERE city_id = $id";
        $result = $db->getList($select)->fetchAll();
        return $result;
    }

    function getLocation($id) {
        $db = new Connect();
        $select = "SELECT name from location where id = $id";
        $result = $db->getInstance($select);
        return $result;
    }

    function getUser($user_id) {
        $db = new Connect();
        $select = "SELECT DISTINCT email,fullname,address,phone FROM users WHERE id = $user_id";
        $result = $db->getInstance($select);
        return $result;
    }

    function getProductOrder($user_id) {
        $db = new Connect();
        $select = "SELECT title, quantity,total, product_id, size_id, color_id, cart.id as cart_id, size.name AS size_name, color.name AS color_name FROM cart LEFT JOIN size ON size.id = cart.size_id LEFT JOIN color ON color.id = cart.color_id WHERE user_id = $user_id";
        $result = $db->getList($select);
        return $result;
    }

    function getUserOrder($user_id) {
        $db = new Connect();
        $select = "SELECT id FROM orders WHERE user_id = $user_id";
        $result = $db->getInstance($select);
        return $result;
    }

    function updateProductDetailQuantity($product_id, $size_id, $color_id, $quantity, $count_quantity) {
        $qtity = $count_quantity - $quantity;
        $db = new Connect();
        $query = "UPDATE detail_product SET quantity = $qtity WHERE product_id = $product_id AND size_id = $size_id AND color_id = $color_id";
        $result = $db->exec($query);
        return $result;
    }

    function insertOrder($data) {
        $db = new Connect();
        $fullname = $data['fullname'];
        $email_address = $data['email_address'];
        $shipping_address = $data['shipping_address'];
        $city = $data['city'];
        $district = $data['district'];
        $phone_number = $data['phone_number'];
        $user_id = $data['user_id'];
        $total_amount = $data['total_amount'];
        $code_order = $data['code_order'];
        $status = 0;

        $query = "INSERT INTO orders (user_id, fullname, email_address, shipping_address, city, district, phone_number, total_amount, order_date, code_order, status) 
                    VALUES ($user_id, '$fullname', '$email_address', '$shipping_address', '$city', '$district', '$phone_number', $total_amount, NOW(), '$code_order', $status)";
        $result = $db->exec($query);
        $result = $db->lastInsertId();
        return $result;
    }

    // function updateOrder($data) {
    //     $db = new Connect();
    //     $fullname = $data['fullname'];
    //     $email_address = $data['email_address'];
    //     $shipping_address = $data['shipping_address'];
    //     $city = $data['city'];
    //     $district = $data['district'];
    //     $phone_number = $data['phone_number'];
    //     $user_id = $data['user_id'];
    //     $total_amount = $data['total_amount'];

    //     $query = "UPDATE orders SET fullname = '$fullname', email_address = '$email_address', shipping_address = '$shipping_address', city = '$city', district = '$district',  total_amount = $total_amount, phone_number = $phone_number WHERE user_id = $user_id";
    //     $result = $db->exec($query);
    //     return $result;
    // }

    function insertOrderDetail($data) {
        $db = new Connect();
        $order_id = $data['order_id'];
        $product_id = $data['product_id'];
        $note = $data['note'];
        $title = $data['title'];
        $size_name = $data['size_name'];
        $color_name = $data['color_name'];
        $quantity = $data['quantity'];
        $unit_price = $data['unit_price'];

        $query = "INSERT INTO order_details (order_id, product_id, note, title, size_name, color_name, quantity, unit_price) 
                VALUES ($order_id, $product_id, '$note', '$title', '$size_name', '$color_name', $quantity, $unit_price)";
        $result = $db->exec($query);
        return $result;
    }
}
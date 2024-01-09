<?php
class Cart 
{
    function addCart($product_id, $size_id, $color_id, $quantity) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $get_data = $this->getProductDataAddCart($product_id, $size_id, $color_id);
        if (!isset($_SESSION['user'])) {
            $flag = false;
            $total = 0;

            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['product_id'] == $product_id && $item['size_id'] == $size_id && $item['color_id'] == $color_id) {
                    $flag = true;
                    $this->updateCart($key, $quantity);
                }
            }

            if ($flag === false) {
                foreach ($get_data as $value) {
                    if ($value['discount_percent'] !== 0) {
                        $total = ($value['price'] - ($value['price'] * $value['discount_percent']) / 100) * $quantity;
                    }else {
                        $total = $value['price'] * $quantity;
                    }
                    $data = [
                        'product_id' => $product_id,
                        'size_id' => $size_id,
                        'color_id' => $color_id,
                        'title' => $value['title'],
                        'price' => $value['price'],
                        'discount_percent' => ($value['discount_percent'] === '') ? 0 : $value['discount_percent'],
                        'image' => $value['image_product'],
                        'quantity' => $quantity,
                        'user_id' => isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0,
                        'total' => $total,
                    ];
                }
                $_SESSION['cart'][] = $data;
            }
        }else {
            $cart = $this->getCart($product_id, $color_id, $size_id);
            $total = 0;
            foreach ($get_data as $value) {
                if ($cart->rowCount() == 0) {
                    if ($value['discount_percent'] !== 0) {
                        $total = ($value['price'] - ($value['price'] * $value['discount_percent']) / 100) * $quantity;
                    }else {
                        $total = $value['price'] * $quantity;
                    }
                    $data = [
                        'product_id' => $product_id,
                        'size_id' => $size_id,
                        'color_id' => $color_id,
                        'title' => $value['title'],
                        'price' => $value['price'],
                        'discount_percent' => ($value['discount_percent'] == '') ? 0 : $value['discount_percent'],
                        'image' => $value['image_product'],
                        'quantity' => $quantity,
                        'user_id' => isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0,
                        'total' => $total,
                    ];
                    $check_insert_acrt = $this->insertCart($data);
                    $flag = true;
                }else {
                    $list_cart = $cart->fetchAll();
                    foreach ($list_cart as $cart_item) {
                        if ($cart_item['product_id'] == $product_id && $cart_item['size_id'] == $size_id && $cart_item['color_id'] == $color_id) {
                            $this->updateCartDB($quantity, $cart_item['price'], $cart_item['discount_percent'] ,$cart_item['id']);
                        }
                    }
                }
            }
        }
    }

    function getProductDataAddCart($product_id, $size_id, $color_id) {
        $db = new Connect();
        $select = "SELECT title, price, image_product, discount_percent
                    FROM products
                    LEFT JOIN detail_product ON detail_product.product_id = products.id
                    LEFT JOIN discounts ON discounts.id = products.discount_id
                    WHERE detail_product.product_id = $product_id AND detail_product.size_id = $size_id AND detail_product.color_id = $color_id";
        $result = $db->getList($select)->fetchAll();
        return $result;
    }

    function updateCart($index, $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$index]);
        }else {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
            $totalnew = $_SESSION['cart'][$index]['quantity'] * ($_SESSION['cart'][$index]['price'] - ($_SESSION['cart'][$index]['price'] * $_SESSION['cart'][$index]['discount_percent']) / 100);
            $_SESSION['cart'][$index]['total'] = $totalnew;
        }
    }

    function subTotal() {
        $subtotal = 0;
        $db = new Connect();
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['user_id'];
            $query = "SELECT SUM(total) AS subtotal FROM cart WHERE user_id = $user_id";
            $result = $db->getInstance($query);
            $subtotal = $result['subtotal'];
        }else {
            foreach ($_SESSION['cart'] as $cart) {
                $subtotal += $cart['total'];
            }
        }
        return $subtotal;
    }

    function insertCart($data) {
        $product_id = ($data['product_id'] != '') ? $data['product_id'] : 0;
        $size_id = ($data['size_id'] != '') ? $data['size_id'] : 0;
        $color_id = ($data['color_id'] != '') ? $data['color_id'] : 0;
        $title = ($data['title'] != '') ? $data['title'] : '';
        $image = ($data['image'] != '') ? $data['image'] : '';
        $price = ($data['price'] != '') ? $data['price'] : 0;
        $quantity = ($data['quantity'] != '') ? $data['quantity'] : 0;
        $user_id = ($data['user_id'] != '') ? $data['user_id'] : 0;
        $discount_percent = ($data['discount_percent'] != '') ? $data['discount_percent'] : 0;
        $total = ($data['total'] != '') ? $data['total'] : 0;
        $db = new Connect();
        $query = "INSERT INTO cart (title, product_id, user_id, size_id, color_id, images, price, quantity, discount_percent, total) VALUES ('$title', $product_id, $user_id, $size_id, $color_id, '$image', $price, $quantity, $discount_percent, $total)";
        $result = $db->exec($query);
        return $result;
    }

    function getCart($product_id, $color_id, $size_id) {
        $db = new Connect();
        $select = "SELECT DISTINCT product_id, size_id, color_id, id, price, discount_percent, quantity FROM cart WHERE product_id = $product_id AND size_id = $size_id AND color_id = $color_id";
        $result = $db->getList($select);
        return $result;
    }

    function updateCartDB($quantity, $price, $discount_percent, $cart_id) {
        $db = new Connect();
        if ($discount_percent !== '') {
            $total = ($price - ($price * $discount_percent) / 100) * $quantity;
        }else {
            $total = $price * $quantity;
        }
        if ($quantity > 0) {
            $query = "UPDATE cart SET quantity = $quantity, total = $total WHERE id = $cart_id";
        }else {
            $query = "DELETE FROM cart WHERE id = $cart_id";
        }
        $result = $db->exec($query);
        return $result;
    }

    function deleteCart($id) {
        $db = new Connect();
        $query = "DELETE FROM cart WHERE id = $id";
        $result = $db->exec($query);
        return $result;
    }

    function getListCartUser ($user_id) {
        $db = new Connect();
        $select = "SELECT title, product_id, size_id, color_id, discount_percent, images, price, total, quantity, id FROM cart WHERE user_id = $user_id";
        $result = $db->getList($select);
        return $result;
    }

    function getQuantity($product_id, $size_id, $color_id) {
        $db = new Connect();
        $select = "SELECT DISTINCT quantity from detail_product where product_id = $product_id and size_id = $size_id and color_id = $color_id";
        $result = $db->getInstance($select);
        return $result;
    }
}
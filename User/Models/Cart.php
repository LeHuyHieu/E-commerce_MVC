<?php
class Cart extends Connect
{
    private $db;
    public function __construct()
    {
        $this->db = new Connect();
    }

    public function addCart($product_id, $size_id, $color_id, $quantity)
    {
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
                    $quantity += $_SESSION['cart'][$key]['quantity'];
                    $this->updateCart($key, $quantity);
                }
            }

            if ($flag === false) {
                foreach ($get_data as $value) {
                    if ($value['discount_percent'] !== 0) {
                        $total = ($value['price'] - ($value['price'] * $value['discount_percent']) / 100) * $quantity;
                    } else {
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
        } else {
            $cart = $this->getCart($product_id, $color_id, $size_id);
            $total = 0;
            foreach ($get_data as $value) {
                if ($cart->rowCount() == 0) {
                    if ($value['discount_percent'] !== 0) {
                        $total = ($value['price'] - ($value['price'] * $value['discount_percent']) / 100) * $quantity;
                    } else {
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
                    $this->insertCart($data);
                    $flag = true;
                } else {
                    $list_cart = $cart->fetchAll();
                    foreach ($list_cart as $cart_item) {
                        if ($cart_item['product_id'] == $product_id && $cart_item['size_id'] == $size_id && $cart_item['color_id'] == $color_id) {
                            $quantity += $cart_item['quantity'];
                            $this->updateCartDB($quantity, $cart_item['price'], $cart_item['discount_percent'], $cart_item['id']);
                        }
                    }
                }
            }
        }
    }

    //update data
    public function updateCartDB($quantity, $price, $discount_percent, $cart_id)
    {
        if ($discount_percent !== '') {
            $total = ($price - ($price * $discount_percent) / 100) * $quantity;
        } else {
            $total = $price * $quantity;
        }
        if ($quantity > 0) {
            $query = "UPDATE cart SET quantity = $quantity, total = $total WHERE id = $cart_id";
        } else {
            $query = "DELETE FROM cart WHERE id = $cart_id";
        }
        $result = $this->db->exec($query);
        return $result;
    }

    public function updateCart($index, $quantity)
    {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$index]);
        } else {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
            $totalnew = $_SESSION['cart'][$index]['quantity'] * ($_SESSION['cart'][$index]['price'] - ($_SESSION['cart'][$index]['price'] * $_SESSION['cart'][$index]['discount_percent']) / 100);
            $_SESSION['cart'][$index]['total'] = $totalnew;
        }
    }

    public function subTotal()
    {
        $subtotal = 0;
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['user_id'];
            $query = "SELECT SUM(total) AS subtotal FROM cart WHERE user_id = $user_id";
            $result = $this->db->getInstance($query);
            $subtotal = $result['subtotal'];
        } else {
            foreach ($_SESSION['cart'] as $cart) {
                $subtotal += $cart['total'];
            }
        }
        return $subtotal;
    }

    //delete data
    public function deleteCart($id)
    {
        $query = "DELETE FROM cart WHERE id = $id";
        $result = $this->db->exec($query);
        return $result;
    }

    //insert data
    public function insertCart($data)
    {
        $result = $this->db->insert('cart', $data);
        return $result;
    }

    public function insertCartUserLogin() {
        $flag = false;
        if (isset($_SESSION['user']) && isset($_SESSION['cart'])) {
            $user_id = $_SESSION['user']['user_id'];
            foreach ($_SESSION['cart'] as $key => $value) {
                $_SESSION['cart'][$key]['user_id'] = $user_id;
                $_SESSION['cart'][$key]['discount_percent'] = ($_SESSION['cart'][$key]['discount_percent'] === '') ? 0 : $_SESSION['cart'][$key]['discount_percent'];
                $cart = $this->getCart($value['product_id'], $value['color_id'], $value['size_id']);
                if ($cart->rowCount() == 0) {
                    $this->insertCart($_SESSION['cart'][$key]);
                    $flag = true;
                }else {
                    $list_cart = $cart->fetchAll();
                    foreach ($list_cart as $cart_item) {
                        $check_update_cart = $cart_item['product_id'] == $value['product_id'] && $cart_item['size_id'] == $value['size_id'] && $cart_item['color_id'] == $value['color_id'] && $cart_item['discount_percent'] == $value['discount_percent'] && $cart_item['price'] == $value['price'];
                        if ($check_update_cart) {
                            $discount_percent = ($value['discount_percent'] === '') ? 0 : $value['discount_percent'];
                            $this->updateCartDB($value['quantity'], $value['price'], $discount_percent, $cart_item['id']);
                            $flag = true;
                        }
                    }
                }
            }
        }
        return $flag;
    }

    //get data
    public function getListCartUser($user_id)
    {
        $select = "SELECT title, product_id, size_id, color_id, discount_percent, image, price, total, quantity, id FROM cart WHERE user_id = $user_id";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getQuantity($product_id, $size_id, $color_id)
    {
        $select = "SELECT DISTINCT quantity from detail_product where product_id = $product_id and size_id = $size_id and color_id = $color_id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getCart($product_id, $color_id, $size_id)
    {
        $select = "SELECT DISTINCT product_id, size_id, color_id, id, price, discount_percent, quantity FROM cart WHERE product_id = $product_id AND size_id = $size_id AND color_id = $color_id";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getProductDataAddCart($product_id, $size_id, $color_id)
    {
        $select = "SELECT title, price, image_product, discount_percent
                    FROM products
                    LEFT JOIN detail_product ON detail_product.product_id = products.id
                    LEFT JOIN discounts ON discounts.id = products.discount_id
                    WHERE detail_product.product_id = $product_id AND detail_product.size_id = $size_id AND detail_product.color_id = $color_id";
        $result = $this->db->getList($select)->fetchAll();
        return $result;
    }
}

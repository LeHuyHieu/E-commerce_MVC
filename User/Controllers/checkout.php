<?php
$handel = (isset($_GET['handel'])) ? $_GET['handel'] : 'checkout';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './vendor/autoload.php';

// Tạo một instance của PHPMailer
$mail = new PHPMailer(true);

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
            if ($city == '' || $district == '' || $fullname == '' || $shipping_address == '' || $email_address == '' || $phone_number == '') {
                echo '<meta http-equiv="refresh" content="0; url=index.php?action=checkout&data_empty=1">';
            } else {
                $db = new DB();
                $order_db  = new Orders();
                $users = new User();
                $cart_db = new Cart();
                $data['user_id'] = $user_id;
                $data['fullname'] = $fullname;
                $data['email_address'] = $email_address;
                $data['shipping_address'] = $shipping_address;
                $data['city'] = $order_db->getLocation($city)['name'];
                $data['district'] = $order_db->getLocation($district)['name'];
                $data['phone_number'] = $phone_number;
                $data['total_amount'] = $total_amount;
                $data['code_order'] = '#'.rand(99999,999999);
                $last_id = $order_db->insertOrder($data);

                $data_detail['order_id'] = $last_id;
                $code_order = $data['code_order'];
                $data_send_mail = [];
                $list_user_order = $order_db->getProductOrder($user_id)->fetchAll();
                foreach ($list_user_order as $key => $item) {
                    $data_detail['title'] = $item['title'];
                    $data_detail['quantity'] = $item['quantity'];
                    $data_detail['unit_price'] = $item['total'];
                    $data_detail['product_id'] = $item['product_id'];
                    $data_detail['size_name'] = $item['size_name'];
                    $data_detail['color_name'] = $item['color_name'];
                    $data_detail['note'] = $note;
                    $data_send_mail[] = [
                        'title' => $item['title'],
                        'quantity' => $item['quantity'],
                        'unit_price' => $item['total'],
                        'size_name' => $item['size_name'],
                        'color_name' => $item['color_name'],
                    ];
                    $check = $order_db->insertOrderDetail($data_detail);
                    if ($check) {
                        $count_quantity = $cart_db->getQuantity($item['product_id'], $item['size_id'], $item['color_id']);
                        $order_db->updateProductDetailQuantity($item['product_id'], $item['size_id'], $item['color_id'], $item['quantity'], $count_quantity['quantity']);
                        $cart_db->deleteCart($item['cart_id']);
                    }
                }
                // print_r($data_send_mail);die;
                $email_vendor = 'lehuyhieupro06182@gmail.com';
                $name_vendor = 'Le Huy Hieu';
                $message_vendor = 'Bạn có một đơn hàng mới cần xác nhận vui lòng vào website để xác nhận đơn hàng <a href="http://localhost/ecommerce/index.php?action=login&next_page=confirm_order">Đăng nhập</a>';
                $message = '';
                try {
                    $message .= "
                        <div class=''>
                            <p>Cảm ơn bạn đã đặt hàng của chúng tôi, Mã đơn hàng: $code_order</p>
                            <p>Đây là thông tin đặt hàng của bạn:</p>
                            <table style='border-collapse: collapse; width: 100%;'>
                                <thead>
                                    <tr>
                                        <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Tên sản phẩm</th>
                                        <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Số lượng</th>
                                        <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Màu sắc</th>
                                        <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Size</th>
                                        <th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                foreach ($data_send_mail as $value) {
                                    $title = $value['title'];
                                    $quantity = $value['quantity'];
                                    $color = $value['color_name'];
                                    $size = $value['size_name'];
                                    $unit_price = $value['unit_price'];
                                $message .= "<tr>
                                                <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>$title</td>
                                                <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>$quantity</td>
                                                <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>$color</td>
                                                <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>$size</td>
                                                <td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>$ $unit_price</td>
                                            </tr>";
                                }
                    $message   .= "</tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan='5' style='border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;'>$ $total_amount</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>    
                    ";

                    $mail->SMTPDebug = false;    
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'lehuyhieupro06182@gmail.com';
                    $mail->Password   = 'pkkh kzku bqsn wamm';
                    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;

                    // Thiết lập thông tin gửi email
                    $mail->setFrom('lehuyhieupro06182@gmail.com', 'lehuyhieu');//Hiển thị thông tin người gửi khi người nhập mở email
                    $mail->addAddress($email_address, $fullname);//email người nhận
                    $mail->addReplyTo('lehuyhieupro06182@gmail.com', 'Reply To');//Khai báo email nhận được phản hồi của người nhận, nếu không khai báo nó mặc định gửi lại địa chỉ chúng ta gửi đi

                    // Đính kèm tệp nếu cần
                    // $mail->addAttachment('/path/to/file.pdf');

                    // Thiết lập tiêu đề và nội dung email
                    $mail->isHTML(true);//Khai báo nội dung email hiển thị định dạng html
                    $mail->Subject = 'Dat hang thanh cong';
                    $mail->Body    = $message;
                    // $mail->MsgHTML($htmlContent);

                    // Gửi email
                    $mail->send();

                    $mail->clearAddresses();
                    $mail->addAddress($email_vendor, $name_vendor);
                    $mail->Subject = 'Don Hang Moi';
                    $mail->Body = $message_vendor;
                
                    // Gửi email cho người bán hàng (vendor)
                    $mail->send();
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=checkout&success=1">';
                } catch (Exception $e) {
                    echo '<meta http-equiv="refresh" content="0; url=index.php?action=checkout&order_failed=1">';
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

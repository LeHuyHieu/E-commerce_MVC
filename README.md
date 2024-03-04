# E-commerce_MVC
# Tên Dự Án

[![Ngôn ngữ](https://img.shields.io/badge/language-PHP-blue.svg)](https://www.php.net/)
[![Phiên bản PHP](https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg)](https://www.php.net/)
[![Phiên bản MySQL](https://img.shields.io/badge/mysql-%3E%3D%205.0-449a67.svg)](https://www.mysql.com/)
[![Phiên bản WampServer](https://img.shields.io/badge/wampserver-%3E%3D%203.2.3-orange.svg)](http://www.wampserver.com/)

## Mô tả

Dự án này là một trang web ecommerce được xây dựng để cung cấp một nền tảng thân thiện và thuận tiện cho người dùng để mua sắm trực tuyến.

## Yêu cầu Hệ Thống

- PHP 7.0 trở lên
- MySQL
- WampServer64 (hoặc bất kỳ máy chủ web Apache/MySQL/PHP nào khác)

## Cài Đặt

1. Tải mã nguồn từ repository GitHub.
2. Sao chép hoặc di chuyển thư mục mã nguồn vào thư mục chính của máy chủ web local của bạn (thường là thư mục `www` trong WampServer).
3. Tạo cơ sở dữ liệu MySQL mới và nhập dữ liệu từ tệp SQL có sẵn trong thư mục `database`.
4. Đổi tên tệp `.env.example` thành `.env` và cấu hình các thông số cơ sở dữ liệu của bạn trong tệp này.
5. Mở trình duyệt web và truy cập vào địa chỉ `http://localhost/` (hoặc địa chỉ tương ứng của máy chủ web local của bạn) để truy cập vào trang web ecommerce.

## Cấu Trúc Dự Án

- **/assets**: Chứa các tài nguyên như hình ảnh, stylesheet và script.
- **/database**: Chứa tệp SQL để tạo cơ sở dữ liệu và nhập dữ liệu ban đầu.
- **/includes**: Chứa các tệp mã nguồn PHP được sử dụng để xây dựng trang web.
- **/templates**: Chứa các mẫu HTML của trang web.

## Tính Năng Chính

1. **Xem Sản Phẩm**: Người dùng có thể xem danh sách các sản phẩm cùng với thông tin chi tiết về từng sản phẩm.
2. **Thêm vào Giỏ Hàng**: Người dùng có thể thêm sản phẩm vào giỏ hàng và xem giỏ hàng của mình.
3. **Thanh Toán**: Người dùng có thể thực hiện thanh toán cho đơn hàng của mình thông qua cổng thanh toán được tích hợp sẵn.
4. **Quản Lý Đơn Hàng**: Người dùng có thể xem và quản lý các đơn hàng của mình, bao gồm cập nhật trạng thái đơn hàng.

## Hỗ Trợ

Nếu bạn gặp bất kỳ vấn đề nào trong quá trình cài đặt hoặc sử dụng, vui lòng tạo một issue mới trên GitHub repository của dự án để nhận được sự hỗ trợ.

## Giấy Phép

Dự án này được phân phối dưới giấy phép MIT. Xem file LICENSE để biết thêm thông tin.

## Tác Giả

Được phát triển bởi [Tên của bạn]

## Ảnh Demo

Dưới đây là một ví dụ về cách để chèn ảnh demo của trang web của bạn:

![Demo](đường_dẫn_đến_ảnh_demo)

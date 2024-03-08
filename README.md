# Limupa ecommerce

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
4. Mở trình duyệt web và truy cập vào địa chỉ `http://localhost/` (hoặc địa chỉ tương ứng của máy chủ web local của bạn) để truy cập vào trang web ecommerce.

## Cấu Trúc Dự Án

- **/public**: Chứa các tài nguyên như hình ảnh, stylesheet và script.
- **/Model**: Chứa các tệp model, đại diện cho các đối tượng dữ liệu trong ứng dụng và tệp sql chứa data.
- **/Controller**: Chứa các tệp controller, điều khiển logic của ứng dụng.
- **/Views**: Chứa các tệp view, biểu diễn giao diện người dùng của ứng dụng.

- truy cập vào đường dẫn admin: http://localhost/ecommerce/admin/public/index.php
- truy cập vào đường dẫn user: http://localhost/ecommerce/user/index.php

## Tài khoản đăng nhập
user:
+ username: hieule
+ password: 123123123

admin:
- quyền admin duyệt đơn hàng, thêm xóa sửa sản phẩm, ...
  + email: lehuyhieu_admin@gmail.com
  + password: 123
- quyền nhân viên thêm xóa sửa sản phẩm
  + email: lehuyhieu_staff@gmail.com
  + password: 123
    
## Tính Năng Chính

1. **Xem sản phẩm**: Người dùng có thể xem danh sách các sản phẩm cùng với thông tin chi tiết về từng sản phẩm.
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/aa9c902f-5cab-4ae9-8f36-a043bcb06c5c)
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/e0318655-95a7-44c5-9a3d-ca71622275d1)
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/da947e56-cc62-4178-9fa8-ad636e8af536)
3. **Thêm, xóa, sửa giỏ hàng**: Người dùng có thể thêm sản phẩm vào giỏ hàng và xem giỏ hàng của mình.
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/e3f01eac-3e85-42de-a3a4-97e28a20eeb8)
4. **Tìm kiếm sản phẩm**: Tìm những sản phẩm phù hợp với nhu cầu của người dùng.
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/dce18fe1-7ed6-473f-bed6-fdf9360db58c)
7. **Đặt hàng, Quản lý đơn hàng**: Người dùng có thể xem và quản lý các đơn hàng của mình, bao gồm cập nhật trạng thái đơn hàng.
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/f38e9674-8241-451d-b83e-59292dd1fdea)
11. **Đăng nhập, đăng ký, Forgot password, Remember me**: Đăng nhập, tạo tài khoản, nhớ tài khoản, quên mật khẩu và cấp lại mật khẩu
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/8b758f1e-6652-42ea-aa9b-5159dbcf7452)
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/b2b0be93-3017-4e0d-bb33-f3866f029cb1)
12. **Review, comment**: Người dùng có thể xem và quản lý các đơn hàng của mình, bao gồm cập nhật trạng thái đơn hàng.
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/6d0210d1-4bee-4eeb-97d1-acfdd85bb406)
![image](https://github.com/LeHuyHieu/E-commerce_MVC/assets/126578220/4ae34416-1965-40ec-84ff-99138fd6a942)
13. **Và có những tính năng như một trang web bán hàng**

## Hỗ Trợ

Nếu bạn gặp bất kỳ vấn đề nào trong quá trình cài đặt hoặc sử dụng, vui lòng tạo một issue mới trên GitHub repository của dự án để nhận được sự hỗ trợ.

## Tác Giả

Được phát triển bởi Lê Huy Hiệu


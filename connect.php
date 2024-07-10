<?php
$servername = "localhost"; // Sử dụng "localhost"
$username = "root"; // Thay đổi tên đăng nhập của bạn nếu cần
$password = ""; // Thay đổi mật khẩu của bạn nếu cần
$dbname = "my_database"; // Thay đổi tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>

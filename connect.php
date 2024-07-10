<?php
// Kết nối đến cơ sở dữ liệu
$servername = getenv('viaduct.proxy.rlwy.net');
$username = getenv('root');
$password = getenv('EMlgsirgeLBFYkJpAIbqzosXFnvCmHeG');
$dbname = getenv('railway');

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công";
?>

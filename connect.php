<?php
// Lấy các biến môi trường
$servername = getenv('viaduct.proxy.rlwy.net');
$username = getenv('root');
$password = getenv('EMlgsirgeLBFYkJpAIbqzosXFnvCmHeG');
$dbname = getenv('railway');

// Kiểm tra xem các biến môi trường đã được thiết lập hay chưa
if (!$servername || !$username || !$password || !$dbname) {
    die('Một hoặc nhiều biến môi trường không được thiết lập.');
}

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công";
?>

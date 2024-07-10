<?php
session_start();
include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Lấy user_id từ session
$user_id = $_SESSION["user_id"];

// Truy vấn lịch sử luyện tập dựa trên user_id
$sql = "SELECT * FROM history WHERE user_id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Lỗi chuẩn bị truy vấn SQL: ' . htmlspecialchars($conn->error));
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$history = $result->fetch_all(MYSQLI_ASSOC);

// Đóng kết nối
$stmt->close();
$conn->close();

// Trả về dữ liệu JSON
header('Content-Type: application/json');
echo json_encode($history);
?>

<?php
session_start();
include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $parent_name = $_POST["parent_name"];
    $parent_phone = $_POST["parent_phone"];
    $student_name = $_POST["student_name"];
    $class = $_POST["class"];
    $school = $_POST["school"];
    $address = $_POST["address"];

    // Cập nhật thông tin người dùng trong cơ sở dữ liệu
    $sql = "UPDATE users SET parent_name = ?, parent_phone = ?, student_name = ?, class = ?, school = ?, address = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Lỗi chuẩn bị truy vấn SQL: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("ssssssi", $parent_name, $parent_phone, $student_name, $class, $school, $address, $user_id);

    if ($stmt->execute()) {
        $_SESSION["student_name"] = $student_name; // Cập nhật lại session nếu tên học sinh thay đổi
        header("Location: student_info.php");
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

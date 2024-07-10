<?php
include 'connect.php';

// Nhận dữ liệu từ form đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $parent_name = $_POST["parent_name"];
    $parent_phone = $_POST["parent_phone"];
    $student_name = $_POST["student_name"];
    $class = $_POST["class"];
    $school = $_POST["school"];
    $address = $_POST["address"];

    // Lưu mật khẩu không mã hóa vào cơ sở dữ liệu
    // Thực hiện truy vấn để chèn dữ liệu mới vào cơ sở dữ liệu
    $sql = "INSERT INTO users (username, email, password, parent_name, parent_phone, student_name, class, school, address) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $username, $email, $password, $parent_name, $parent_phone, $student_name, $class, $school, $address);

    if ($stmt->execute()) {
        // Đăng ký thành công, chuyển hướng tới trang đăng nhập
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Đóng kết nối
$conn->close();
?>

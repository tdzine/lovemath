<?php
session_start();

include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Nhận dữ liệu từ form đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra xem tên đăng nhập có tồn tại không
    $sql = "SELECT user_id, username, password, student_name, role_id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Lỗi chuẩn bị truy vấn SQL: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kiểm tra mật khẩu không mã hóa
        if ($password === $row["password"]) {
            // Lưu thông tin người dùng vào session
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["student_name"] = $row["student_name"]; // Lưu tên học sinh vào session

            // Kiểm tra vai trò của người dùng
            if ($row["role_id"] == 1) {
                // Nếu vai trò là admin, chuyển hướng đến trang thêm câu hỏi
                header("Location: add_question_form.html");
                exit();
            } else {
                // Nếu không phải admin, chuyển hướng đến trang chính
                header("Location: index.php");
                exit();
            }
        } else {
            // Mật khẩu không đúng
            echo "<p class='error-message'>Mật khẩu không đúng.</p>";
        }
    } else {
        // Tên đăng nhập không tồn tại
        echo "<p class='error-message'>Tên đăng nhập không tồn tại.</p>";
    }

    $stmt->close();
}

// Đóng kết nối
$conn->close();
?>

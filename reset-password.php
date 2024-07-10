<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Kết nối đến cơ sở dữ liệu
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận địa chỉ email từ form
    $email = $_POST["email"];

    // Truy vấn SQL để kiểm tra xem địa chỉ email đã tồn tại trong cơ sở dữ liệu hay không
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Nếu địa chỉ email tồn tại trong cơ sở dữ liệu
        // Tạo mật khẩu mới ngẫu nhiên
        $new_password = generateRandomPassword();

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $sql_update = "UPDATE users SET password = ? WHERE email = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ss", $new_password, $email);
        $stmt_update->execute();
        $stmt_update->close();

        // Gửi mật khẩu mới đến địa chỉ email của người dùng
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'youremail@gmail.com'; // Địa chỉ email của bạn
            $mail->Password = 'yourpassword'; // Mật khẩu email của bạn
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('youremail@gmail.com', 'Your Name');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = 'Your new password is: ' . $new_password;

            $mail->send();
            echo 'Mật khẩu mới đã được gửi đến địa chỉ email của bạn.';
        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    } else {
        // Nếu địa chỉ email không tồn tại trong cơ sở dữ liệu
        echo "Địa chỉ email không tồn tại.";
    }

    $stmt->close();
}

// Hàm để tạo mật khẩu mới ngẫu nhiên
function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
?>

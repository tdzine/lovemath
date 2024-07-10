<?php
session_start();
include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Lấy thông tin người dùng từ cơ sở dữ liệu
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Lỗi chuẩn bị truy vấn SQL: ' . htmlspecialchars($conn->error));
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Đóng kết nối
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin học sinh</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><a href="index.php"><img src="math pro.png" alt="Love Math Logo" class="logo"></a></h1>
        <nav>
            <a href="index.php">Trang chủ</a>
            <a href="gioi-thieu.php">Giới thiệu</a>
            <span>Xin chào, <?php echo htmlspecialchars($_SESSION["student_name"]); ?>!</span>
        </nav>
    </header>
    <div class="container">
        <main>
            <h2>Thông tin học sinh</h2>
            <form action="update_student_info.php" method="post">
                <p><strong>Tên đăng nhập:</strong> <?php echo htmlspecialchars($user["username"]); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user["email"]); ?></p>
                <p><strong>Tên phụ huynh:</strong> <input type="text" name="parent_name" value="<?php echo htmlspecialchars($user["parent_name"]); ?>" required></p>
                <p><strong>Số điện thoại phụ huynh:</strong> <input type="text" name="parent_phone" value="<?php echo htmlspecialchars($user["parent_phone"]); ?>" required></p>
                <h3>Thông tin học sinh</h3>
                <p><strong>Tên học sinh:</strong> <input type="text" name="student_name" value="<?php echo htmlspecialchars($user["student_name"]); ?>" required></p>
                <p><strong>Lớp:</strong> <input type="text" name="class" value="<?php echo htmlspecialchars($user["class"]); ?>" required></p>
                <p><strong>Trường:</strong> <input type="text" name="school" value="<?php echo htmlspecialchars($user["school"]); ?>" required></p>
                <p><strong>Địa chỉ:</strong> <textarea name="address" required><?php echo htmlspecialchars($user["address"]); ?></textarea></p>
                <button type="submit">Lưu thay đổi</button>
            </form>
        </main>
    </div>
</body>
</html>

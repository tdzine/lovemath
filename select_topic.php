<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Chủ Đề - Học Toán</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><a href="index.php"><img src="math pro.png" alt="Love Math Logo" class="logo"></a></h1>
        <nav>
            <a href="index.php">Trang chủ</a>
            <a href="intro.html">Giới thiệu</a>
            <?php if (isset($_SESSION["student_name"])): ?>
                <a href="student_info.php">Xin chào, <?php echo htmlspecialchars($_SESSION["student_name"]); ?>!</a>
                <a href="logout.php">Đăng xuất</a>
            <?php else: ?>
                <a href="login.html">Đăng nhập</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
        <!-- Nội dung chính -->
        <main>
            <h2>Chọn chủ đề luyện tập</h2>
            <p>Vui lòng chọn một trong các chủ đề dưới đây để bắt đầu luyện tập toán:</p>
            <ul>
                <li><a href="luyen-tap-1.html">Cộng</a></li>
                <li><a href="luyen-tap-2.html">Trừ</a></li>
                <li><a href="luyen-tap-3.html">So sánh</a></li>
            </ul>
        </main>
    </div>
</body>
</html>

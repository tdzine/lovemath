<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Học toán</title>
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
        <!-- Cột bên trái -->
        <aside>
            <h3>Danh mục</h3>
            <ul>
                <li><a href="select_topic.php">Luyện tập toán</a></li>
                <li><a href="thi-toan.html">Thi toán</a></li>
                <li><a href="lich-su-luyen-tap.html">Lịch sử luyện tập</a></li>
                <li><a href="#">Lịch sử thi</a></li>
                <li><a href="thong-ke.html">Thống kê thời gian học</a></li>
            </ul>
        </aside>
        <!-- Nội dung chính -->
        <main>
            <h2>Chào mừng bạn đến với trang web học toán!</h2>
            <p>Chúng tôi là nơi cung cấp các tài nguyên học toán đa dạng và phong phú, giúp các em học sinh tiểu học phát triển kỹ năng toán học một cách hiệu quả và thú vị.</p>
            <p>Với mục tiêu tạo ra những "siêu nhân toán học", chúng tôi không chỉ cung cấp các bài tập luyện tập mà còn tạo ra môi trường học tập tích cực và sáng tạo.</p>
            <p>Hãy cùng chúng tôi bắt đầu hành trình khám phá vẻ đẹp của toán học và trở thành những nhà toán học tài năng!</p>
        </main>
    </div>
</body>
</html>

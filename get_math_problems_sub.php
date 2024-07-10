<?php
session_start();
include 'connect.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Truy vấn SQL để lấy câu hỏi và câu trả lời từ bảng math_problems_sub
$sql = "SELECT question_text, answer FROM math_problems_sub";
$result = $conn->query($sql);

$problems = array();

if ($result->num_rows > 0) {
    // Đưa dữ liệu vào mảng
    while($row = $result->fetch_assoc()) {
        $problem = array(
            "question_text" => $row["question_text"],
            "answer" => $row["answer"]
        );
        array_push($problems, $problem);
    }
} else {
    echo "Không có câu hỏi nào.";
}

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($problems);

$conn->close();
?>

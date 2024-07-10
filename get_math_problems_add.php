<?php
header('Content-Type: application/json');

// Kết nối đến cơ sở dữ liệu
include 'connect.php';

// Truy vấn SQL để lấy câu hỏi và câu trả lời từ bảng math_problems_add
$sql = "SELECT question_text, answer FROM math_problems_add";
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
    $problems = array("message" => "Không có câu hỏi nào.");
}

// Trả về dữ liệu dưới dạng JSON
echo json_encode($problems);

$conn->close();
?>

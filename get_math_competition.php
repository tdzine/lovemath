<?php
// Kết nối đến cơ sở dữ liệu
include 'connect.php';

header('Content-Type: application/json');

$problems = array();

// Truy vấn SQL để lấy câu hỏi từ bảng math_competition
$sql = "SELECT question_text, answer, left_operand, right_operand, correct_operator, source_table FROM math_competition";
$result = $conn->query($sql);

if ($result === FALSE) {
    echo json_encode(array("error" => "Lỗi truy vấn cơ sở dữ liệu: " . $conn->error));
    exit;
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["source_table"] === 'math_problems_add' || $row["source_table"] === 'math_problems_sub') {
            $problem = array(
                "question_text" => $row["question_text"],
                "answer" => floatval($row["answer"]),
                "type" => $row["source_table"] === 'math_problems_add' ? "add" : "sub"
            );
        } else {
            $problem = array(
                "left_operand" => intval($row["left_operand"]),
                "right_operand" => intval($row["right_operand"]),
                "correct_operator" => $row["correct_operator"],
                "type" => "comparison"
            );
        }
        array_push($problems, $problem);
    }
}

// Trả về dữ liệu dưới dạng JSON
echo json_encode($problems);

$conn->close();
?>

<?php
session_start();
include 'connect.php'; // Kết nối với cơ sở dữ liệu

$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_type = $_POST["question_type"];
    
    if ($question_type === "add") {
        $question_text = $_POST["question_text"];
        $answer = $_POST["answer"];
        
        $sql = "INSERT INTO math_problems_add (question_text, answer) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $question_text, $answer);
    } else if ($question_type === "sub") {
        $question_text = $_POST["question_text"];
        $answer = $_POST["answer"];
        
        $sql = "INSERT INTO math_problems_sub (question_text, answer) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $question_text, $answer);
    } else if ($question_type === "comparison") {
        $left_operand = $_POST["left_operand"];
        $operator = $_POST["operator"];
        $right_operand = $_POST["right_operand"];
        
        $sql = "INSERT INTO math_problems (left_operand, correct_operator, right_operand) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $left_operand, $operator, $right_operand);
    }

    if ($stmt->execute()) {
        $success = true;
    } else {
        echo "Lỗi: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
    }

    $stmt->close();
    $conn->close();

    // Quay trở lại trang thêm câu hỏi sau khi xử lý xong
    header("Location: add_question_form.html?success=" . ($success ? "1" : "0"));
    exit();
}
?>

<?php
session_start();

include 'connect.php';

// Nhận dữ liệu từ client
$data = json_decode(file_get_contents('php://input'), true);

$user_id = $_SESSION["user_id"];
$topic = $data['topic'];
$correctAnswers = $data['correctAnswers'];
$incorrectAnswers = $data['incorrectAnswers'];
$startTime = $data['startTime'];
$endTime = $data['endTime'];

// Lưu dữ liệu vào bảng history
$sql = "INSERT INTO history (user_id, topic, correct_answers, incorrect_answers, start_time, end_time)
VALUES ('$user_id', '$topic', '$correctAnswers', '$incorrectAnswers', '$startTime', '$endTime')";

if ($conn->query($sql) === TRUE) {
    echo "Lưu lịch sử luyện tập thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

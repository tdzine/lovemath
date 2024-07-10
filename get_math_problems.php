<?php
include 'connect.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM math_problems";
$result = $conn->query($sql);

$problems = array();

while ($row = $result->fetch_assoc()) {
    $problems[] = array(
        'left' => $row['left_operand'],
        'right' => $row['right_operand'],
        'correct_operator' => $row['correct_operator']
    );
}

echo json_encode($problems);

$conn->close();
?>

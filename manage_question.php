<?php
// Kết nối với cơ sở dữ liệu
include 'connect.php';

// Xử lý khi nhận dữ liệu từ biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các trường đã được điền đầy đủ hay không
    if (isset($_POST['question']) && isset($_POST['answer']) && isset($_POST['operation']) && isset($_POST['first_number']) && isset($_POST['second_number'])) {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $operation = $_POST['operation'];
        $left_operand = $_POST['first_number'];
        $right_operand = $_POST['second_number'];

        // Kiểm tra loại phép toán và thêm dữ liệu vào bảng tương ứng
        switch ($operation) {
            case 'add':
                $sql = "INSERT INTO math_problems_add (question_text, left_operand, right_operand, answer) VALUES (?, ?, ?, ?)";
                break;
            case 'subtract':
                $sql = "INSERT INTO math_problems_sub (question_text, left_operand, right_operand, answer) VALUES (?, ?, ?, ?)";
                break;
            case 'compare':
                $sql = "INSERT INTO math_problems_compare (question_text, left_operand, right_operand, answer) VALUES (?, ?, ?, ?)";
                break;
            default:
                echo "Loại phép toán không hợp lệ.";
                exit();
        }

        // Chuẩn bị và thực thi câu lệnh SQL
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            echo "Lỗi trong quá trình chuẩn bị truy vấn: " . $conn->error;
            exit();
        }
        $stmt->bind_param("siii", $question, $left_operand, $right_operand, $answer);

        // Thực thi câu lệnh SQL
        if ($stmt->execute()) {
            echo "<p>Câu hỏi đã được thêm thành công vào CSDL.</p>";
        } else {
            echo "<p>Có lỗi xảy ra. Vui lòng thử lại sau.</p>";
        }

        // Đóng kết nối và thoát khỏi kịch bản
        $stmt->close();
        $conn->close();
        exit();
    } else {
        echo "<p>Vui lòng điền đầy đủ thông tin của câu hỏi.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý câu hỏi</title>
</head>
<body>
    <h2>Thêm câu hỏi mới</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="question">Câu hỏi:</label><br>
        <input type="text" id="question" name="question" required><br>

        <!-- Lựa chọn loại câu hỏi -->
        <label for="operation">Loại phép toán:</label><br>
        <select id="operation" name="operation" required>
            <option value="add">Cộng</option>
            <option value="subtract">Trừ</option>
            <option value="compare">So sánh</option>
        </select><br>

        <!-- Số thứ nhất -->
        <label for="first_number">Số thứ nhất:</label><br>
        <input type="number" id="first_number" name="first_number" required><br>

        <!-- Số thứ hai -->
        <label for="second_number">Số thứ hai:</label><br>
        <input type="number" id="second_number" name="second_number" required><br>

        <!-- Đáp án -->
        <label for="answer">Đáp án:</label><br>
        <input type="text" id="answer" name="answer" required><br><br>
        
        <input type="submit" value="Thêm câu hỏi">
    </form>
</body>
</html>

<?php
// Bắt đầu phiên làm việc
session_start();

// Hủy bỏ tất cả các biến phiên
$_SESSION = array();

// Hủy bỏ phiên hiện tại
session_destroy();

// Chuyển hướng về trang đăng nhập
header("location: login.html");
exit;
?>

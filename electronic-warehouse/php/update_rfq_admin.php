<?php
require 'db_connect.php';
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$type = $data['type'];
$price = $data['quote_price'];
$note = $data['note'];

if ($type === 'product') {
    $stmt = $pdo->prepare("UPDATE quotes SET status = 'quoted', quote_price = ?, quote_note = ?, quoted_at = NOW() WHERE id = ?");
    $success = $stmt->execute([$price, $note, $id]);
} else {
    // Có thể thêm bảng lưu báo giá cho RFQ tùy chỉnh
    $success = true;
}

echo json_encode(['success' => $success, 'message' => $success ? 'Đã gửi báo giá!' : 'Lỗi!']);
?>
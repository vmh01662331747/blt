<?php
require 'db_connect.php';
$stmt = $pdo->query("SELECT r.*, u.email as user_email, u.company_name FROM rfq_requests r LEFT JOIN users u ON r.user_id = u.id ORDER BY r.request_date DESC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
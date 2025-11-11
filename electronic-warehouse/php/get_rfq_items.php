<?php
require 'db_connect.php';
$rfq_id = $_GET['rfq_id'];
$stmt = $pdo->prepare("SELECT * FROM rfq_items WHERE rfq_id = ?");
$stmt->execute([$rfq_id]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
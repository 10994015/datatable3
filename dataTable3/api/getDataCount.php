<?php
require_once "../config/conn.php";
$sql_str = $_GET['sql_count'];
$search = $_GET['search'];
$search = '%'.$search.'%';
$stmt  = $conn->prepare($sql_str);
$stmt->bindParam(':search', $search);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($result['count']);
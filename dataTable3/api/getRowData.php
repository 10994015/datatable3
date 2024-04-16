<?php
require_once "../config/conn.php";
$sql = $_GET['sql'];
$sortDirection = $_GET['sortDirection'];
$sortField = $_GET['sortField'];
$limit = $_GET['limit'];
$search = $_GET['search'];
$startRow = $_GET['startRow'];
$endRow = $startRow + $limit;

$sql_str = $sql . " ORDER BY $sortField $sortDirection LIMIT :startRow, :endRow";

$search = '%'.$search.'%';
$stmt  = $conn->prepare($sql_str);
$stmt->bindParam(':search', $search);
$stmt->bindParam(':startRow', $startRow, PDO::PARAM_INT);
$stmt->bindParam(':endRow', $endRow, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
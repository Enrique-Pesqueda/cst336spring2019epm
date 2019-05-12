<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":userId"] = $_POST["userId"];

$sql = "SELECT * ".
        "FROM appointments " . 
        "WHERE user_id LIKE :userId";


$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
?>
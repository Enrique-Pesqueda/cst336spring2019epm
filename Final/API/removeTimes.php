<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":date"] = $_POST["date"];
$np[":sTime"] = $_POST["sTime"];
$np[":duration"] = $_POST["duration"];
$np[":userId"] = $_POST["userId"];

$sql = "DELETE FROM appointments
        WHERE user_id LIKE :userId AND date LIKE :date AND start_time LIKE :sTime AND duration LIKE :duration";


$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
?>
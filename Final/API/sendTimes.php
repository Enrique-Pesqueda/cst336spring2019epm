<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":date"] = $_POST["date"];
$np[":sTime"] = $_POST["sTime"];
$np[":duration"] = $_POST["duration"];
$np[":userId"] = $_POST["userId"];

$sql = "INSERT INTO appointments (date, start_time, duration, user_id) ".
        "VALUES (:date, :sTime, :duration, :userId)";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($records);
echo json_decode(array("status"=>"success"))

?>
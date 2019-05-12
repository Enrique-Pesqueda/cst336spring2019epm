<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();

$np[":userName"] = $_POST["userName"];
$np[":userId"] = $_POST["userId"];

$sql = "INSERT INTO users_f (user_id, user_name)".
        "VALUES (:userId, :userName)";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($records);
echo json_decode(array("status"=>"success"))

?>
<?php

//connect to database
include 'dbConnection.php';
$conn = getDatabaseConnection();

// Allow any client to access
header("Access-Control-Allow-Origin: *");
// Let the client know the format of the data being returned
header("Content-Type: application/json");

$np[':key'] = $_GET['imgkey'];

$sql = 'SELECT * FROM likedImages
        WHERE imgkey = :key;';
        
$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>
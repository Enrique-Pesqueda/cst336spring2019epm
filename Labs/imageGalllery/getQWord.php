<?php

//connect to database
include 'dbConnection.php';
$conn = getDatabaseConnection();

// Allow any client to access
header("Access-Control-Allow-Origin: *");
// Let the client know the format of the data being returned
header("Content-Type: application/json");

$sql = 'SELECT DISTINCT imgkey 
        FROM likedImages
        ORDER BY imgkey;';
        
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>
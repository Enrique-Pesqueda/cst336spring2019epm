<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * FROM `match`";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>
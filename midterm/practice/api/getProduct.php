<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT productName,productPrice FROM mp_product";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>
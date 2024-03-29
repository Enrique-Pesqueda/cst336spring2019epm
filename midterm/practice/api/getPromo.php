<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT promoCode, discount, expirationDate FROM mp_codes";
    
    if(!empty($_GET['promoCode'])){
        $sql .= " AND promoCode LIKE :promoCode";
        $namedParameters[":promoCode"] ="%" . $_GET['promoCode'] . "%";
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>
<?php

    //connect to database
    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    
    //check if we need to add or remove
    $np = array();
    $np[':imgkey'] = $_POST['searchKey'];
    $np[':url'] = $_POST['link'];
    $task = $_POST['operation'];
    $sql='';
    
    
    
    
    if($task =='insert'){
        $sql = 'INSERT INTO likedImages (imgkey, url) VALUES (:imgkey,:url);';
    }
    else{
        $sql = 'DELETE FROM likedImages where (imgkey = :imgkey AND url = :url);';
    }

    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    // $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $records['operation'] = $task;
    echo json_encode($records);
    
?>
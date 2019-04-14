<?php
//Used to check the letter the user inputed in the form, and if the letter is in the word
//Should return an array of booleans as the api
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection();

    $wordId = intval($_GET['word_id']);
    $word = array();
    $word[':wid'] = $wordId;
    $sql = "SELECT * WHERE word_id = :wid";
    $stmt = $conn -> prepare($sql);  
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); 
    echo json_encode($record);
    
?>
<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    $sql = '';
    
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        
        
        $fileExt = explode('.', $fileName);
        $realExt = strtolower(end($fileExt));
        
        $allowed = array('jpg', 'jpeg', 'png');
        
        if(in_array($realExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    
                    
                    $img = addslashes(file_get_contents($fileTmpName));
                    $caption = $_POST['caption'];
                    $email = $_POST['email'];
                    $timestamp = date("F j Y");
                    
                    $sql = "INSERT INTO data_4 (email, caption, media, timestamp) VALUES('$email', '$caption', '$img', '$timestamp')";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    header("Location: ../index.php?uploadsuccess");
                }
                else{
                    header("Location: ../index.php?uploadFAIL");
                }
            }
            else{
                header("Location: ../index.php?uploadFAIL");
            }       
        }
        else{
            header("Location: ../index.php?uploadFAIL");
        }
        
    }
?>
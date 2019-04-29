<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    $sql = '';
    
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        // print_r($file);
        
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        
        $email = $_POST['email'];
        $caption = $_POST['caption'];
        $timeStamp = date("F j Y");
        
        echo $email;
        
        $fileExt = explode('.', $fileName);
        $realExt = strtolower(end($fileExt));
        
        $allowed = array('jpg', 'jpeg', 'png');
        
        if(in_array($realExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    //To store in local folder and prevent lost data
                    // $fileNameNew = uniqid('',true) . '.'. $realExt;
                    
                    $img = file_get_contents($fileTmpName);
                    $stmt = $conn->prepare("insert into data values('?','?','?','?')");
                    $stmt->bindParam(1,$email);
                    $stmt->bindParam(2,$caption);
                    $stmt->bindParam(3,$img);
                    $stmt->bindParam(4,$timeStamp);
                    $stmt->execute();
                    header("Location: ../index.php?uploadsuccess");
                }
                else{
                    echo 'Your file is too big!';
                }
            }
            else{
                echo 'There was an error uploading your file!';
            }       
        }
        else{
            echo 'You cannot upload files of this type!';
        }
        
    }
?>
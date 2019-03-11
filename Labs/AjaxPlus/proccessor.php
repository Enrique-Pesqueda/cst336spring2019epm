<?php

    header('Content-type: application/json');
    $dataBase = array();
    session_start();
    
    $username = '';
    $passwords = '';
    $outputMessage = '';
    
    $getFile = 'POST' === $_SERVER['REQUEST_METHOD'];
    
    if ($getFile) {
        $outputMessage = processForm();
    }
    
    function processForm()
    {
        if ($_POST['check'] == "checkValidation") {
            global $username;
            global $passwords;
        
            $username = (string)$_POST['username'];
            $password = (string)$_POST['password'];

            $pass = true;
            
            foreach ($_SESSION as $pastUsername => $value) {
                if ($pastUsername == $username) {
                    $pass = false;
                    $dataBase["message"] = "username taken";
                    
                }
            }
            
            if ($pass) {
                if (strpos($passwords, $username) !== false) {
                    $pass = false;
                    $dataBase["message"] = "username in password";
                }
            }
            
            if ($pass) {
                $_SESSION[$username] = $passwords;
                $dataBase["message"] = "success";
            }
            
            echo json_encode($dataBase);
        }
        
        else if ($_POST['check'] == "generatedPassword") {
            
            for ($i = 0; $i < 8; $i++) {
                $character = rand(97,122);
                $number = rand(1,9);
                $changetochar = chr($character);
                $gen_password = $gen_password . (string)$changetochar . (string)$number;
                
            }
            
            $dataBase["randomPassword"] = $gen_password;
            
            echo json_encode($dataBase);
        }
    }
?>
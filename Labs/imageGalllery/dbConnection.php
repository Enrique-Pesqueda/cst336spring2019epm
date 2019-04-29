<?php
    function getDataBaseConnection($dbname = "imageGallery"){
        
        $host = "localhost";
        $username = "enriquemosqueda";
        $password = '';
        
      
        //creates DB connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        
        //display errors when accessing tables
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
?>
<?php
    function getDataBaseConnection($dbname = "ottermart"){
        
        $host = "localhost";
        $username = "enriquemosqueda";
        $password = '';
        
        //when connecting from Heroku
        if(strpos($_SERVER['HTTP_HOST'],'herokuapp')!==false){
            $url = parase_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        }

        
        //creates DB connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        
        //display errors when accessing tables
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
?>
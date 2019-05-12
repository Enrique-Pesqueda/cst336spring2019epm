<?php
    function getDataBaseConnection($dbname = "heroku_4601ed3b57afd10"){
        
        $host = "us-cdbr-iron-east-03.cleardb.net";
        $username = "b127922bd30d7f";
        $password = '46ddc3fa';
        
        // mysql://b127922bd30d7f:46ddc3fa@us-cdbr-iron-east-03.cleardb.net/heroku_4601ed3b57afd10?reconnect=true
        /**
         * username = b127922bd30d7f
         * password = 46ddc3fa
         * host = us-cdbr-iron-east-03.cleardb.net
         * data base name = heroku_4601ed3b57afd10
         */
        
        if(strpos($_SERVER['HTTP_HOST'],'herokuapp')!==false){
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
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
<?php
require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('monolog-test');
$log->pushHandler(new Monolog\Handler\StreamHandler(__DIR__ . '/app.log', Monolog\Logger::INFO));
$log->info('I am inside the monolog test page');
?>

<!DOCTYPE html>
<html>
<head></head>    
<body>
    <h1>SUP DAWG</h1>    
</body>
    
</html>

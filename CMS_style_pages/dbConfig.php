<?php
define('DB_HOST','localhost');
define('DB_USER','mycms');
define('DB_PW','mycms');
define('DB_NAME','mycms');
//$db = new mysqli(DB_HOST,DB_USER,DB_PW,DB_NAME);
$db_host = DB_HOST;
$db_name = DB_NAME;
try{
    $DBH = new PDO("mysql:host=$db_host;dbname=$db_name",DB_USER,DB_PW);
}
catch(PDOException $e){
    echo "Error: Connect to database";
    file_put_contents('PDOErrors.txt',$e->getMessage(),FILE_APPEND);
}
?>
<?php
$dns="mysql:host=localhost;dbname=modip";
$dbusername = "root";
$dbpassword = "";

try{
    $pdo = new PDO($dns, $dbusername, $dbpassword);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOExeption $e){
    echo "Connection failed : " . $e->getMessage();
}




?>